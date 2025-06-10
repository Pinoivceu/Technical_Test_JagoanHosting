"use client"

import { ColumnDef } from "@tanstack/react-table"
import { Button } from "@/components/ui/button"
import { ArrowUpDown, MoreHorizontal } from "lucide-react"
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import EditWargaForm from "@/components/warga-edit-card"
import WargaActionDelete from "@/components/ui/userdelete-button"

// This type is used to define the shape of our data.
// You can use a Zod schema here if you want.
export type Warga = {
    id: Number
    nama: string
    jenis_kelamin: "laki" | "perempuan"
    nomor_rumah: Number
    status_perkawinan: "menikah" | "lajang" | "bercerai"
    no_telepon: string
    foto_ktp: string
    status_hunian: "kontrak" | "tetap"
    aktif: boolean
}

export const columns: ColumnDef<Warga>[] = [
    {
        accessorKey: "nama",
        header: "Warga",
        cell: ({ row }) => {
            const { nama, foto_ktp } = row.original;
            return (
                <div className="flex items-center gap-4">
                    <img
                        src={`http://localhost:8000/api/foto_ktp/${foto_ktp}`}
                        alt={nama}
                        className="w-10 h-10 rounded-full object-cover"
                    />
                    <span>{nama}</span>
                </div>
            );
        },
    },
    {
        accessorKey: "nomor_rumah",
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() => column.toggleSorting(column.getIsSorted() === "asc")}
                >
                    No. Rumah
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            )
        },

    },
    {
        accessorKey: "status_perkawinan",
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() => column.toggleSorting(column.getIsSorted() === "asc")}
                >
                    Status Perkawinan
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            )
        },
    },
    {
        accessorKey: "no_telepon",
        header: "No. Telepon",
    },
    {
        accessorKey: "status_hunian",
        header: "status_hunian"
    },

    {
        accessorKey: "aktif",
        header: ({ column }) => {
            return (
                <Button
                    variant="ghost"
                    onClick={() => column.toggleSorting(column.getIsSorted() === "asc")}
                >
                    Status
                    <ArrowUpDown className="ml-2 h-4 w-4" />
                </Button>
            )
        },
        cell: ({ row }) => (
            <span className={row.original.aktif ? 'text-green-600' : 'text-red-600'}>
                {row.original.aktif ? 'Aktif' : 'Nonaktif'}
            </span>
        ),
    },

    {
        id: "actions",
        header: "Aksi",
        cell: ({ row }: any) => {
            const data = row.original;

            return (
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <button className="p-2 rounded-full hover:bg-gray-100">
                            <MoreHorizontal className="w-5 h-5" />
                        </button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="start">
                        <EditWargaForm id={(data.id)} />
                        <WargaActionDelete id={(data.id)} />
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },
]