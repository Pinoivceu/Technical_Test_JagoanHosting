import { useEffect, useState } from "react"
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogTitle,
  DialogTrigger,
  DialogClose
} from "@/components/ui/dialog"
import { XIcon } from "lucide-react"
import { Label } from "@/components/ui/label"
import { Input } from "@/components/ui/input"
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"
import { RadioGroup, RadioGroupItem } from "@/components/ui/radio-group"
import { Button } from "@/components/ui/button"
import api from "@/services/api"
import { useQueries } from "@tanstack/react-query"

type EditWargaFormProps = {
  id?: number
  nomorRumah: any
  statusHunian: any
}

export default function EditPenghuniForm({ id, nomorRumah, statusHunian }: EditWargaFormProps) {
  const [nama, setNama] = useState("")
  const [jenisKelamin, setJenisKelamin] = useState("")
  const [statusPerkawinan, setStatusPerkawinan] = useState("")
  const [noTelepon, setNoTelepon] = useState("")
  const [fotoKTP, setFotoKTP] = useState<File | null>(null)
  const [previewKTP, setPreviewKTP] = useState<string | null>(null)
  const [open, setOpen] = useState(false)

  const results = useQueries({
    queries: [
      {
        queryKey: ["warga"],
        queryFn: () => api.get("/warga").then((res) => res.data.data),
        select: (raw: any[]) =>
          raw.map((item) => ({
            id: item.id,
            nama: item.nama,
            jenis_kelamin: item.jenis_kelamin,
            nomor_rumah: item.nomor_rumah ?? 0,
            status_perkawinan: item.status_perkawinan,
            no_telepon: item.no_telepon,
            foto_ktp: item.foto_ktp,
            status_hunian: item.status_hunian,
          })),
      },
      {
        queryKey: ["rumah"],
        queryFn: () => api.get("/rumah").then((res) => res.data.data),
        select: (raw: any[]) => raw,
      },
    ],
  })

  // Extract results
  const wargaQuery = results[0]
  const rumahQuery = results[1]

  // Prefill state ketika data warga sudah ada dan id ada
  useEffect(() => {
    if (!wargaQuery.data || !id) return
    const warga = wargaQuery.data.find((d) => d.id === id)
    if (warga) {
      setNama(warga.nama)
      setJenisKelamin(warga.jenis_kelamin)
      setStatusPerkawinan(warga.status_perkawinan)
      setNoTelepon(warga.no_telepon)
      setPreviewKTP(
        warga.foto_ktp
          ? `http://localhost:8000/api/foto_ktp/${warga.foto_ktp}`
          : null
      )
    }
  }, [wargaQuery.data, id])

  // Loading & error handling
  if (wargaQuery.isLoading || rumahQuery.isLoading) return <>Loading...</>
  if (wargaQuery.isError) return <>Error warga: {String(wargaQuery.error)}</>
  if (rumahQuery.isError) return <>Error rumah: {String(rumahQuery.error)}</>

  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const file = e.target.files?.[0]
    if (file) {
      setFotoKTP(file)
      const previewUrl = URL.createObjectURL(file)
      setPreviewKTP(previewUrl)
    }
  }

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()

    const formData = new FormData()
    formData.append("nama", nama)
    formData.append("jenis_kelamin", jenisKelamin)
    formData.append("nomor_rumah", nomorRumah)
    formData.append("status_perkawinan", statusPerkawinan)
    formData.append("no_telepon", noTelepon)
    formData.append("status_hunian", statusHunian)
    if (fotoKTP) {
      formData.append("foto_ktp", fotoKTP)
    }

    try {
      let response
      if (id) {
        response = await api.post(`/warga/${id}?_method=PUT`, formData, {
          headers: { "Content-Type": "multipart/form-data" },
        })
      } else {
        response = await api.post("/warga", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        })
      }

      alert("Berhasil menyimpan data warga!")
      setOpen(false)
    } catch (error) {
      alert("Gagal menyimpan data warga.")
    }
  }

  return (
    <Dialog open={open}>
      <DialogTrigger asChild>
        <Button variant={"ghost"} onClick={() => setOpen(true)}>
          Edit Warga
        </Button>
      </DialogTrigger>
      <DialogContent showCloseButton={false} className="max-w-md w-full">
        <DialogClose className="items-end flex justify-end ring-offset-background focus:ring-ring data-[state=open]:bg-accent data-[state=open]:text-muted-foreground absolute top-4 right-4 rounded-xs opacity-70 transition-opacity hover:opacity-100 focus:ring-2 focus:ring-offset-2 focus:outline-hidden disabled:pointer-events-none [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4" onClick={() => setOpen(false)}><XIcon /></DialogClose>
        <DialogTitle>Edit Warga</DialogTitle>
        <DialogDescription>Isi data lengkap untuk edit warga baru.</DialogDescription>
        <form onSubmit={handleSubmit} className="space-y-2">
          <div>
            <div className="relative mx-auto w-15 h-15 ">
              <label htmlFor="foto_ktp" className="cursor-pointer group block w-full h-full">
                <div className="w-full h-full rounded-full border-2 border-dashed border-gray-400 flex items-center justify-center overflow-hidden bg-gray-100">
                  {previewKTP ? (
                    <img
                      src={previewKTP}
                      alt="Preview KTP"
                      className="w-full h-full object-cover rounded-full"
                    />
                  ) : (
                    <div className="text-gray-400 text-4xl group-hover:text-gray-600">+</div>
                  )}
                </div>
                <input
                  id="foto_ktp"
                  type="file"
                  accept="image/*"
                  onChange={handleFileChange}
                  className="hidden"
                />
              </label>
            </div>

            <Label htmlFor="nama">Nama</Label>
            <Input id="nama" value={nama} onChange={(e) => setNama(e.target.value)} required />
          </div>


          <Label htmlFor="no_telepon">No Telepon</Label>
          <Input
            id="no_telepon"
            value={noTelepon}
            onChange={(e) => setNoTelepon(e.target.value)}
            required
          />

          <Label>Status Perkawinan</Label>
          <Select value={statusPerkawinan} onValueChange={(val) => setStatusPerkawinan(val)}>
            <SelectTrigger className="w-full">
              <SelectValue placeholder="Pilih status perkawinan" />
            </SelectTrigger>

            <SelectContent>
              <SelectItem value="lajang">Lajang</SelectItem>
              <SelectItem value="menikah">Menikah</SelectItem>
              <SelectItem value="bercerai">Bercerai</SelectItem>
            </SelectContent>
          </Select>

          <Label>Jenis Kelamin</Label>
          <RadioGroup
            value={jenisKelamin}
            onValueChange={setJenisKelamin}
            className="flex space-x-6 py-2"
          >
            <div className="flex items-center space-x-2">
              <RadioGroupItem value="laki" id="jk-laki" />
              <Label htmlFor="jk-laki">Laki-laki</Label>
            </div>
            <div className="flex items-center space-x-2">
              <RadioGroupItem value="perempuan" id="jk-perempuan" />
              <Label htmlFor="jk-perempuan">Perempuan</Label>
            </div>
          </RadioGroup>

          <Button type="submit" className="mt-4 w-full">
            Simpan
          </Button>
        </form>
      </DialogContent>
    </Dialog>
  )
}
