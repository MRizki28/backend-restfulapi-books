#### Installation
copy and running code in below with your terminal/command

```bash
https://github.com/MRizki28/backend-restfulapi-books.git
```

install composer dan pastikan versi laravel anda 8 dan php 7

```bash
composer install
```

copy .env.example and create your app configuration

```bash
php artisan key:generate
```

jalankan migrate 

```bash
php artisan migrate
```

lakukan semua testing api melalui postman

url registrasi,login,profil,logout

```bash
http://localhost:8000/api/register (POST)
http://localhost:8000/api/login (POST)
http://localhost:8000/api/profil (GET) -> PASTIKAN ANDA MENGCOPY TOKEN DAN PASTE KE AUTHORIZATION PILIH BEARER TOKEN 
http://localhost:8000/api/logout (POST) -> OTOMATIS AKAN LANGSUNG MENGHAPUS TOKEN DARI DATABASE
```

url CRUD (SESUAI USER YANG LOGIN)

```bash
http://localhost:8000/api/books (GET)->UNTUK MENAMPILKAN SELURUH DATA BOOK SESUAI USER(! PASTIKAN ANDA MEMASUKAN TOKEN LOGIN KE AUTHORIZATION UNTUK MELAKUKAN GET)
http://localhost:8000/api/books (POST)->SETELAH ANDA SUDAH MEMASTIKAN LOGIN,ANDA BISA MELAKUKAN TAMBAH DATA BOOK (tittle,description)
http://localhost:8000/api/books/id (GET) -> UNTUK MELAKUKAN GET DATA SESUAI ID
http://localhost:8000/api/books/id (PUT) -> EDIT DATA 
http://localhost:8000/api/books/id (DELETE) -> HAPUS DATA
```

url PAGINATE , SEARCH (SESUAI USER YANG LOGIN)

```bash
http://localhost:8000/api/books?page=1 (GET) -> PASTIKAN ANDA LOGIN DAN MEMASUKAN TOKEN YANG DIBERIKAN 
http://localhost:8000/api/books/search?q=teknik (GET) -> FITUR UNTUK SEARCHING (TEKNIK DI GANTI SESUAI APA YG INGIN DI CARI)

```



