import { useEffect, useState } from "react"
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogTitle,
  DialogTrigger,
} from "@/components/ui/dialog"
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
}

export default function EditWargaForm({ id }: EditWargaFormProps) {
  const [nama, setNama] = useState("")
  const [jenisKelamin, setJenisKelamin] = useState("")
  const [nomorRumah, setNomorRumah] = useState("")
  const [statusPerkawinan, setStatusPerkawinan] = useState("")
  const [statusHunian, setStatusHunian] = useState("")
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
      setNomorRumah(String(warga.nomor_rumah)) // pastikan string
      setStatusPerkawinan(warga.status_perkawinan)
      setNoTelepon(warga.no_telepon)
      setStatusHunian(warga.status_hunian)
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
      <DialogContent className="max-w-md w-full">
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

          <Label htmlFor="nomor_rumah">Nomor Rumah</Label>
          <Select onValueChange={(val) => setNomorRumah(val)} value={nomorRumah}>
            <SelectTrigger className="w-full">
              <SelectValue placeholder="Pilih nomor rumah" />
            </SelectTrigger>
            <SelectContent>
              {rumahQuery.data?.map((item: { nomor: string }) => (
                <SelectItem key={item.nomor} value={String(item.nomor)}>
                  {item.nomor}
                </SelectItem>
              ))}
            </SelectContent>
          </Select>

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

          <Label>Status hunian</Label>
          <Select value={statusHunian} onValueChange={(val) => setStatusHunian(val)}>
            <SelectTrigger className="w-full">
              <SelectValue placeholder="Pilih status hunian" />
            </SelectTrigger>

            <SelectContent>
              <SelectItem value="kontrak">Kontrak</SelectItem>
              <SelectItem value="tetap">Tetap</SelectItem>
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
