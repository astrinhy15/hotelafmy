<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan fasilitas</h2>
<p>Silahkan masukan data Fasilitas Kamar baru pada form dibawah ini</p>
<form method="POST" action="/fasilitas/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select class="form-control" name="txtInputIdTipeKamar">
            <?php foreach ($tipe_kamar as $tipe) : ?>
                <option value="<?= $tipe['id_tipe_kamar'] ?>"><?= $tipe['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas Kamar</label>
        <input type="text" name="txtInputNamaFasilitas" class="form-control" placeholder="Masukan Nama Fasilitas Kamar" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
<?= $this->endSection(); ?>