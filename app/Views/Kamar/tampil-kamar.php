<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini daftar kamar yang sudah terdaftar dalam database.</p>
<p>
    <a href="/kamar/tambah" class="btn btn-primary btn-sm">Tambah</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-succes">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-info text-center text-white">
        <tr>
            <th>No kamar</th>
            <th>Tipe kamar</th>
            <!-- <th>kamar</th> -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($ListKamar as $row) : ?>
            <tr class="text-center">
                <td><?= $row['no_kamar'] ?></td>
                <td><?= $row['nama_tipe_kamar'] ?></td>
                <!-- <?= $row['status'] ?></td> -->
                <td class="text-center">
                    <a href="/kamar/edit/<?= $row['id_kamar'] ?>" class="btn btn-info btn-sm mr-1">Update</a>
                    <a href="/kamar/hapus/<?= $row['id_kamar'] ?>" class="btn btn-danger btn-sm mr-1">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?= $this->endSection() ?>