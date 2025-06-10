"use client"

import React, { useState } from 'react';
import api from '@/services/api';
import { Plus, XIcon } from 'lucide-react';
import { Button } from './ui/button';
import { Dialog, DialogContent, DialogDescription, DialogTitle, DialogTrigger,DialogClose } from "@/components/ui/dialog"

function FormPembayaran() {
    const [idPembayar, setIdPembayar] = useState('');
    const [nomorRumah, setNomorRumah] = useState('');
    const [open, setOpen] = useState(false);
    const [bulanKebersihan, setBulanKebersihan] = useState<string[]>([]);
    const [bulanSatpam, setBulanSatpam] = useState<string[]>([]);

    const handleSubmit = async (e: any) => {
        e.preventDefault();

        try {
            await api.post('/pembayaran', {
                id_pembayar: parseInt(idPembayar),
                nomor_rumah: nomorRumah,
                iuran: [
                    {
                        id_iuran: 1,
                        jumlah: 25000,
                        bulan: bulanKebersihan,
                    },
                    {
                        id_iuran: 2,
                        jumlah: 50000,
                        bulan: bulanSatpam,
                    },
                ],
            });

            alert('Pembayaran berhasil disimpan!');
        } catch (error) {
            alert('Error saat menyimpan pembayaran');
        }
    };

    return (
        <Dialog open={open}>
            <DialogTrigger asChild>
                <Button onClick={() => setOpen(true)}><Plus />Tambah Pembayaran iuran</Button>
            </DialogTrigger>
            <DialogContent showCloseButton={false} className="max-w-md w-full">
                <DialogClose className="items-end flex justify-end ring-offset-background openfocus:ring-ring data-[state=open]:bg-accent data-[state=open]:text-muted-foreground absolute top-4 right-4 rounded-xs opacity-70 transition-opacity hover:opacity-100 focus:ring-2 focus:ring-offset-2 focus:outline-hidden disabled:pointer-events-none [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4" onClick={() => setOpen(false)}><XIcon /></DialogClose>
                <DialogTitle>Tambah Pembayaran Iuran</DialogTitle>
                <DialogDescription>Isi data lengkap untuk menambahkan Pembayaran iuran.</DialogDescription>
        <form onSubmit={handleSubmit} className="max-w-md mx-auto p-6 bg-card rounded-md ">
            <input
                type="number"
                placeholder="ID Pembayar"
                value={idPembayar}
                onChange={(e) => setIdPembayar(e.target.value)}
                required
                className="w-full mb-4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <input
                type="text"
                placeholder="Nomor Rumah"
                value={nomorRumah}
                onChange={(e) => setNomorRumah(e.target.value)}
                required
                className="w-full mb-4 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />

            <label className="block font-semibold mb-2">Iuran Kebersihan (Pilih Bulan):</label>
            <input
                type="month"
                onChange={(e) => {
                    const val = e.target.value;
                    if (!bulanKebersihan.includes(val)) {
                        setBulanKebersihan([...bulanKebersihan, val]);
                    }
                }}
                className="w-full mb-2 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <div className="mb-4">
                {bulanKebersihan.map((b) => (
                    <span key={b} className="inline-block bg-blue-500 text-white text-sm px-3 py-1 rounded-full mr-2 mt-1">{b}</span>
                ))}
            </div>

            <label className="block font-semibold mb-2">Iuran Satpam (Pilih Bulan):</label>
            <input
                type="month"
                onChange={(e) => {
                    const val = e.target.value;
                    if (!bulanSatpam.includes(val)) {
                        setBulanSatpam([...bulanSatpam, val]);
                    }
                }}
                className="w-full mb-2 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
            />
            <div className="mb-6">
                {bulanSatpam.map((b) => (
                    <span key={b} className="inline-block bg-green-500 text-white text-sm px-3 py-1 rounded-full mr-2 mt-1">{b}</span>
                ))}
            </div>

            <button
                type="submit"
                className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition-colors duration-200"
            >
                Simpan Pembayaran
            </button>
        </form>
              </DialogContent>
            </Dialog>
    );
}

export default FormPembayaran;
