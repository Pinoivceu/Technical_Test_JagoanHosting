import { ColumnDef } from "@tanstack/react-table"

export interface Warga {
  nama: string
  nomor_rumah: number
  status_iuran: {
    [jenis: string]: {
      [bulan: string]: string
    }
  }
}

const bulanList = [
  "2025-01",
  "2025-02",
  "2025-03",
  "2025-04",
  "2025-05",
  "2025-06",
  "2025-07",
  "2025-08",
  "2025-09",
  "2025-10",
  "2025-11",
  "2025-12",
]

export const columns: ColumnDef<Warga>[] = [
  {
    accessorKey: "nama",
    header: "Nama",
  },
  {
    accessorKey: "nomor_rumah",
    header: "No. Rumah",
  },
  ...bulanList.map((bulan) => ({
    id: `status_iuran_${bulan}`,
    header: `Status Iuran ${bulan}`,
    cell: ({ row }: any) => {
      const status = row.original.status_iuran
      const kebersihan = status?.["Iuran Kebersihan"]?.[bulan] || "N/A"
      const satpam = status?.["Iuran Satpam"]?.[bulan] || "N/A"

      return (
        <div className="text-xs space-y-1">
          <div>
            Kebersihan:{" "}
            <span className={kebersihan === "lunas" ? "text-green-600" : "text-red-600"}>
              {kebersihan}
            </span>
          </div>
          <div>
            Satpam:{" "}
            <span className={satpam === "lunas" ? "text-green-600" : "text-red-600"}>
              {satpam}
            </span>
          </div>
        </div>
      )
    },
  })),
]
