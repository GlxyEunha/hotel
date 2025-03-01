<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Pengenalan Konsep Aplikasi
Project Hotel-app adalah website Pemesanan atau Booking kamar hotel online yang fokus pada satu perusahaan hotel. Melalui project ini, perusahaan dapat mempromosikan berbagai kamar kepada pelanggan mereka. Website ini menawarkan informasi terperinci tentang hotel. Selain itu, project ini menyediakan fitur pemesanan online yang aman dan nyaman bagi pelanggan. Dengan adanya website pemesanan kamar hotel ini, perusahaan dapat memperluas jangkauan mereka secara online dan memberikan pengalaman booking online yang lebih baik kepada pelanggan. Selain fitur pemesanan online, Project ini juga mempunyai fitur pemesanan melalui offline, karena data data nya terhubung langsung sehingga menjadi mudah untuk pengecekan reservasi kamar.


## Authentikasi 
Aplikasi ini menyediakan 2 role berikut :
### Admin
Admin memiliki tugas yang sangat kompleks, seperti membuat, mengedit dan menghapus data Kamar,Status Kamar,User,Metode Pembayaran, Metode Delivery, bahkan Transaksi sekaligus.
- Username : admin
- Password : admin (same as username)

### Konsumen
Siswa berperan sebagai konsumen, siswa dapat melihat history pembayaran dan profile nya sendiri.
- Username : customer
- Password : customer  (same as username)

## Setting UP
Menyiapkan dan mensetting project hotel-app (laravel 9) require (Composer v2.2.4 ,Git, MYSQL PHP > v5 (v8.1.1))
- Buka CMD atau Aplikasi Command lainnya
- Masuk ke Directory apa saja untuk menyiapkan folder project. Contoh (cd C:\xampp\htdocs)
- Download / Clone Project ini dengan cara git clone https://github.com/GlxyEunha/hotel.git atau dengan mendownload langsung file zip dan pindahkan ke directory yang telah disiapkan.
- Setelah project berhasil di download ekstrak jika file berupa zip, lalu ketikan Composer install di CMD dan tunggu hingga selesai diunduh.
- Buat database MYSQL dan Buka project hotel-app, Cari file dengan nama .envexample kemudian edit nama file tersebut menjadi .env dan buka file tersebut.
- Setelah file dibuka, Ubah Database_name dan lainnya sesuai dengan database yang baru dibuat.
- Buka CMD kembali Ketik php artisan key:generate dan php artisan migrate --seed / php artisan migrate:fresh --seed. Setelah data berhasil di dapatkan lalu jalankan Project dengan PHP ARTISAN SERVE.
- Project Berhasil DiClone.

## Asset Foto
![indexhome](https://user-images.githubusercontent.com/97875134/257033613-87be3c6b-8f0d-49c0-b6c7-f6c88c51a7ae.PNG)
![indexhome2](https://user-images.githubusercontent.com/97875134/257033075-211bda89-eb41-4b5c-ae36-442620d8bfac.PNG)
![kamars](https://user-images.githubusercontent.com/97875134/257033199-2a53e097-b386-43e6-8a2d-a733be593650.PNG)
![kamar](https://user-images.githubusercontent.com/97875134/257033083-940fcb6a-144f-4b19-abc2-7eddf2adc472.PNG)
![reservasi](https://user-images.githubusercontent.com/97875134/257033088-a17624e7-5cfd-4928-90fc-711e5c6e6a59.PNG)
![dashboard](https://user-images.githubusercontent.com/97875134/257033092-d8dad41d-e120-484d-8ff6-e26e014bdf5e.PNG)
![dataorder](https://user-images.githubusercontent.com/97875134/257033097-723f2a78-2d29-4d7f-84f6-eacb7625de6e.PNG)
![myaccount](https://user-images.githubusercontent.com/97875134/257033089-a6f3c7e3-b59b-4993-8cb2-96c427fb31e1.PNG)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
The Asset image (image room) is not mine, its free source image on google.
