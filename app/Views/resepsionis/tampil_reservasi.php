<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Reservasi</h2>
<p>Berikut daftar Tamu yang sudah reservasi</p>
<div class="row">
    <div class="col-4">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="submit">Cari</button>
            </div>
        </form>
    </div>
    <div class="col-4">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukan Nama Tamu" name="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="submit">Cari</button>
            </div>
        </form>
    </div>

</div>
<?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
    <div class="alert alert-succes">
        <?php echo session()->getFlashdata('berhasil'); ?>
    </div>
<?php } ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>Id_Reservasi</th>
            <th>Id_Tamu</th>
            <th>Cek-In</th>
            <th>Cek-Out</th>
            <th>Tipe Kamar</th>
            <th>Jumlah kamar</th>
            <th>Harga Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-light text-center">
        <?php
        $htmlData = null;
        foreach ($Listreservasi as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $row['id_reservasi'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['nama_tamu'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['cek-in'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['cek-out'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['id_tipe_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['jumlah_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['harga'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['status'] . '</td>';
            //$htmlData .='<td class="text-center">'.'<img src="'.base_url("gambar/".$row['foto']).'"width="150">'.'</td>'; 
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/reservasi/in/' . $row['id_reservasi'] . '" class="btn btn-info btn-sm mr-1">chek in</a>';
            $htmlData .= '<a href="/reservasi/out/' . $row['id_reservasi'] . '" class="btn btn-danger btn-sm mr-1">chek out</a>';
            $htmlData .= '<a href="/reservasi/hapus/' . $row['id_reservasi'] . '" class="btn btn-warning btn-sm">Batal</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>