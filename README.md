# UAS PEMROGRAMAN Web 1
# Nama: Bagus Aditya Hermawan
# Nim: 312410382
# Kelas: TI.24.A.3
# Project Aplikasi Sederhana: List Agenda
# Deskripsi:
Aplikasi List Agenda adalah sebuah aplikasi web sederhana yang digunakan untuk membantu pengguna dalam mengelola daftar agenda atau kegiatan secara terstruktur dan dapat diterapkan pada lingkungan perusahaan. Aplikasi ini dibuat untuk mempermudah pengguna agar tidak lupa terhadap jadwal atau kegiatan penting yang akan dilakukan. Dalam penggunaannya, aplikasi ini menerapkan pembagian hak akses, di mana role admin memiliki spesial akses berupa menambah, mengedit, dan menghapus data agenda, sedangkan role user hanya dapat melihat data agenda serta menggunakan fitur pencarian dan pagination/halaman untuk mempermudah pencarian data. Aplikasi List Agenda juga dilengkapi dengan tampilan yang sederhana dan mudah dipahami sehingga dapat digunakan dengan nyaman. Secara keseluruhan, aplikasi ini dirancang sebagai solusi praktis untuk membantu pengelolaan agenda harian maupun jangka panjang secara lebih tertata dan efisien.

# Langkah-langkah

## Struktur Folder:
###### ![Gambar 1](Struktur.png).

## Penjelasan Kode Program
###### ![Gambar 1](AuthController.png).
Berfungsi untuk mengatur proses autentikasi pengguna pada aplikasi List Agenda. program memanggil file konfigurasi database dan session untuk memastikan koneksi database tersedia serta session dapat digunakan selama proses login dan logout. _Method login()_ berfungsi untuk menampilkan halaman login kepada pengguna baik admin maupun user. _method loginProcess()_ berfungsi menangani proses login dengan mengambil data username dan password dari form, kemudian mencocokkannya dengan data yang tersimpan di database menggunakan _prepared statement_ agar lebih aman. Fungsi _password_verify()_ untuk memastikan kecocokan dengan password yang telah di-hash. Jika proses login berhasil, data pengguna seperti status login, ID user, username, dan role disimpan ke dalam session, lalu pengguna diarahkan ke halaman dashboard. _method logout()_ digunakan untuk mengakhiri sesi pengguna dengan menghapus seluruh data session dan mengarahkan pengguna kembali ke halaman login.
 

