# MBG Management System (Makan Bergizi Gratis)

Sistem pengelolaan program Makan Bergizi Gratis dengan 5 role berbeda.

## Teknologi
- Laravel 12
- Bootstrap 5
- MySQL
- Chart.js
- DataTables
- Font Awesome Icons

## Fitur
- Multi-database support
- Role-based access control
- Dashboard responsif
- CRUD lengkap
- Grafik statistik
- Authentication login

## Role
1. Admin Pusat
2. Sekolah
3. Dapur Pusat
4. Kurir
5. Gudang

## Instalasi

1. Clone repository
```bash
git clone https://github.com/nazwaaisyiah/mbg-management-system.git
cd mbg-management-system
```

2. Install dependencies
```bash
composer install
```

3. Copy environment file
```bash
cp .env.example .env
```

4. Generate app key
```bash
php artisan key:generate
```

5. Jalankan migration dan seeder
```bash
php artisan migrate
php artisan db:seed
```

6. Jalankan server
```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

## Kredensial Login

### Admin Pusat
- Email: admin@mbg.com
- Password: password

### Sekolah
- Email: sekolah@mbg.com
- Password: password

### Dapur Pusat
- Email: dapur@mbg.com
- Password: password

### Kurir
- Email: kurir@mbg.com
- Password: password

### Gudang
- Email: gudang@mbg.com
- Password: password