## 📁 Struktur Proyek

```

riwayat-penghuni/
├── backend/        # Laravel
└── frontend/       # Next.js

````

---

## ⚙️ Instalasi & Setup

### 🔧 Backend (Laravel)

#### 1. Masuk ke folder backend

```bash
cd backend
````

#### 2. Install dependencies Laravel

```bash
composer install
```

#### 3. Salin file environment dan generate key

```bash
cp .env.example .env
php artisan key:generate
```

#### 4. Atur konfigurasi database di `.env`

```env
DB_DATABASE=riwayat_db
DB_USERNAME=root
DB_PASSWORD=
```

#### 5. Jalankan migrasi dan seeder

```bash
php artisan migrate --seed
```

Seeder akan mengisi data dummy `warga` dan `riwayat_penghuni`.

#### 6. Jalankan server Laravel

```bash
php artisan serve
```

Laravel berjalan di:
`http://localhost:8000`

---

### 🌐 Frontend (Next.js)

#### 1. Masuk ke folder frontend

```bash
cd ../frontend
```

#### 2. Install dependencies Next.js

```bash
npm install
```

#### 3. Atur 


#### 4. Jalankan Next.js

```bash
npm run dev
```

Aplikasi frontend akan berjalan di:
`http://localhost:3000`

