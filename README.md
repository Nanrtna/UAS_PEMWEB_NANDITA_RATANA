1. Buka terminal lalu membuat folder baru (UASPEMWEB) di dalam folder (data_supir_bus).
2. Lalu masukan file src, env. , docker-compose.yml dari file UTS kemarin.
3. Lakukan docker compose up -d --build untuk membuat container di dalam docker.
4. Selanjutnya masuk ke dalam container yang tadi sudah di buat dengan docker exec -it pemweb bash.
5. Atur .env yang ada di dalam src.
6. Sesuaikan dengan container yang telah dibuat dan beri nama databasenya untuk project laravel.
7. Lalu lakukan php artisan key:generate
8. Hapus fitur yang tidak digunakan dan lakukan php artisan make:model SupirBus -m untuk membuat migration dan model untuk data supir bus
9. Mengisi migration dan modelnya
10. Lakukan php artisan make:controller MenuController
11. Isi controller untuk mengatur logic data supir bus
12. Buat file request baru
13. Isi view data yang akan di tampilkan
14. Atur tampilan frontend untuk admin pada cruds.php 
15. Atur route-nya di web.php
16. Lakukan php artisan migrate:fresh --seed
17. Tabel data supir sudah bisa diakses di tampilan admin

Nama : Nandita Ratana
NIM : 20220801033
