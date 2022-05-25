<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Kamar</h2>
<p>Berikut ini daftar kamar yang sudah terdaftar dalam database.</p>
<p>
    <a href="/fasilitas/tambah" class="btn btn-primary btn-sm">Tambah</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-succes">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-info text-center text-white">
        <tr>
            <th>Tipe kamar</th>
            <th>Nama fasilitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ListFasilitas as $row) : ?>
            <tr>
                <td class="text-center"><?= $row['id_tipe_kamar'] ?></td>
                <td class="text-center"><?= $row['nama_fasilitas'] ?></td>
                <td class="text-center">
                    <a href="/fasilitas/edit/<?= $row['id_fasilitas_kamar'] ?>" class="btn btn-info btn-sm mr-1">Update</a>
                    <a href="/fasilitas/hapus/<?= $row['id_fasilitas_kamar'] ?>" class="btn btn-danger btn-sm mr-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>