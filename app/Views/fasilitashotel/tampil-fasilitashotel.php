<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Hotel</h2>
<p>Berikut ini daftar fasilitas hotel yang sudah terdaftar dalam database.</p>
<p>
    <a href="/fasilitashotel/tambah" class="btn btn-primary btn-sm">Tambah</a>
</p>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-succes">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-info text-center text-white">
        <tr>
            <th>Nama fasilitas</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        foreach ($ListFasilitasHotel as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $row['nama_fasilitas'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['deskripsi'] . '</td>';
            $htmlData .= '<td class="text-center">' . '<img src="' . base_url("gambar/" . $row['foto']) . '" width="150">' . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/fasilitashotel/edit/' . $row['id_fasilitas_hotel'] . '" class="btn btn-primary btn-sm mr-1">Update</a>';
            $htmlData .= '<a href="/fasilitashotel/edit/foto/' . $row['id_fasilitas_hotel'] . '" class="btn btn-secondary btn-sm mr-1">Foto</a>';
            $htmlData .= '<a href="/fasilitashotel/hapusfasilitashotel/' . $row['id_fasilitas_hotel'] . '" class="btn btn-danger btn-sm">Hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>