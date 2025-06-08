"use client"

import { columns, Warga } from "./columns"
import { DataTable } from "./data-table"
import { useQuery } from "@tanstack/react-query"
import AddWargaForm from "@/components/warga-add-card"
import api from "@/services/api"



export default function WargaPage() {
    const { isPending, error, data, refetch } = useQuery<Warga[]>({
        queryKey: ['warga'],
        queryFn: () =>
            api.get('/warga').then((res) => res.data.data),
        select: (raw): Warga[] =>
            raw.map((item) => ({
                id: item.id,
                nama: item.nama,
                jenis_kelamin: item.jenis_kelamin,
                nomor_rumah: item.nomor_rumah ?? 0,
                status_perkawinan: item.status_perkawinan,
                no_telepon: item.no_telepon,
                foto_ktp: item.foto_ktp,
                status_hunian: item.status_hunian,
                aktif: item.aktif,
            })),
    })


    if (isPending) return 'Loading...'

    if (error) return 'An error has occurred: ' + error.message

    return (
        <div className="container p-4 space-y-4 ">
            <DataTable columns={columns} data={data} refreshData={refetch} />
        </div>
    )
}