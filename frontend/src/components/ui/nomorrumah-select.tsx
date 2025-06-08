import { useState, useEffect } from "react"
import { useQuery } from "@tanstack/react-query"
import api from "@/services/api"
import {
  Command,
  CommandInput,
  CommandList,
  CommandEmpty,
  CommandGroup,
  CommandItem,
} from "@/components/ui/command"

export default function NomorRumahSelect() {
  const { data, isLoading } = useQuery<any[]>({
    queryKey: ["nomorRumah"],
    queryFn: async () => {
      const res = await api.get("/rumah")
      return res.data.data
    }
  })

  const [selected, setSelected] = useState("")
  const [search, setSearch] = useState("")

  // Filter data nomor rumah sesuai input search
  const filteredData = data
    ? data.filter(item => item.nomor.toString().includes(search))
    : []

  return (
    <div style={{ width: 300 }}>
      <Command >
        <CommandInput
          placeholder="Cari nomor rumah..."
          value={selected || search}
          onValueChange={(value) => {
            setSearch(value)
            setSelected("")
          }}
        />
        <CommandList>
          {isLoading && <CommandEmpty>Loading...</CommandEmpty>}
          {!isLoading && filteredData.length === 0 && (
            <CommandEmpty>No results found.</CommandEmpty>
          )}
          <CommandGroup>
            {filteredData.map((item) => (
              <CommandItem
                key={item.nomor}
                onSelect={() => {
                  setSelected(item.nomor.toString())
                  setSearch("")
                }}
              >
                {item.nomor}
              </CommandItem>
            ))}
          </CommandGroup>
        </CommandList>
      </Command>
    </div>
  )
}
