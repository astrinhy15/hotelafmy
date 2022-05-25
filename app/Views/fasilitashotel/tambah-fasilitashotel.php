<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan fasilitas</h2>
<p>Silahkan masukan data Fasilitas Hotel baru pada form dibawah ini</p>
<form method="POST" action="/fasilitashotel/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas Hotel</label>
        <input type="text" name="txtInputNamaFasilitas" class="form-control" placeholder="Masukan Nama Fasilitas Hotel" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextareal" class="font-weight-bold">Deskripsi</label>
        <textarea name="txtInputDeskripsi" class="form-control rounded-0" id="masukan deskripsi" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Hotel</label>
        <input type="file" name="txtInputFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
<?= $this->endSection(); ?>