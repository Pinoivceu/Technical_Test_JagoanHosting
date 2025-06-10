"use client"

import { ColumnDef } from "@tanstack/react-table"
import { Button } from "@/components/ui/button"
import { ArrowUpDown, Ghost, MoreHorizontal } from "lucide-react"
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu"
import EditWargaForm from "@/components/warga-edit-card"
import WargaActionDelete from "@/components/ui/userdelete-button"
import Link from "next/link"

// This type is used to define the shape of our data.
// You can use a Zod schema here if you want.
export type RumahPenghuni = {
    nomor_rumah: number
    status_hunian: string
    status_rumah: String
    penghuni: {
        nama: string
        status_hunian: "kontrak" | "tetap"
        foto_ktp: string
    }[]
}

export const columns: ColumnDef<RumahPenghuni>[] = [
    {
        accessorKey: "nomor_rumah",
        header: ({ column }) => (
            <Button
                variant="ghost"
                onClick={() => column.toggleSorting(column.getIsSorted() === "asc")}
            >
                Nomor Rumah
                <ArrowUpDown className="ml-2 h-4 w-4" />
            </Button>
        ),
    },
    {
        accessorKey: "penghuni",
        header: "Penghuni",
        cell: ({ row }) => {
            const penghuni = row.original.penghuni

            if (penghuni.length === 0) {
                return <span className="text-gray-400 italic">Kosong</span>
            }

            return (
                <div className="space-y-2">
                    {penghuni.map((p, i) => (
                        <div key={i} className="flex items-center gap-3">
                            <img
                                src={`http://localhost:8000/api/foto_ktp/${p.foto_ktp}`}
                                alt={p.nama}
                                className="w-8 h-8 rounded-full object-cover"
                            />
                            <div>
                                <div className="font-medium">{p.nama}</div>
                            </div>
                        </div>
                    ))}
                </div>
            )
        },
    },

    {
        accessorKey: "status_hunian",
        header: "kontrak/tetap",
    },

    {
        accessorKey: "status_rumah",
        header: "status",
    },
    {
        id: "actions",
        header: "Aksi",
        cell: ({ row }: any) => {
            const data = row.original.nomor_rumah;

            return (
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <button className="p-2 rounded-full hover:bg-gray-100">
                            <MoreHorizontal className="w-5 h-5" />
                        </button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="start">
                        <div>
                            <Link href={`/rumah/details/${data}`} >
                                <Button variant={"ghost"}>Lihat Penghuni</Button>
                            </Link>
                        </div>
                        <div>
                            <Link href={`/rumah/riwayat/${data}`}>
                                <Button variant={"ghost"}>Riwayat Penghuni</Button>
                            </Link>
                        </div>
                        <div>
                            <Link href={`/rumah/pembayaran/${data}`}>
                                <Button variant={"ghost"}>Riwayat Pembayaran</Button>
                            </Link>
                        </div>
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },
]