"use client"

import { ColumnDef } from "@tanstack/react-table"
import { Button } from "@/components/ui/button"
import { MoreHorizontal } from "lucide-react"
import WargaActionDelete from "@/components/ui/userdelete-button"
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import EditPenghuniForm from "@/components/edit-penghuni-form"
// This type is used to define the shape of our data.
// You can use a Zod schema here if you want.
export interface PenghuniRumah {
    id: Number
    nama: string
    foto_ktp: string
    no_telepon: string
    tanggal_masuk: string
}

export const columns: ColumnDef<PenghuniRumah>[] = [
    {
        accessorKey: "nama",
        header: "Penghuni",
        cell: ({ row }) => {
            const nama = row.original.nama
            const fotoKtp = row.original.foto_ktp

            return (
                <div className="flex items-center gap-4">
                    <img
                        src={`http://localhost:8000/api/foto_ktp/${fotoKtp}`}
                        alt={nama}
                        className="w-10 h-10 rounded-full object-cover"
                    />
                    <span>{nama}</span>
                </div>
            )
        },
    },
    {
        accessorKey: "no_telepon",
        header: "No. Telepon",
    },
    {
        accessorKey: "tanggal_masuk",
        header: "Tanggal Masuk",
    },
    {
        id: "actions",
        header: "Aksi",
        cell: ({ row }: any) => {
            const data = row.original.id;

            return (
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <button className="p-2 rounded-full hover:bg-gray-100">
                            <MoreHorizontal className="w-5 h-5" />
                        </button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="start">
                        <WargaActionDelete id={data} />
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },

]
