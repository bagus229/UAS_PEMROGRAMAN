<link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
<div class="app">
<h2>Edit Event</h2>

<form method="post" action="<?= BASE_URL ?>/event/update/<?= $event['id'] ?>">
  <input type="text" name="nama"
         value="<?= htmlspecialchars($event['nama_event']) ?>" required><br>

  <input type="date" name="tanggal"
         value="<?= $event['tanggal'] ?>" required><br>

  <input type="text" name="lokasi"
         value="<?= htmlspecialchars($event['lokasi']) ?>" required><br>

  <textarea name="deskripsi"><?= htmlspecialchars($event['deskripsi']) ?></textarea><br>

  <button type="submit">Update</button>
  <a href="<?= BASE_URL ?>/event">Batal</a>
</form>
</div>