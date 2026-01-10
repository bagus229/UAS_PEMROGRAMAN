<link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
<div class="app">
<h2>Tambah Event</h2>

<form method="post" action="<?= BASE_URL ?>/event/store">
  <label>Nama Event</label><br>
  <input type="text" name="nama" required><br><br>

  <label>Tanggal</label><br>
  <input type="date" name="tanggal" required><br><br>

  <label>Lokasi</label><br>
  <input type="text" name="lokasi" required><br><br>

  <label>Deskripsi</label><br>
  <textarea name="deskripsi"></textarea><br><br>

  <button type="submit">Simpan</button>
  <a href="<?= BASE_URL ?>/event">Batal</a>
</form>
</div>