<h1>Data Transaksi</h1>

<a href="#" data-bs-toggle="modal" data-bs-target="#modalTambah">
    Tambah Transaksi
</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($transaksi as $t) : ?>

    <tr>
        <td><?= $i++; ?></td>
        <td><?= $t['nama_pelanggan']; ?></td>
        <td><?= $t['tanggal']; ?></td>
        <td>Rp <?= number_format($t['total']); ?></td>
        <td><?= $t['status']; ?></td>

        <td>
            <a href="/transaksi/edit/<?= $t['id']; ?>">
                Edit
            </a>

            <form action="/transaksi/delete/<?= $t['id']; ?>" method="post">

                <input type="hidden" name="_method" value="DELETE">

                <button type="submit">
                    Hapus
                </button>

            </form>
        </td>
    </tr>

    <?php endforeach; ?>

</table>

<?= $this->include('transaksi/create'); ?>