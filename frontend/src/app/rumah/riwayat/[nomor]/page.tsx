"use client"

import { useParams } from 'next/navigation'
import { useQuery } from '@tanstack/react-query'
import api from '@/services/api'
import { RiwayatPenghuni, columns } from './columns'
import { DataTable } from "./data-table"

export default function RiwayatPenghuniPage() {
    const params = useParams()
    const nomor_rumah = params?.nomor

    console.log(params)
    const { data, isLoading, error } = useQuery<RiwayatPenghuni[]>({
        queryKey: ['riwayat-penghuni', nomor_rumah],
        queryFn: () => api.get(`/riwayat-penghuni/${nomor_rumah}`).then((res) => res.data.data),
        enabled: !!nomor_rumah,
    })

    if (isLoading) return <p>Mnpm dlx shadcn@latest add data-tableemuat data...</p>
    if (error) return <p>Gagal memuat data riwayat penghuni.</p>
    if (!data || data.length === 0) return <p>Tidak ada riwayat penghuni.</p>

    return (
        <DataTable columns={columns} data={data} />
    )
}
