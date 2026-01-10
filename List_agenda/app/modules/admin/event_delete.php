<h2>Hapus Event</h2>

<p>Yakin ingin menghapus event ini?</p>

<form method="post" action="<?= BASE_URL ?>/event/destroy/<?= $event['id'] ?>">
  <button type="submit">Ya, Hapus</button>
  <a href="<?= BASE_URL ?>/event">Batal</a>
</form>
