<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan fasilitas</h2>
<p>Silahkan masukan data Fasilitas Hotel baru pada form dibawah ini</p>
<form method="POST" action="/fasilitashotel/update" enctype="multipart/form-data">
    <input type="hidden" name="txtIdFasilitasHotel" value="<?= $detailfasilitashotel[0]['id_fasilitas_hotel'] ?>">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas Hotel</label>
        <input type="text" name="txtInputNamaFasilitas" class="form-control" placeholder="Masukan Nama Fasilitas Hotel " value="<?= $detailfasilitashotel[0]['nama_fasilitas']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Deskripsi</label>
        <input type="text" name="txtInputDeskripsi" class="form-control" placeholder="Masukan Deskripsi" value="<?= $detailfasilitashotel[0]['deskripsi']; ?>">
    </div>
    <!-- <label class="font-weight-bold">Foto</label>
    <input type="file" name="txtFoto" class="form-control" placeholder="Masukan foto baru jika akan diganti" autocomplete="off" value="<?= $detailfasilitashotel[0]['foto']; ?>">
    </div> -->
    <div class="form-group">
        <button class="btn btn-primary">Update</button>
    </div>
</form>
<?= $this->endSection(); ?>