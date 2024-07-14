
![Logo](https://i.ibb.co/5ThtRFq/Screenshot-2022-06-17-193018.png)
[![CodeQL](https://github.com/paley777/siperpus/actions/workflows/codeql-analysis.yml/badge.svg)](https://github.com/paley777/siperpus/actions/workflows/codeql-analysis.yml)

# Library Information System (SIPerpus)

The Library Information System (SIPerpus) is a website-based system
with the Laravel 8 Framework. SIPerpus functions to make things easier
library management. This system takes the case of the library at SMP Negeri 1 Bengkulu City.

## Integration
Apart from using Laravel 8, this system also integrates the Framework
Bootstrap as front-end. This system uses SQL database and in 
The development uses MySQL Workbench software.


## User Features

- Data Processing Management
- Transaction Management (Borrowing and Returning Books)
- Report Management

## System Features

- Laravel 8
- Using Eloquent from Laravel
- Templates for headers and footers
- Full CRUD integration
- Authentication from Laravel
- Upload and Update Images
- Generate and scan barcodes
- Pagination
- Search Data
- Import Data via Spreadsheet

## Optimalisasi

N+1 Problems

## Side Version
Cek branch "ver2". Branch ini memuat sistem tanpa fitur scan barcode buku dan beberapa penyederhanaan lainnya.

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


## Suggestion

For suggestions and input on this system, please email valleryan1212@gmail.com
