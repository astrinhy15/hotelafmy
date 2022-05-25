<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Tipe Kamar</h2>
<p>Silahkan masukan data tipe kamar baru pada form dibawah ini</p>
<form method="POST" action="/tipe-kamar/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Tipe Kamar</label>
        <input type="text" name="txtNamaTipeKamar" class="form-control" placeholder="Masukan nama tipe kamar" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Harga Kamar</label>
        <input type="text" name="txtHargaKamar" class="form-control" placeholder="Masukan harga kamar" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextareal" class="font-weight-bold">Deskripsi</label>
        <textarea name="txtInputDeskripsi" class="form-control rounded-0" id="exampleFormControlTextareal" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto</label>
        <input type="file" name="txtInputFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan Kamar</button>
    </div>
</form>
<?= $this->endSection(); ?>