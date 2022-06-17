
![Logo](https://i.ibb.co/5ThtRFq/Screenshot-2022-06-17-193018.png)


# Sistem Informasi Perpustakaan (SIPerpus)

Sistem Informasi Perpustakaan (SIPerpus) adalah sistem berbasis website
dengan Framework Laravel 8. SIPerpus berfungsi untuk mempermudah
manajemen perpustakaan. Sistem ini mengambil kasus perpustakaan di SMP Negeri 1 Kota Bengkulu.



## Integrasi
Sistem ini selain menggunakan Laravel 8. Juga mengintegrasikan Framework
Bootstrap sebagai front-end. Sistem ini menggunakan database SQL dan dalam 
pengembangannya menggunakan software MySQL Workbench.


## Fitur Pengguna

- Manajemen Olah Data
- Manajemen Transaksi (Peminjaman dan Pengembalian Buku)
- Manajemen Laporan





## Fitur Sistem

- Laravel 8
- Using Eloquent from Laravel
- Templating for header and footer
- Full CRUD Integrating
- Authentication from Laravel
- Upload and Update Images
- Barcode generate and scan
- Paginations
- Search Data

## Optimalisasi

N+1 Problems

## Run Locally

Clone the project

```bash
  git clone https://github.com/paley777/siperpus.git
```

Go to the project directory

```bash
  cd siperpus
```

Install dependencies

```bash
  composer install
```

Delete Cache

```bash
  php artisan cache:clear
```
Generate Laravel Key

```bash
  php artisan key:generate
```
Make Storage Link

```bash
  php artisan storage:link
```
Migrate

```bash
   php artisan migrate
```
Start the server

```bash
   php artisan serve
```


## Screenshots

![App Screenshot](https://i.ibb.co/x5ZFZyB/Screenshot-2022-06-17-193220.png)


## Saran

Untuk saran dan masukan sistem ini harap berkenan email ke valleryan1212@gmail.com
