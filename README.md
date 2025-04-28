

## Instalasi

1.  Clone repositori ini:
    ```bash
    git clone <URL_REPOSITORI_ANDA>
    cd laravel12starterkit
    ```
2.  Salin berkas `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
3.  Instal dependensi PHP menggunakan Composer:
    ```bash
    composer install
    ```
4.  Buat kunci aplikasi:
    ```bash
    php artisan key:generate
    ```
5.  Konfigurasikan detail database Anda di berkas `.env`.
6.  Jalankan migrasi database:
    ```bash
    php artisan migrate
    ```
7.  Instal dependensi Node.js:
    ```bash
    npm install
    ```
8.  Jalankan server pengembangan:
    ```bash
    npm run dev
    ```
    Dan di terminal lain:
    ```bash
    php artisan serve
    ```

## Dependensi Frontend (Plugins)

Proyek ini menggunakan Vite untuk kompilasi aset frontend. Berikut adalah dependensi utama yang digunakan:

*   **@tailwindcss/vite**: Integrasi Tailwind CSS dengan Vite.
*   **axios**: Klien HTTP berbasis Promise untuk browser dan Node.js.
*   **concurrently**: Menjalankan beberapa perintah secara bersamaan.
*   **laravel-vite-plugin**: Integrasi Vite resmi untuk Laravel.
*   **tailwindcss**: Framework CSS utility-first.
*   **vite**: Alat build frontend generasi berikutnya.

## Dependensi Backend (Filament Plugins) - laravel12starterkit

Proyek ini menggunakan Filament sebagai admin panel. Berikut adalah plugin Filament utama yang digunakan:

*   **bezhansalleh/filament-shield**: Manajemen peran dan izin untuk Filament.
*   **filament/filament**: Framework inti Filament.
*   **hasnayeen/themes**: Plugin tema untuk Filament.
*   **stechstudio/filament-impersonate**: Fitur impersonasi pengguna untuk Filament.
*   **swisnl/filament-backgrounds**: Mengatur gambar latar belakang untuk halaman login Filament.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
