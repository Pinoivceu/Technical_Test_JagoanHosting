"use client"

import { useParams } from 'next/navigation'
import { useQuery } from '@tanstack/react-query'
import api from '@/services/api'
import { PenghuniRumah, columns } from './columns'
import { DataTable } from "./data-table"

export default function PenghuniRumahPage() {
    const params = useParams()
    const nomor_rumah = params?.nomor

    const { data, isLoading, error, refetch } = useQuery({
        queryKey: ['penghuniRumah', nomor_rumah],
        queryFn: () => api.get(`/rumah-penghuni/${nomor_rumah}`).then((res) => res.data),
        enabled: !!nomor_rumah,

    })
    const statusHunian = data?.status_hunian
    const dataTable = data?.penghuni

    if (isLoading) return <p>Memuat data...</p>

    return (
        <div className='w-full rounded-md p-4'>
            <DataTable columns={columns} data={dataTable} refreshData={refetch} nomor_rumah={nomor_rumah} status_hunian={statusHunian} />
        </div>
    )
}
