<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Fasilitas Hotel</h2>
<p>Silahkan masukan data fasilitas hotel baru pada form dibawah ini</p>
<form method="POST" action="/fasilitashotel/update/foto" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" name="txtNamaFasilitas" class="form-control" placeholder="Masukan Nama Fasilitas Hotel" value="<?= $detailfasilitashotel[0]['nama_fasilitas']; ?>" readonly>
        <input type="hidden" name="txtIdFasilitasHotel" class="form-control" value="<?= $detailfasilitashotel[0]['id_fasilitas_hotel']; ?>">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Fasilitas Hotel</label><br />
        <?php
        if (!empty($detailfasilitashotel[0]['foto'])) {
            echo '<img src="' . base_url("/gambar/" . $detailfasilitashotel[0]['foto']) . '" width="150">';
        }
        ?>
        <input type="file" name="txtFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Fasilitas Hotel</button>
    </div>
</form>
<?= $this->endSection(); ?>