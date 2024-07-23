# Tribhakti.org API Documentation

## Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Prasyarat](#prasyarat)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Penggunaan](#penggunaan)
  - [Autentikasi](#autentikasi)
    - [Login](#login)
    - [Logout](#logout)
    - [Registrasi](#registrasi)
  - [Menampilkan Data User](#menampilkan-data-user)
- [Dokumentasi API](#dokumentasi-api)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)
- [Kontak](#kontak)

## Tentang Proyek

Tribhakti.org adalah aplikasi yang menyediakan layanan XYZ. Dokumentasi ini menjelaskan bagaimana cara menggunakan API yang tersedia.

## Prasyarat

- PHP ^8.0
- Composer
- Laravel ^10.0
- Database (MySQL, PostgreSQL, dll)

## Instalasi

1. Clone repositori ini

    ```bash
    git clone https://github.com/username/tribhakti.org.git
    ```

2. Masuk ke direktori proyek

    ```bash
    cd tribhakti.org
    ```

3. Install dependensi menggunakan Composer

    ```bash
    composer install
    ```

4. Salin file `.env.example` menjadi `.env`

    ```bash
    cp .env.example .env
    ```

5. Generate kunci aplikasi

    ```bash
    php artisan key:generate
    ```

6. Konfigurasi database di file `.env`

7. Jalankan migrasi untuk membuat tabel di database

    ```bash
    php artisan migrate
    ```

8. Jalankan server lokal

    ```bash
    php artisan serve
    ```

## Konfigurasi

- Atur variabel lingkungan di file `.env` sesuai dengan kebutuhan.

## Penggunaan

### Autentikasi

#### Login

- **Endpoint:** `POST http://localhost:8000/api/user/login`
- **Body:**
    ```json
    {
        "username": "admin123",
        "password": "11221122"
    }
    ```
- **Respons:**
    ```json
    {
        "message": "User logged in successfully",
        "token": "Bearer token"
    }
    ```

#### Logout

- **Endpoint:** `POST http://localhost:8000/api/user/logout`
- **Deskripsi:** Keluar dari akun yang sedang login.
- **Permintaan:** Header Authorization dengan token.
- **Respons:**
    ```json
    {
        "message": "User logged out successfully"
    }
    ```

#### Registrasi

- **Endpoint:** `POST http://localhost:8000/api/user/register`
- **Body:**
    ```json
    {
        "username": "admin123",
        "email": "admin123@admin.com",
        "password": "11221122"
    }
    ```
- **Respons:**
    ```json
    {
        "message": "User registered successfully",
        "user": {
            "id": 1,
            "username": "admin123",
            "email": "admin123@admin.com",
            "created_at": "timestamp",
            "updated_at": "timestamp"
        },
        "token": "Bearer token"
    }
    ```

### Menampilkan Data User

- **Endpoint:** `GET http://localhost:8000/api/user/show`
- **Deskripsi:** Menampilkan informasi user yang sedang login.
- **Permintaan:** Header Authorization dengan token.
- **Respons:**
    ```json
    {
        "id": 1,
        "username": "admin123",
        "email": "admin123@admin.com",
        "created_at": "timestamp",
        "updated_at": "timestamp"
    }
    ```

## Dokumentasi API

Untuk dokumentasi lengkap API, Anda bisa menggunakan tool seperti Postman atau Swagger untuk mengelola dan menguji endpoint-endpoint API Anda.

## Kontribusi

Silakan baca [CONTRIBUTING.md](link ke file CONTRIBUTING.md) untuk informasi lebih lanjut tentang cara berkontribusi ke proyek ini.

## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT - lihat file [LICENSE](link ke file LICENSE) untuk detail lebih lanjut.

## Kontak

Nama Anda - [@username](https://twitter.com/username) - email@example.com

Link Proyek: [https://github.com/username/tribhakti.org](https://github.com/username/tribhakti.org)
