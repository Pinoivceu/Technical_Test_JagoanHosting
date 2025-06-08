import { useQueryClient, useMutation } from "@tanstack/react-query";
import api from "@/services/api";

export function useNonaktifWarga() {
  const queryClient = useQueryClient();

  return useMutation({
    mutationFn: (id: any) => api.put(`/warga/${id}/nonaktif`),
    onSuccess: () => {
      alert("Data berhasil dihapus!");
      queryClient.invalidateQueries({ queryKey: ["warga"] });
    },
    onError: (error: any) => {
      alert("Error: " + error.message);
    },
  });
}
