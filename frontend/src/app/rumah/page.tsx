"use client"

import { columns, RumahPenghuni,  } from "./columns"
import { DataTable } from "./data-table"
import { useQuery } from "@tanstack/react-query"
import api from "@/services/api"



export default function WargaPage() {
    const { isPending, error, data, refetch } = useQuery<RumahPenghuni[]>({
        queryKey: ['rumahPenghuni'],
        queryFn: () =>
            api.get('/rumah-penghuni').then((res) => res.data),
    })

    if (isPending) return 'Loading...'

    if (error) return 'An error has occurred: ' + error.message

    return (
        <div className="container p-4 space-y-4 ">
            <DataTable columns={columns} data={data} refreshData={refetch} />
        </div>
    )
}