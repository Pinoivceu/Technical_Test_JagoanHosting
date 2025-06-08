import { useState, useEffect } from "react"
import { z } from "zod"
import api from "@/services/api"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Dialog, DialogContent, DialogDescription, DialogTitle, DialogTrigger } from "@/components/ui/dialog"
import { Switch } from "@/components/ui/switch"

const rumahSchema = z.object({
  nomor: z.number({
    required_error: "Nomor rumah wajib diisi",
    invalid_type_error: "Nomor rumah harus berupa angka",
  }).int().positive("Nomor rumah harus positif"),
  berpenghuni: z.boolean({
    required_error: "Status berpenghuni wajib diisi",
  }),
})

interface Rumah {
  nomor: number
  berpenghuni: boolean
}

export default function EditRumahCard({
  nomorRumah,
  onSuccess,
}: {
  nomorRumah: number
  onSuccess?: () => void
}) {
  const [rumahData, setRumahData] = useState<Rumah | null>(null)
  const [loadingData, setLoadingData] = useState(false)
  const [errorData, setErrorData] = useState<string | null>(null)

  const [nomor, setNomor] = useState("")
  const [berpenghuni, setBerpenghuni] = useState(false)
  const [error, setError] = useState<string | null>(null)
  const [loading, setLoading] = useState(false)
  const [open, setOpen] = useState(false)

  // Fetch data rumah saat dialog dibuka
  useEffect(() => {
    if (!open) return
    setLoadingData(true)
    setErrorData(null)
    api.get(`/rumah/${nomorRumah}`)
      .then(res => {
        const data: Rumah = res.data.data
        setRumahData(data)
        setNomor(data.nomor.toString())
        setBerpenghuni(data.berpenghuni)
      })
      .catch(() => {
        setErrorData("Gagal mengambil data rumah")
      })
      .finally(() => {
        setLoadingData(false)
      })
  }, [open, nomorRumah])

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    setError(null)

    const parseResult = rumahSchema.safeParse({
      nomor: Number(nomor),
      berpenghuni,
    })

    if (!parseResult.success) {
      const firstError = Object.values(parseResult.error.flatten().fieldErrors)[0]
      setError(firstError?.[0] ?? "Input tidak valid")
      return
    }

    setLoading(true)
    try {
      const res = await api.patch(`/rumah/${nomorRumah}`, parseResult.data)
      if (res.data.success) {
        alert(res.data.message)
        onSuccess?.()
        setOpen(false)
      }
    } catch (err: any) {
      if (err.response?.data?.errors?.nomor) {
        setError(err.response.data.errors.nomor[0])
      } else {
        setError("Terjadi kesalahan saat memperbarui data rumah")
      }
    } finally {
      setLoading(false)
    }
  }

  return (
    <Dialog open={open} onOpenChange={setOpen}>
      <DialogTrigger asChild>
        <Button variant="outline">Edit Rumah #{nomorRumah}</Button>
      </DialogTrigger>
      <DialogContent className="max-w-md w-full">
        <DialogTitle>Edit Data Rumah</DialogTitle>
        <DialogDescription>Perbarui nomor dan status berpenghuni rumah.</DialogDescription>

        {loadingData && <p>Memuat data rumah...</p>}
        {errorData && <p className="text-red-600">{errorData}</p>}

        {!loadingData && rumahData && (
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
              {loading ? "Menyimpan..." : "Update"}
            </Button>
          </form>
        )}
      </DialogContent>
    </Dialog>
  )
}
