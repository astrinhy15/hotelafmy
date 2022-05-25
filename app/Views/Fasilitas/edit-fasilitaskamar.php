<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan fasilitas</h2>
<p>Silahkan masukan data Fasilitas Kamar baru pada form dibawah ini</p>
<form method="POST" action="/fasilitas/update" enctype="multipart/form-data">
    <input type="hidden" name="txtIdFasilitasKamar" value="<?= $detailfasilitas[0]['id_fasilitas_kamar'] ?>">
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <input type="text" name="txtInputTipeKamar" class="form-control" placeholder="Masukan Tipe fasilitas kamar " value="<?= $detailfasilitas[0]['id_tipe_kamar']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas Kamar</label>
        <input type="text" name="txtInputNamaFasilitas" class="form-control" placeholder="Masukan Nama Fasilitas Kamar" value="<?= $detailfasilitas[0]['nama_fasilitas']; ?>">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Fasilitas</button>
    </div>
</form>
<?= $this->endSection(); ?>