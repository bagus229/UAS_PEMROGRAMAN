<link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
<div class="app">
<h2>Daftar Event</h2>
<a href="<?= BASE_URL ?>/dashboard">Kembali</a>
<a href="<?= BASE_URL ?>/event/add">Tambah Event</a>

<form method="GET" action="">
    <input type="text" name="q" placeholder="Cari event..." value="<?= htmlspecialchars($q) ?>">
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Event</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php $no = ($page-1)*ceil($total/3) + 1; ?>
    <?php while($event = $events->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $event['nama_event'] ?></td>
        <td><?= $event['tanggal'] ?></td>
        <td><?= $event['lokasi'] ?></td>
        <td><?= $event['deskripsi'] ?></td>
        <td>
            <a href="<?= BASE_URL ?>/event/edit/<?= $event['id'] ?>">Edit</a> | 
            <a href="<?= BASE_URL ?>/event/delete/<?= $event['id'] ?>" onclick="return confirm('Hapus event ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<!-- Pagination -->
<div class="pagination-wrapper">
    <div class="pagination">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php if ($i == $page): ?>
                <strong><?= $i ?></strong>
            <?php else: ?>
                <a href="<?= BASE_URL ?>/event?page=<?= $i ?>&q=<?= urlencode($q) ?>">
                    <?= $i ?>
                </a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</div>
