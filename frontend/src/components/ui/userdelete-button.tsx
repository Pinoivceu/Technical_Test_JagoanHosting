"use client";

import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu";
import { useNonaktifWarga } from "@/hooks/handleDelete";

export default function WargaActionDelete({ id }: { id: any }) {
  const deleteMutation = useNonaktifWarga();

  const handleDelete = () => {
    if (confirm("Yakin ingin menghapus data ini?")) {
      deleteMutation.mutate(id);
    }
  };

  return (

        <DropdownMenuItem onClick={handleDelete}>Hapus</DropdownMenuItem>
  
  );
}
