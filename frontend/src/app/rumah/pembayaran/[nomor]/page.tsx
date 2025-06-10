"use client"

import { useParams } from 'next/navigation'
import { useQuery } from '@tanstack/react-query'
import api from '@/services/api'
import { Warga, columns } from './columns'
import { DataTable } from './data-table'

export default function PenghuniRumahPage() {
    const params = useParams()
    const nomor_rumah = params?.nomor

    const { data, isLoading, error, refetch } = useQuery({
        queryKey: ['penghuniRumah', nomor_rumah],
        queryFn: () => api.get(`/pembayaran-history?nomor_rumah=${nomor_rumah}`).then((res) => res.data),
        enabled: !!nomor_rumah,

    })

    if (isLoading) return <p>Memuat data...</p>

    return (
        <div className='w-1/2 rounded-md p-4'>
            <DataTable columns={columns} data={data} refreshData={refetch} nomor_rumah={nomor_rumah}  />
        </div>
    )
}
