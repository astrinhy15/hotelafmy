<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Tipe Kamar</h2>
<p>Berikut ini daftar tipe kamar yang sudah terdaftar dalam database.</p>
<p>
    <a href="/tipe-kamar/tambah" class="btn btn-primary btn-sm">Tambah</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-succes">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-info text-center text-white">
        <tr>
            <th>Nama Tipe Kamar</th>
            <th>Harga Kamar</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datatipekamar as $row) : ?>
            <tr class="center">
                <td class="text-center"><?= $row['nama_tipe_kamar'] ?></td>
                <td class="text-center"><?= $row['harga'] ?></td>
                <td class="text-center"><?= $row['deskripsi'] ?></td>
                <td class="text-center"><img src="/gambar/<?= $row['foto'] ?>" width="150"></td>
                <td class="text-center">
                    <a href="/tipe-kamar/edit/<?= $row['id_tipe_kamar'] ?>" class="btn btn-primary btn-sm mr-1">Update</a>
                    <a href="/tipe-kamar/edit/foto/<?= $row['id_tipe_kamar'] ?>" class="btn btn-secondary btn-sm mr-1">Foto</a>
                    <a href="/tipe-kamar/hapus/<?= $row['id_tipe_kamar'] ?>" class="btn btn-danger btn-sm mr-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>