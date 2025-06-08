"use client"

import { ColumnDef } from "@tanstack/react-table"
import Image from "next/image"

// This type is used to define the shape of our data.
// You can use a Zod schema here if you want.
export interface RiwayatPenghuni {
    nama: string
    status_hunian: 'kontrak' | 'tetap'
    no_telepon: string
    foto_ktp: string
    tanggal_masuk: string
    tanggal_keluar: string | null
    aktif: boolean
}

export const columns: ColumnDef<RiwayatPenghuni>[] = [
    {
        accessorKey: "nama",
        header: "Penghuni",
        cell: ({ row }) => {
            const nama = row.original.nama
            const fotoKtp = row.original.foto_ktp

            return (
                <div className="flex items-center gap-3">
                    <img
                        src={`http://localhost:8000/api/foto_ktp/${fotoKtp}`}
                        alt={nama}
                        width={40}
                        height={40}
                        className="rounded-full object-cover"
                    />
                    <span className="font-medium">{nama}</span>
                </div>
            )
        },
    },
    {
        accessorKey: "tanggal_masuk",
        header: "Tanggal Masuk",
    },
    {
        accessorKey: "tanggal_keluar",
        header: "Tanggal Keluar",
        cell: ({ getValue }) => {
            const value = getValue()
            return value ? value : <span className="italic text-gray-400">Masih tinggal</span>
        },
    },
]
