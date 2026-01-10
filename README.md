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
AuthController berfungsi untuk mengatur proses autentikasi pengguna pada aplikasi List Agenda. program memanggil file konfigurasi database dan session untuk memastikan koneksi database tersedia serta session dapat digunakan selama proses login dan logout. _Method login()_ berfungsi untuk menampilkan halaman login kepada pengguna baik admin maupun user. _method loginProcess()_ berfungsi menangani proses login dengan mengambil data username dan password dari form, kemudian mencocokkannya dengan data yang tersimpan di database menggunakan _prepared statement_ agar lebih aman. Fungsi _password_verify()_ untuk memastikan kecocokan dengan password yang telah di-hash. Jika proses login berhasil, data pengguna seperti status login, ID user, username, dan role disimpan ke dalam session, lalu pengguna diarahkan ke halaman dashboard. _method logout()_ digunakan untuk mengakhiri sesi pengguna dengan menghapus seluruh data session dan mengarahkan pengguna kembali ke halaman login.

###### ![Gambar 1](EventController.png).
EventController berfungsi sebagai pengatur utama dalam pengelolaan data agenda dengan menerapkan pembatasan akses berdasarkan role pengguna agar sistem berjalan dengan aman dan terstruktur.. _Method dashboard()_ digunakan untuk menampilkan halaman dashboard dan memastikan bahwa hanya pengguna yang sudah login yang dapat mengaksesnya, jika belum login maka pengguna akan diarahkan ke halaman login. _Method index()_ berfungsi untuk menampilkan daftar agenda atau event. Method _create()_ dan _store()_ digunakan untuk proses penambahan event baru dan hanya dapat diakses oleh pengguna dengan role admin, menampilkan form tambah event, dan menyimpan data event ke dalam database dan mengarahkan kembali ke halaman daftar event. Method _edit()_ dan _update()_ berfungsi untuk mengubah data event yang sudah ada, di mana admin dapat mengambil data event berdasarkan ID, menampilkan form edit, lalu menyimpan perubahan ke database. Method _delete()_ digunakan untuk menghapus data event berdasarkan ID dan juga dibatasi hanya untuk admin.

###### ![Gambar 1](Event.png).
Kode program event.php berfungsi untuk mengelola proses penyimpanan data agenda ke dalam database pada aplikasi List Agenda. Class ini memiliki method create() yang bersifat statis dan digunakan untuk menambahkan data event baru. Data seperti nama event, tanggal, lokasi, dan deskripsi kemudian dimasukkan ke dalam tabel events melalui perintah dari SQL INSERT. Jika proses penyimpanan data gagal, sistem akan menampilkan pesan error dari database untuk membantu proses pengecekan kesalahan.

###### ![Gambar 1](AddEvent.png).
Pada kode ini berisikan form tambah event dimana didalam form tersebut program meminta admin untuk mengisi input nama event,tanggal,lokasi,dan deskripsi. lalu disimpan ke dalam database.

###### ![Gambar 1](DeleteEvent.png).
Event delete berfungsi untuk menghapus list yang sudah dibuat. untuk meyakinkan admin program akan mengirimkan notifikasi untuk meyakini apakah lanjut dihapus atau tidak. dilengkapi tombol batal ketika tidak jadi untuk menghapus event.

##### ![Gambar 1](EditEvent.png).
Pada edit event program menyediakan form untuk update event yang telah dibuat sebelumnya. program meminta admin untuk menginput nama evet,tanggal,lokasi, dan deskripsi. setelah itu, admin menggunakan tombol update apabila lanjut dan tombol batal apabila tidak lanjut.

##### ![Gambar 1](ListEvent.png).
Kode tersebut menampilkan halaman daftar event pada aplikasi List Agenda yang digunakan oleh admin untuk melihat dan mengelola data agenda. dilengkapi tombol navigasi untuk kembali ke dashboard dan menambahkan event baru. halaman ini menampilkan daftar event dalam bentuk tabel serta menyediakan fitur pencarian berdasarkan nama event dan pagination agar data mudah ditelusuri. admin juga diberikan aksi tambah, edit, dan hapus event, di mana penghapusan data dilengkapi dengan konfirmasi. admin dapat menggunakan pagination ke halaman selanjutnya apabila list sudah mencapai batas maksimal perhalaman.

##### ![Gambar 1](Login.png).
Kode program ini menampilkan halaman form login yang digunakan pengguna untuk memasukkan username dan password sebelum mengakses sistem. menggunakan metode POST untuk mengirimkan data ke proses autentikasi.

##### ![Gambar 1](Logout.png).
Kode berfungsi untuk menghubungkan antara halaman dashboard dan login ketika pengguna logout dari aplikasi. _session_start()_ untuk mengakses session yang sedang aktif, kemudian _session_destroy()_ digunakan untuk menghapus seluruh data session sehingga status login pengguna diakhiri.

##### ![Gambar 1](ListEventUser.png).
Hampir sama seperti bagian admin. kode ini hanya menampilkan halaman daftar event pada aplikasi List Agenda yang digunakan oleh admin untuk melihat dan mengelola data agenda. dilengkapi tombol navigasi untuk kembali ke dashboard. halaman ini menampilkan daftar event dalam bentuk tabel serta menyediakan fitur pencarian dan pagination.

##### ![Gambar 1](Dashboard.png).
Kode berfungsi untuk menampilkan halaman dashboard yang dilengkapi dengan fitur ucapan otomatis berdasarkan waktu. fungsi salamWaktu() yang digunakan untuk menentukan ucapan selamat pagi, siang, sore, atau malam sesuai dengan waktu saat ini berdasarkan zona waktu Asia/Jakarta. _<?php include __DIR__ . '/header.php'; ?>_ dan _<?php include __DIR__ . '/footer.php'; ?>_ berfungsi untuk menghubungkan dengan file header.php dan footer.php.

##### ![Gambar 1](Header.png).
Berfungsi untuk membuat judul aplikasi ini.

##### ![Gambar 1](Footer.png).
Sebagai penutup halaman web. _date('Y')_ berfungsi menampilkan informasi hak cipta.

##### ![Gambar 1](CSS.png).
Kode ini berfungsi agar tampilan aplikasi ini lebih menarik dan nyaman ketika digunakan.

##### ![Gambar 1](Database.png).
Class Database yang menghubungkan aplikasi ini ke database MySQL. Method _connect()_ bersifat statis sehingga dapat dipanggil langsung tanpa membuat objek, di dalamnya dibuat koneksi ke database db_event menggunakan mysqli dengan host localhost.

##### ![Gambar 1](Session.png).
Kode berfungsi untuk memastikan bahwa session PHP hanya dijalankan satu kali. _session_status() === PHP_SESSION_NONE_ digunakan untuk mengecek apakah sesi belum aktif. Jika belum ada sesi yang berjalan, maka fungsi _session_start()_ akan dipanggil untuk memulai session.

##### ![Gambar 1](.htaccess.png).
Yntuk mengatur URL routing, agar URL terlihat lebih rapi dan tidak menampilkan nama file PHP secara langsung.

##### ![Gambar 1](hash.png).
Berfugnsi untuk membuat password user dan admin agar lebih aman.

##### ![Gambar 1](Index.png).
Kode ini berfungsi sebagai pengatur utama alur aplikasi (router) yang menentukan halaman atau proses apa yang dijalankan berdasarkan URL yang diakses pengguna. File ini memanggil konfigurasi dan controller yang dibutuhkan, lalu mengarahkan pengguna ke halaman login, dashboard, dan fitur event seperti tambah, edit, dan hapus data. Jika URL tidak sesuai, pengguna akan otomatis diarahkan ke halaman login.

## Database
##### ![Gambar 1](database1.png).
Membuat database dengan nama db_event.
##### ![Gambar 1](database2.png).
##### ![Gambar 1](database4.png).
##### ![Gambar 1](database5.png).
Membuat tabel user berisikan id,username,dan password.
##### ![Gambar 1](database3.png).
Membuat tabel events berisikan id,nama evetnt,tanggal,lokasi,dan deskripsi.
