<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengeluaranSeeders extends Seeder
{
     /**
      * Run the database seeds.
      */
     public function run(): void
     {

          $pengeluaran = [
               [
                    "tanggal" => "2024-07-01",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 118420,

               ],
               [
                    "tanggal" => "2024-07-02",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 579590,

               ],
               [
                    "tanggal" => "2024-07-03",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 328951,

               ],
               [
                    "tanggal" => "2024-07-04",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 534366,

               ],
               [
                    "tanggal" => "2024-07-05",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 126231,

               ],
               [
                    "tanggal" => "2024-07-06",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 843387,

               ],
               [
                    "tanggal" => "2024-07-07",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 935005,

               ],
               [
                    "tanggal" => "2024-07-08",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 281080,

               ],
               [
                    "tanggal" => "2024-07-09",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 859025,

               ],
               [
                    "tanggal" => "2024-07-10",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 351056,

               ],
               [
                    "tanggal" => "2024-07-11",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Biaya perbaikan AC",
                    "jumlah" => 463627,

               ],
               [
                    "tanggal" => "2024-07-12",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 535326,

               ],
               [
                    "tanggal" => "2024-07-13",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 755706,

               ],
               [
                    "tanggal" => "2024-07-14",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 853317,

               ],
               [
                    "tanggal" => "2024-07-15",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 598490,

               ],
               [
                    "tanggal" => "2024-07-16",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 580961,

               ],
               [
                    "tanggal" => "2024-07-17",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 739281,

               ],
               [
                    "tanggal" => "2024-07-18",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 189726,

               ],
               [
                    "tanggal" => "2024-07-19",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 703594,

               ],
               [
                    "tanggal" => "2024-07-20",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 673676,

               ],
               [
                    "tanggal" => "2024-07-21",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 713529,

               ],
               [
                    "tanggal" => "2024-07-22",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 472023,

               ],
               [
                    "tanggal" => "2024-07-23",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 478838,

               ],
               [
                    "tanggal" => "2024-07-24",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 873769,

               ],
               [
                    "tanggal" => "2024-07-25",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 348576,

               ],
               [
                    "tanggal" => "2024-07-26",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 536829,

               ],
               [
                    "tanggal" => "2024-07-27",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 855540,

               ],
               [
                    "tanggal" => "2024-07-28",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Biaya perbaikan AC",
                    "jumlah" => 957391,

               ],
               [
                    "tanggal" => "2024-07-29",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 948926,

               ],
               [
                    "tanggal" => "2024-07-30",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 543587,

               ],
               [
                    "tanggal" => "2024-07-31",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 714962,

               ],
               [
                    "tanggal" => "2024-08-01",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 419724,

               ],
               [
                    "tanggal" => "2024-08-02",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 508516,

               ],
               [
                    "tanggal" => "2024-08-03",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 549746,

               ],
               [
                    "tanggal" => "2024-08-04",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 431679,

               ],
               [
                    "tanggal" => "2024-08-05",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 851590,

               ],
               [
                    "tanggal" => "2024-08-06",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 320811,

               ],
               [
                    "tanggal" => "2024-08-07",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 766790,

               ],
               [
                    "tanggal" => "2024-08-08",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 394438,

               ],
               [
                    "tanggal" => "2024-08-09",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 175414,

               ],
               [
                    "tanggal" => "2024-08-10",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 479946,

               ],
               [
                    "tanggal" => "2024-08-11",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 387869,

               ],
               [
                    "tanggal" => "2024-08-12",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 420829,

               ],
               [
                    "tanggal" => "2024-08-13",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 696212,

               ],
               [
                    "tanggal" => "2024-08-14",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 265758,

               ],
               [
                    "tanggal" => "2024-08-15",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 123865,

               ],
               [
                    "tanggal" => "2024-08-16",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 139299,

               ],
               [
                    "tanggal" => "2024-08-17",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 470218,

               ],
               [
                    "tanggal" => "2024-08-18",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 900858,

               ],
               [
                    "tanggal" => "2024-08-19",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 539422,

               ],
               [
                    "tanggal" => "2024-08-20",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 852953,

               ],
               [
                    "tanggal" => "2024-08-21",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 385816,

               ],
               [
                    "tanggal" => "2024-08-22",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 195648,

               ],
               [
                    "tanggal" => "2024-08-23",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 110470,

               ],
               [
                    "tanggal" => "2024-08-24",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 702410,

               ],
               [
                    "tanggal" => "2024-08-25",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 249836,

               ],
               [
                    "tanggal" => "2024-08-26",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 290033,

               ],
               [
                    "tanggal" => "2024-08-27",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 440489,

               ],
               [
                    "tanggal" => "2024-08-28",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 848043,

               ],
               [
                    "tanggal" => "2024-08-29",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 161897,

               ],
               [
                    "tanggal" => "2024-08-30",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 815985,

               ],
               [
                    "tanggal" => "2024-08-31",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 302488,

               ],
               [
                    "tanggal" => "2024-09-01",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 522334,

               ],
               [
                    "tanggal" => "2024-09-02",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 663039,

               ],
               [
                    "tanggal" => "2024-09-03",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 248445,

               ],
               [
                    "tanggal" => "2024-09-04",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 504470,

               ],
               [
                    "tanggal" => "2024-09-05",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 436152,

               ],
               [
                    "tanggal" => "2024-09-06",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 694630,

               ],
               [
                    "tanggal" => "2024-09-07",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 632998,

               ],
               [
                    "tanggal" => "2024-09-08",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 855625,

               ],
               [
                    "tanggal" => "2024-09-09",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 917990,

               ],
               [
                    "tanggal" => "2024-09-10",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 688310,

               ],
               [
                    "tanggal" => "2024-09-11",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 742842,

               ],
               [
                    "tanggal" => "2024-09-12",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 413205,

               ],
               [
                    "tanggal" => "2024-09-13",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 885791,

               ],
               [
                    "tanggal" => "2024-09-14",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 796137,

               ],
               [
                    "tanggal" => "2024-09-15",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 788288,

               ],
               [
                    "tanggal" => "2024-09-16",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 662603,

               ],
               [
                    "tanggal" => "2024-09-17",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 373962,

               ],
               [
                    "tanggal" => "2024-09-18",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 571629,

               ],
               [
                    "tanggal" => "2024-09-19",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 844157,

               ],
               [
                    "tanggal" => "2024-09-20",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 810948,

               ],
               [
                    "tanggal" => "2024-09-21",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 162315,

               ],
               [
                    "tanggal" => "2024-09-22",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 249367,

               ],
               [
                    "tanggal" => "2024-09-23",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 943485,

               ],
               [
                    "tanggal" => "2024-09-24",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 792849,

               ],
               [
                    "tanggal" => "2024-09-25",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 973851,

               ],
               [
                    "tanggal" => "2024-09-26",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 199552,

               ],
               [
                    "tanggal" => "2024-09-27",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 164107,

               ],
               [
                    "tanggal" => "2024-09-28",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 138363,

               ],
               [
                    "tanggal" => "2024-09-29",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 143445,

               ],
               [
                    "tanggal" => "2024-09-30",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 692651,

               ],
               [
                    "tanggal" => "2024-10-01",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 504100,

               ],
               [
                    "tanggal" => "2024-10-02",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 383591,

               ],
               [
                    "tanggal" => "2024-10-03",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 501246,

               ],
               [
                    "tanggal" => "2024-10-04",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 835478,

               ],
               [
                    "tanggal" => "2024-10-05",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 994140,

               ],
               [
                    "tanggal" => "2024-10-06",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 962613,

               ],
               [
                    "tanggal" => "2024-10-07",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 682271,

               ],
               [
                    "tanggal" => "2024-10-08",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 641077,

               ],
               [
                    "tanggal" => "2024-10-09",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 782692,

               ],
               [
                    "tanggal" => "2024-10-10",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 289575,

               ],
               [
                    "tanggal" => "2024-10-11",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 968319,

               ],
               [
                    "tanggal" => "2024-10-12",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 894466,

               ],
               [
                    "tanggal" => "2024-10-13",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 497200,

               ],
               [
                    "tanggal" => "2024-10-14",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 835612,

               ],
               [
                    "tanggal" => "2024-10-15",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 944278,

               ],
               [
                    "tanggal" => "2024-10-16",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 911473,

               ],
               [
                    "tanggal" => "2024-10-17",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 680276,

               ],
               [
                    "tanggal" => "2024-10-18",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 922122,

               ],
               [
                    "tanggal" => "2024-10-19",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 658399,

               ],
               [
                    "tanggal" => "2024-10-20",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 291676,

               ],
               [
                    "tanggal" => "2024-10-21",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 904044,

               ],
               [
                    "tanggal" => "2024-10-22",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 132824,

               ],
               [
                    "tanggal" => "2024-10-23",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 665817,

               ],
               [
                    "tanggal" => "2024-10-24",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 830022,

               ],
               [
                    "tanggal" => "2024-10-25",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 761905,

               ],
               [
                    "tanggal" => "2024-10-26",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 435095,

               ],
               [
                    "tanggal" => "2024-10-27",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 872609,

               ],
               [
                    "tanggal" => "2024-10-28",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 200363,

               ],
               [
                    "tanggal" => "2024-10-29",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 643323,

               ],
               [
                    "tanggal" => "2024-10-30",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 745361,

               ],
               [
                    "tanggal" => "2024-10-31",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 434995,

               ],
               [
                    "tanggal" => "2024-11-01",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 849947,

               ],
               [
                    "tanggal" => "2024-11-02",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 623863,

               ],
               [
                    "tanggal" => "2024-11-03",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 105891,

               ],
               [
                    "tanggal" => "2024-11-04",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 190208,

               ],
               [
                    "tanggal" => "2024-11-05",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 789904,

               ],
               [
                    "tanggal" => "2024-11-06",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 775198,

               ],
               [
                    "tanggal" => "2024-11-07",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 989673,

               ],
               [
                    "tanggal" => "2024-11-08",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 873936,

               ],
               [
                    "tanggal" => "2024-11-09",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 500517,

               ],
               [
                    "tanggal" => "2024-11-10",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 725062,

               ],
               [
                    "tanggal" => "2024-11-11",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 278857,

               ],
               [
                    "tanggal" => "2024-11-12",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 160404,

               ],
               [
                    "tanggal" => "2024-11-13",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 344558,

               ],
               [
                    "tanggal" => "2024-11-14",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 340376,

               ],
               [
                    "tanggal" => "2024-11-15",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 272732,

               ],
               [
                    "tanggal" => "2024-11-16",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 864049,

               ],
               [
                    "tanggal" => "2024-11-17",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 592472,

               ],
               [
                    "tanggal" => "2024-11-18",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 247271,

               ],
               [
                    "tanggal" => "2024-11-19",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 310441,

               ],
               [
                    "tanggal" => "2024-11-20",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 328840,

               ],
               [
                    "tanggal" => "2024-11-21",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 201327,

               ],
               [
                    "tanggal" => "2024-11-22",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 336679,

               ],
               [
                    "tanggal" => "2024-11-23",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 474671,

               ],
               [
                    "tanggal" => "2024-11-24",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 458119,

               ],
               [
                    "tanggal" => "2024-11-25",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 223800,

               ],
               [
                    "tanggal" => "2024-11-26",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Biaya perbaikan AC",
                    "jumlah" => 422819,

               ],
               [
                    "tanggal" => "2024-11-27",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 274841,

               ],
               [
                    "tanggal" => "2024-11-28",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 575961,

               ],
               [
                    "tanggal" => "2024-11-29",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 851093,

               ],
               [
                    "tanggal" => "2024-11-30",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 305962,

               ],
               [
                    "tanggal" => "2024-12-01",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 635211,

               ],
               [
                    "tanggal" => "2024-12-02",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 123370,

               ],
               [
                    "tanggal" => "2024-12-03",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 702577,

               ],
               [
                    "tanggal" => "2024-12-04",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 242363,

               ],
               [
                    "tanggal" => "2024-12-05",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 579282,

               ],
               [
                    "tanggal" => "2024-12-06",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 647825,

               ],
               [
                    "tanggal" => "2024-12-07",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 770860,

               ],
               [
                    "tanggal" => "2024-12-08",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 136702,

               ],
               [
                    "tanggal" => "2024-12-09",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 129395,

               ],
               [
                    "tanggal" => "2024-12-10",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 425865,

               ],
               [
                    "tanggal" => "2024-12-11",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 203867,

               ],
               [
                    "tanggal" => "2024-12-12",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 665798,

               ],
               [
                    "tanggal" => "2024-12-13",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 948368,

               ],
               [
                    "tanggal" => "2024-12-14",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 324235,

               ],
               [
                    "tanggal" => "2024-12-15",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 266142,

               ],
               [
                    "tanggal" => "2024-12-16",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 110672,

               ],
               [
                    "tanggal" => "2024-12-17",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 674872,

               ],
               [
                    "tanggal" => "2024-12-18",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 602909,

               ],
               [
                    "tanggal" => "2024-12-19",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 231717,

               ],
               [
                    "tanggal" => "2024-12-20",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 924543,

               ],
               [
                    "tanggal" => "2024-12-21",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 358705,

               ],
               [
                    "tanggal" => "2024-12-22",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 895994,

               ],
               [
                    "tanggal" => "2024-12-23",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 705119,

               ],
               [
                    "tanggal" => "2024-12-24",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 450862,

               ],
               [
                    "tanggal" => "2024-12-25",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 776690,

               ],
               [
                    "tanggal" => "2024-12-26",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 979507,

               ],
               [
                    "tanggal" => "2024-12-27",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 720446,

               ],
               [
                    "tanggal" => "2024-12-28",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 216397,

               ],
               [
                    "tanggal" => "2024-12-29",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 800926,

               ],
               [
                    "tanggal" => "2024-12-30",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 620370,

               ],
               [
                    "tanggal" => "2024-12-31",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 393968,

               ],
               [
                    "tanggal" => "2025-01-01",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 512411,

               ],
               [
                    "tanggal" => "2025-01-02",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Biaya perbaikan AC",
                    "jumlah" => 679003,

               ],
               [
                    "tanggal" => "2025-01-03",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 475709,

               ],
               [
                    "tanggal" => "2025-01-04",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 936827,

               ],
               [
                    "tanggal" => "2025-01-05",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 556008,

               ],
               [
                    "tanggal" => "2025-01-06",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 743831,

               ],
               [
                    "tanggal" => "2025-01-07",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 188262,

               ],
               [
                    "tanggal" => "2025-01-08",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 674705,

               ],
               [
                    "tanggal" => "2025-01-09",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 839240,

               ],
               [
                    "tanggal" => "2025-01-10",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 423997,

               ],
               [
                    "tanggal" => "2025-01-11",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 185277,

               ],
               [
                    "tanggal" => "2025-01-12",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 775856,

               ],
               [
                    "tanggal" => "2025-01-13",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 485225,

               ],
               [
                    "tanggal" => "2025-01-14",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 676495,

               ],
               [
                    "tanggal" => "2025-01-15",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 607329,

               ],
               [
                    "tanggal" => "2025-01-16",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 866539,

               ],
               [
                    "tanggal" => "2025-01-17",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 315802,

               ],
               [
                    "tanggal" => "2025-01-18",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 950879,

               ],
               [
                    "tanggal" => "2025-01-19",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 623093,

               ],
               [
                    "tanggal" => "2025-01-20",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 230475,

               ],
               [
                    "tanggal" => "2025-01-21",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 544106,

               ],
               [
                    "tanggal" => "2025-01-22",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 690145,

               ],
               [
                    "tanggal" => "2025-01-23",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 721543,

               ],
               [
                    "tanggal" => "2025-01-24",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 335108,

               ],
               [
                    "tanggal" => "2025-01-25",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 947884,

               ],
               [
                    "tanggal" => "2025-01-26",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 358304,

               ],
               [
                    "tanggal" => "2025-01-27",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 134313,

               ],
               [
                    "tanggal" => "2025-01-28",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 363105,

               ],
               [
                    "tanggal" => "2025-01-29",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 684747,

               ],
               [
                    "tanggal" => "2025-01-30",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 661346,

               ],
               [
                    "tanggal" => "2025-01-31",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 835153,

               ],
               [
                    "tanggal" => "2025-02-01",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 591308,

               ],
               [
                    "tanggal" => "2025-02-02",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 455267,

               ],
               [
                    "tanggal" => "2025-02-03",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 379164,

               ],
               [
                    "tanggal" => "2025-02-04",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 733073,

               ],
               [
                    "tanggal" => "2025-02-05",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 401560,

               ],
               [
                    "tanggal" => "2025-02-06",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 944047,

               ],
               [
                    "tanggal" => "2025-02-07",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 397366,

               ],
               [
                    "tanggal" => "2025-02-08",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 935218,

               ],
               [
                    "tanggal" => "2025-02-09",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 756655,

               ],
               [
                    "tanggal" => "2025-02-10",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 819515,

               ],
               [
                    "tanggal" => "2025-02-11",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 226062,

               ],
               [
                    "tanggal" => "2025-02-12",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 933759,

               ],
               [
                    "tanggal" => "2025-02-13",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 407765,

               ],
               [
                    "tanggal" => "2025-02-14",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 865474,

               ],
               [
                    "tanggal" => "2025-02-15",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 161610,

               ],
               [
                    "tanggal" => "2025-02-16",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 836287,

               ],
               [
                    "tanggal" => "2025-02-17",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 834925,

               ],
               [
                    "tanggal" => "2025-02-18",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 513951,

               ],
               [
                    "tanggal" => "2025-02-19",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 230125,

               ],
               [
                    "tanggal" => "2025-02-20",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 431440,

               ],
               [
                    "tanggal" => "2025-02-21",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 895359,

               ],
               [
                    "tanggal" => "2025-02-22",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 102899,

               ],
               [
                    "tanggal" => "2025-02-23",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 600474,

               ],
               [
                    "tanggal" => "2025-02-24",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 344662,

               ],
               [
                    "tanggal" => "2025-02-25",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 753923,

               ],
               [
                    "tanggal" => "2025-02-26",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 779743,

               ],
               [
                    "tanggal" => "2025-02-27",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 627139,

               ],
               [
                    "tanggal" => "2025-02-28",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 889111,

               ],
               [
                    "tanggal" => "2025-03-01",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 712543,

               ],
               [
                    "tanggal" => "2025-03-02",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 947094,

               ],
               [
                    "tanggal" => "2025-03-03",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 927631,

               ],
               [
                    "tanggal" => "2025-03-04",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 949428,

               ],
               [
                    "tanggal" => "2025-03-05",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 804064,

               ],
               [
                    "tanggal" => "2025-03-06",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 488744,

               ],
               [
                    "tanggal" => "2025-03-07",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 235545,

               ],
               [
                    "tanggal" => "2025-03-08",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 634637,

               ],
               [
                    "tanggal" => "2025-03-09",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 296454,

               ],
               [
                    "tanggal" => "2025-03-10",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Biaya perbaikan AC",
                    "jumlah" => 766836,

               ],
               [
                    "tanggal" => "2025-03-11",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Biaya perbaikan AC",
                    "jumlah" => 169711,

               ],
               [
                    "tanggal" => "2025-03-12",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 761351,

               ],
               [
                    "tanggal" => "2025-03-13",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 151804,

               ],
               [
                    "tanggal" => "2025-03-14",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 261086,

               ],
               [
                    "tanggal" => "2025-03-15",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 147362,

               ],
               [
                    "tanggal" => "2025-03-16",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 590402,

               ],
               [
                    "tanggal" => "2025-03-17",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 703489,

               ],
               [
                    "tanggal" => "2025-03-18",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 848396,

               ],
               [
                    "tanggal" => "2025-03-19",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 582273,

               ],
               [
                    "tanggal" => "2025-03-20",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 481704,

               ],
               [
                    "tanggal" => "2025-03-21",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 176977,

               ],
               [
                    "tanggal" => "2025-03-22",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 934309,

               ],
               [
                    "tanggal" => "2025-03-23",
                    "kategori" => "Gaji",
                    "deskripsi" => "Bonus tahunan",
                    "jumlah" => 785995,

               ],
               [
                    "tanggal" => "2025-03-24",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 465149,

               ],
               [
                    "tanggal" => "2025-03-25",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 997979,

               ],
               [
                    "tanggal" => "2025-03-26",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 239931,

               ],
               [
                    "tanggal" => "2025-03-27",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 458732,

               ],
               [
                    "tanggal" => "2025-03-28",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 250677,

               ],
               [
                    "tanggal" => "2025-03-29",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 394977,

               ],
               [
                    "tanggal" => "2025-03-30",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 601138,

               ],
               [
                    "tanggal" => "2025-03-31",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 466223,

               ],
               [
                    "tanggal" => "2025-04-01",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 974210,

               ],
               [
                    "tanggal" => "2025-04-02",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 931223,

               ],
               [
                    "tanggal" => "2025-04-03",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 108962,

               ],
               [
                    "tanggal" => "2025-04-04",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 729426,

               ],
               [
                    "tanggal" => "2025-04-05",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 357833,

               ],
               [
                    "tanggal" => "2025-04-06",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 218342,

               ],
               [
                    "tanggal" => "2025-04-07",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 219474,

               ],
               [
                    "tanggal" => "2025-04-08",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 937354,

               ],
               [
                    "tanggal" => "2025-04-09",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 134884,

               ],
               [
                    "tanggal" => "2025-04-10",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 474325,

               ],
               [
                    "tanggal" => "2025-04-11",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 949688,

               ],
               [
                    "tanggal" => "2025-04-12",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 590234,

               ],
               [
                    "tanggal" => "2025-04-13",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 209685,

               ],
               [
                    "tanggal" => "2025-04-14",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 948994,

               ],
               [
                    "tanggal" => "2025-04-15",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 409537,

               ],
               [
                    "tanggal" => "2025-04-16",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Pengecatan ruang kantor",
                    "jumlah" => 884009,

               ],
               [
                    "tanggal" => "2025-04-17",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 709944,

               ],
               [
                    "tanggal" => "2025-04-18",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 387315,

               ],
               [
                    "tanggal" => "2025-04-19",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 459065,

               ],
               [
                    "tanggal" => "2025-04-20",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 869903,

               ],
               [
                    "tanggal" => "2025-04-21",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 206057,

               ],
               [
                    "tanggal" => "2025-04-22",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 370310,

               ],
               [
                    "tanggal" => "2025-04-23",
                    "kategori" => "Marketing",
                    "deskripsi" => "Iklan Google Ads",
                    "jumlah" => 169184,

               ],
               [
                    "tanggal" => "2025-04-24",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 426684,

               ],
               [
                    "tanggal" => "2025-04-25",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 299707,

               ],
               [
                    "tanggal" => "2025-04-26",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 136354,

               ],
               [
                    "tanggal" => "2025-04-27",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Taksi untuk meeting klien",
                    "jumlah" => 131415,

               ],
               [
                    "tanggal" => "2025-04-28",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Sewa mobil operasional",
                    "jumlah" => 235305,

               ],
               [
                    "tanggal" => "2025-04-29",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 274853,

               ],
               [
                    "tanggal" => "2025-04-30",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 454306,

               ],
               [
                    "tanggal" => "2025-05-01",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 242854,

               ],
               [
                    "tanggal" => "2025-05-02",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 520112,

               ],
               [
                    "tanggal" => "2025-05-03",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 142648,

               ],
               [
                    "tanggal" => "2025-05-04",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 420825,

               ],
               [
                    "tanggal" => "2025-05-05",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 284950,

               ],
               [
                    "tanggal" => "2025-05-06",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 269020,

               ],
               [
                    "tanggal" => "2025-05-07",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 104990,

               ],
               [
                    "tanggal" => "2025-05-08",
                    "kategori" => "Operasional",
                    "deskripsi" => "Langganan aplikasi",
                    "jumlah" => 785810,

               ],
               [
                    "tanggal" => "2025-05-09",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 986259,

               ],
               [
                    "tanggal" => "2025-05-10",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 758523,

               ],
               [
                    "tanggal" => "2025-05-11",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 330680,

               ],
               [
                    "tanggal" => "2025-05-12",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 134866,

               ],
               [
                    "tanggal" => "2025-05-13",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 970989,

               ],
               [
                    "tanggal" => "2025-05-14",
                    "kategori" => "Gaji",
                    "deskripsi" => "Upah lembur staf",
                    "jumlah" => 188966,

               ],
               [
                    "tanggal" => "2025-05-15",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 717778,

               ],
               [
                    "tanggal" => "2025-05-16",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 126541,

               ],
               [
                    "tanggal" => "2025-05-17",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 497725,

               ],
               [
                    "tanggal" => "2025-05-18",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 370183,

               ],
               [
                    "tanggal" => "2025-05-19",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 409788,

               ],
               [
                    "tanggal" => "2025-05-20",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 151792,

               ],
               [
                    "tanggal" => "2025-05-21",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 710604,

               ],
               [
                    "tanggal" => "2025-05-22",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Konsumsi rapat internal",
                    "jumlah" => 830905,

               ],
               [
                    "tanggal" => "2025-05-23",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 650913,

               ],
               [
                    "tanggal" => "2025-05-24",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 689852,

               ],
               [
                    "tanggal" => "2025-05-25",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 576032,

               ],
               [
                    "tanggal" => "2025-05-26",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 524788,

               ],
               [
                    "tanggal" => "2025-05-27",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 835313,

               ],
               [
                    "tanggal" => "2025-05-28",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 305196,

               ],
               [
                    "tanggal" => "2025-05-29",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 575842,

               ],
               [
                    "tanggal" => "2025-05-30",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 588680,

               ],
               [
                    "tanggal" => "2025-05-31",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 133996,

               ],
               [
                    "tanggal" => "2025-06-01",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran listrik",
                    "jumlah" => 625852,

               ],
               [
                    "tanggal" => "2025-06-02",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 245879,

               ],
               [
                    "tanggal" => "2025-06-03",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 975545,

               ],
               [
                    "tanggal" => "2025-06-04",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 940410,

               ],
               [
                    "tanggal" => "2025-06-05",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 920203,

               ],
               [
                    "tanggal" => "2025-06-06",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian mouse dan keyboard",
                    "jumlah" => 895972,

               ],
               [
                    "tanggal" => "2025-06-07",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 494663,

               ],
               [
                    "tanggal" => "2025-06-08",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Donasi acara sosial",
                    "jumlah" => 853749,

               ],
               [
                    "tanggal" => "2025-06-09",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 974751,

               ],
               [
                    "tanggal" => "2025-06-10",
                    "kategori" => "Transportasi",
                    "deskripsi" => "Biaya perjalanan dinas",
                    "jumlah" => 965661,

               ],
               [
                    "tanggal" => "2025-06-11",
                    "kategori" => "Marketing",
                    "deskripsi" => "Promosi media sosial",
                    "jumlah" => 597439,

               ],
               [
                    "tanggal" => "2025-06-12",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 843856,

               ],
               [
                    "tanggal" => "2025-06-13",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 744730,

               ],
               [
                    "tanggal" => "2025-06-14",
                    "kategori" => "Operasional",
                    "deskripsi" => "Biaya fotokopi",
                    "jumlah" => 971172,

               ],
               [
                    "tanggal" => "2025-06-15",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 592335,

               ],
               [
                    "tanggal" => "2025-06-16",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Makan siang bersama staf",
                    "jumlah" => 483064,

               ],
               [
                    "tanggal" => "2025-06-17",
                    "kategori" => "Lain-lain",
                    "deskripsi" => "Biaya tak terduga",
                    "jumlah" => 318076,

               ],
               [
                    "tanggal" => "2025-06-18",
                    "kategori" => "Internet",
                    "deskripsi" => "Langganan cloud service",
                    "jumlah" => 525287,

               ],
               [
                    "tanggal" => "2025-06-19",
                    "kategori" => "Marketing",
                    "deskripsi" => "Desain poster promosi",
                    "jumlah" => 218281,

               ],
               [
                    "tanggal" => "2025-06-20",
                    "kategori" => "Utilitas",
                    "deskripsi" => "Pembayaran air",
                    "jumlah" => 186927,

               ],
               [
                    "tanggal" => "2025-06-21",
                    "kategori" => "Gaji",
                    "deskripsi" => "Gaji harian pekerja lepas",
                    "jumlah" => 963761,

               ],
               [
                    "tanggal" => "2025-06-22",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 273131,

               ],
               [
                    "tanggal" => "2025-06-23",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis komputer",
                    "jumlah" => 919701,

               ],
               [
                    "tanggal" => "2025-06-24",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pembelian lemari arsip",
                    "jumlah" => 934481,

               ],
               [
                    "tanggal" => "2025-06-25",
                    "kategori" => "Peralatan",
                    "deskripsi" => "Pengadaan perangkat baru",
                    "jumlah" => 875787,

               ],
               [
                    "tanggal" => "2025-06-26",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 733575,

               ],
               [
                    "tanggal" => "2025-06-27",
                    "kategori" => "Operasional",
                    "deskripsi" => "Pembelian alat tulis kantor",
                    "jumlah" => 594390,

               ],
               [
                    "tanggal" => "2025-06-28",
                    "kategori" => "Internet",
                    "deskripsi" => "Tagihan WiFi bulanan",
                    "jumlah" => 910658,

               ],
               [
                    "tanggal" => "2025-06-29",
                    "kategori" => "Makanan & Minuman",
                    "deskripsi" => "Snack acara pelatihan",
                    "jumlah" => 993531,

               ],
               [
                    "tanggal" => "2025-06-30",
                    "kategori" => "Perawatan",
                    "deskripsi" => "Servis printer",
                    "jumlah" => 315825,

               ]
          ];

          foreach ($pengeluaran as &$item) {
               $item['created_at'] = now();
               $item['updated_at'] = now();
          }


          DB::table('pengeluaran')->insert($pengeluaran);
     }
}
