import { useState } from "react"
import { z } from "zod"
import api from "@/services/api"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Dialog, DialogContent, DialogDescription, DialogTitle, DialogTrigger } from "@/components/ui/dialog"
import { Switch } from "@/components/ui/switch"

// Schema Zod untuk validasi form
const rumahSchema = z.object({
  nomor: z.number({
    required_error: "Nomor rumah wajib diisi",
    invalid_type_error: "Nomor rumah harus berupa angka",
  }).int().positive("Nomor rumah harus positif"),
  berpenghuni: z.boolean({
    required_error: "Status berpenghuni wajib diisi",
  }),
})

export default function AddRumahCard({ onSuccess }: { onSuccess?: () => void }) {
  const [nomor, setNomor] = useState("")
  const [berpenghuni, setBerpenghuni] = useState(false)
  const [error, setError] = useState<string | null>(null)
  const [loading, setLoading] = useState(false)
  const [open, setOpen] = useState(false)

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    setError(null)

    // Parsing dan validasi dengan Zod
    const parseResult = rumahSchema.safeParse({
      nomor: Number(nomor),
      berpenghuni,
    })

    if (!parseResult.success) {
      // Ambil pesan error dari Zod
      const firstError = Object.values(parseResult.error.flatten().fieldErrors)[0]
      setError(firstError?.[0] ?? "Input tidak valid")
      return
    }

    setLoading(true)
    try {
      const res = await api.post("/rumah", parseResult.data)
      if (res.data.success) {
        alert(res.data.message)
        onSuccess?.()
        setNomor("")
        setBerpenghuni(false)
        setOpen(false)
      }
    } catch (err: any) {
      if (err.response?.data?.errors?.nomor) {
        setError(err.response.data.errors.nomor[0])
      } else {
        setError("Terjadi kesalahan saat menambahkan data rumah")
      }
    } finally {
      setLoading(false)
    }
  }

  return (
    <Dialog open={open} onOpenChange={setOpen}>
      <DialogTrigger asChild>
        <Button>Tambah Rumah</Button>
      </DialogTrigger>
      <DialogContent className="max-w-md w-full">
        <DialogTitle>Tambah Rumah Baru</DialogTitle>
        <DialogDescription>Isi data rumah dengan nomor unik dan status berpenghuni.</DialogDescription>

        <form onSubmit={handleSubmit} className="space-y-4 mt-4">
          <div>
            <Label htmlFor="nomor">Nomor Rumah</Label>
            <Input
              id="nomor"
              type="number"
              value={nomor}
              onChange={(e) => setNomor(e.target.value)}
              required
            />
          </div>

          <div className="flex items-center space-x-2">
            <Label htmlFor="berpenghuni">Berpenghuni</Label>
            <Switch
              id="berpenghuni"
              checked={berpenghuni}
              onCheckedChange={setBerpenghuni}
            />
          </div>

          {error && <p className="text-sm text-red-600">{error}</p>}

          <Button type="submit" disabled={loading} className="w-full">
            {loading ? "Menyimpan..." : "Simpan"}
          </Button>
        </form>
      </DialogContent>
    </Dialog>
  )
}
