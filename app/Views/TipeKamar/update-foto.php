<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Tipe Kamar</h2>
<p>Silahkan masukan data tipe kamar baru pada form dibawah ini</p>
<form method="POST" action="/tipe-kamar/update/foto/" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Tipe Kamar</label>
        <input type="text" name="txtNamaTipeKamar" class="form-control" placeholder="Masukan Nama Tipe Kamar" value="<?= $datatipekamar[0]['nama_tipe_kamar']; ?>" readonly>
        <input type="hidden" name="txtIdTipeKamar" class="form-control" value="<?= $datatipekamar[0]['id_tipe_kamar']; ?>">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Tipe Kamar</label><br />
        <?php
        if (!empty($datatipekamar[0]['foto'])) {
            echo '<img src="' . base_url("/gambar/" . $datatipekamar[0]['foto']) . '" width="150">';
        }
        ?>
        <input type="file" name="txtInputFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Fasilitas Hotel</button>
    </div>
</form>
<?= $this->endSection(); ?>