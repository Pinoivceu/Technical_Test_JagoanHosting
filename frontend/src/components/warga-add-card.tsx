"use client"

import { useState } from "react"
import { XIcon } from "lucide-react"
import { useForm } from "react-hook-form"
import { z } from "zod"
import { zodResolver } from "@hookform/resolvers/zod"
import {
    Dialog, DialogContent, DialogTrigger, DialogTitle, DialogDescription, DialogClose
} from "@/components/ui/dialog"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { RadioGroup, RadioGroupItem } from "@/components/ui/radio-group"
import {
    Select, SelectContent, SelectItem, SelectTrigger, SelectValue
} from "@/components/ui/select"
import api from "@/services/api"
import { Plus } from "lucide-react"
import { useQuery } from "@tanstack/react-query"

// Schema Zod
const formSchema = z.object({
    nama: z.string().min(1, "Nama wajib diisi"),
    nomorRumah: z.string().min(1, "Nomor rumah wajib diisi"),
    noTelepon: z.string().min(1, "Nomor telepon wajib diisi"),
    statusPerkawinan: z.enum(["lajang", "menikah", "bercerai"], {
        errorMap: () => ({ message: "Pilih status perkawinan" }),
    }),
    jenisKelamin: z.enum(["laki", "perempuan"], {
        errorMap: () => ({ message: "Pilih jenis kelamin" }),
    }),
    statusHunian: z.enum(["kontrak", "tetap"], {
        errorMap: () => ({ message: "Pilih status hunian" }),
    }),
})

type FormData = z.infer<typeof formSchema>

type AddWargaFormProps = {
    onSuccess?: () => void
}

export default function AddWargaForm({ onSuccess }: AddWargaFormProps) {
    const [fotoKTP, setFotoKTP] = useState<File | null>(null)
    const [previewKTP, setPreviewKTP] = useState<string | null>(null)
    const [open, setOpen] = useState(false)

    const { data, isLoading } = useQuery({
        queryKey: ["nomorRumah"],
        queryFn: async () => {
            const res = await api.get("/rumah")
            return res.data.data
        }
    })

    const {
        register,
        handleSubmit,
        setValue,
        watch,
        reset,
        formState: { errors }
    } = useForm<FormData>({
        resolver: zodResolver(formSchema),
        defaultValues: {
            nama: "",
            nomorRumah: undefined,
            noTelepon: "",
            jenisKelamin: undefined,
            statusPerkawinan: undefined,
            statusHunian: undefined,

        }
    })

    const jenisKelamin = watch("jenisKelamin")
    const statusPerkawinan = watch("statusPerkawinan")
    const nomorRumah = watch("nomorRumah")

    const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files?.[0]
        if (file) {
            setFotoKTP(file)
            const previewUrl = URL.createObjectURL(file)
            setPreviewKTP(previewUrl)
        }
    }

    const onSubmit = async (data: FormData) => {
        const formData = new FormData()
        formData.append("nama", data.nama)
        formData.append("jenis_kelamin", data.jenisKelamin)
        formData.append("nomor_rumah", data.nomorRumah)
        formData.append("status_perkawinan", data.statusPerkawinan)
        formData.append("no_telepon", data.noTelepon)
        formData.append("status_hunian", data.statusHunian)
        if (!fotoKTP) {
            alert("Foto KTP wajib diunggah!")
            return
        }
        if (fotoKTP) {
            formData.append("foto_ktp", fotoKTP)
        }

        try {
            await api.post("/warga", formData, {
                headers: { "Content-Type": "multipart/form-data" }
            })

            alert("Berhasil menambahkan warga!")
            onSuccess?.()
            setOpen(false)
            reset()
            setFotoKTP(null)
            setPreviewKTP(null)
        } catch (error) {
            alert("Gagal menambahkan warga.")
            console.error("Error:", error)
        }
    }

    return (
        <Dialog open={open}>
            <DialogTrigger asChild>
                <Button onClick={() => setOpen(true)}><Plus />Tambah Warga</Button>
            </DialogTrigger>
            <DialogContent showCloseButton={false} className="max-w-md w-full">
                <DialogClose className="items-end flex justify-end ring-offset-background focus:ring-ring data-[state=open]:bg-accent data-[state=open]:text-muted-foreground absolute top-4 right-4 rounded-xs opacity-70 transition-opacity hover:opacity-100 focus:ring-2 focus:ring-offset-2 focus:outline-hidden disabled:pointer-events-none [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4" onClick={() => setOpen(false)}><XIcon /></DialogClose>
                <DialogTitle>Tambah Warga</DialogTitle>
                <DialogDescription>Isi data lengkap untuk menambahkan warga baru.</DialogDescription>
                <form onSubmit={handleSubmit(onSubmit)} className="space-y-2">
                    <div className="relative mx-auto w-15 h-15">
                        <label htmlFor="foto_ktp" className="cursor-pointer group block w-full h-full">
                            <div className="w-full h-full rounded-full border-2 border-dashed border-gray-400 flex items-center justify-center overflow-hidden bg-gray-100">
                                {previewKTP ? (
                                    <img src={previewKTP} alt="Preview KTP" className="w-full h-full object-cover rounded-full" />
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

                    <div>
                        <Label htmlFor="nama">Nama</Label>
                        <Input id="nama" {...register("nama")} />
                        {errors.nama && <p className="text-sm text-red-500">{errors.nama.message}</p>}
                    </div>

                    <div>
                        <Label htmlFor="nomor_rumah">Nomor Rumah</Label>
                        <Select
                            onValueChange={(val) => setValue("nomorRumah", val as any)}
                            value={nomorRumah}
                            disabled={isLoading}
                        >
                            <SelectTrigger className="w-full">
                                <SelectValue placeholder="Pilih nomor rumah" />
                            </SelectTrigger>
                            <SelectContent>
                                {data?.map((item: { nomor: string }) => (
                                    <SelectItem key={item.nomor} value={String(item.nomor)}>
                                        {item.nomor}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        {errors.nomorRumah && <p className="text-sm text-red-500">{errors.nomorRumah.message}</p>}
                    </div>


                    <div>
                        <Label htmlFor="no_telepon">No Telepon</Label>
                        <Input id="no_telepon" {...register("noTelepon")} />
                        {errors.noTelepon && <p className="text-sm text-red-500">{errors.noTelepon.message}</p>}
                    </div>

                    <div>
                        <Label>Status Perkawinan</Label>
                        <Select value={statusPerkawinan} onValueChange={(val) => setValue("statusPerkawinan", val as any)}>
                            <SelectTrigger className="w-full">
                                <SelectValue placeholder="Pilih status perkawinan" />
                            </SelectTrigger>

                            <SelectContent>
                                <SelectItem value="lajang">Lajang</SelectItem>
                                <SelectItem value="menikah">Menikah</SelectItem>
                                <SelectItem value="bercerai">Bercerai</SelectItem>
                            </SelectContent>
                        </Select>
                        {errors.statusPerkawinan && <p className="text-sm text-red-500">{errors.statusPerkawinan.message}</p>}
                    </div>
                    <div>
                        <Label>Status Hunian</Label>
                        <Select
                            value={watch("statusHunian")}
                            onValueChange={(val) => setValue("statusHunian", val as any)}
                        >
                            <SelectTrigger className="w-full">
                                <SelectValue placeholder="Pilih status hunian" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="kontrak">Kontrak</SelectItem>
                                <SelectItem value="tetap">Tetap</SelectItem>
                            </SelectContent>
                        </Select>
                        {errors.statusHunian && (
                            <p className="text-sm text-red-500">{errors.statusHunian.message}</p>
                        )}
                    </div>

                    <div>
                        <Label>Jenis Kelamin</Label>
                        <RadioGroup value={jenisKelamin} onValueChange={(val) => setValue("jenisKelamin", val as any)} className="flex space-x-6 py-2">
                            <div className="flex items-center space-x-2">
                                <RadioGroupItem value="laki" id="jk-laki" />
                                <Label htmlFor="jk-laki">Laki-laki</Label>
                            </div>
                            <div className="flex items-center space-x-2">
                                <RadioGroupItem value="perempuan" id="jk-perempuan" />
                                <Label htmlFor="jk-perempuan">Perempuan</Label>
                            </div>
                        </RadioGroup>
                        {errors.jenisKelamin && <p className="text-sm text-red-500">{errors.jenisKelamin.message}</p>}
                    </div>

                    <Button type="submit" className="w-full">Tambah Warga</Button>
                </form>
            </DialogContent>
        </Dialog >
    )
}
