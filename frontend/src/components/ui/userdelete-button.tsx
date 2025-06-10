"use client";

import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger } from "@/components/ui/dropdown-menu";
import { useNonaktifWarga } from "@/hooks/handleDelete";
import { Button } from "./button";

export default function WargaActionDelete({ id }: { id: any }) {
  const deleteMutation = useNonaktifWarga();

  const handleDelete = () => {
    if (confirm("Yakin ingin menghapus data ini?")) {
      deleteMutation.mutate(id);
    }
  };

  return (
    <div className="w-full">
      <Button variant={"ghost"}  onClick={handleDelete}>Nonaktifkan</Button>
    </div>
  );
}
