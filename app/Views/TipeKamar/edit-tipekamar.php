<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Tipe Kamar</h2>
<p>Silahkan masukan data tipe kamar baru pada form dibawah ini</p>
<form method="POST" action="/tipe-kamar/update" enctype="multipart/form-data">
    <input type="hidden" name="txtIdTipeKamar" value="<?= $datatipekamar[0]['id_tipe_kamar'] ?>">
    <div class="form-group">
        <label class="font-weight-bold">Nama Tipe Kamar</label>
        <input type="text" name="txtNamaTipeKamar" class="form-control" placeholder="Masukan Nama Tipe Kamar " value="<?= $datatipekamar[0]['nama_tipe_kamar']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Harga Kamar</label>
        <input type="text" name="txtHargaKamar" class="form-control" placeholder="Masukan harga kamar" value="<?= $datatipekamar[0]['harga']; ?>">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Deskripsi</label>
        <input type="text" name="txtInputDeskripsi" class="form-control" placeholder="Masukan Deskripsi" value="<?= $datatipekamar[0]['deskripsi']; ?>">
    </div>
    <!-- <label class="font-weight-bold">Foto</label>
    <input type="file" name="txtFoto" class="form-control" placeholder="Masukan foto baru jika akan diganti" autocomplete="off" value="<?= $datatipekamar[0]['foto']; ?>">
    </div> -->
    <div class="form-group">
        <button class="btn btn-primary">Update</button>
    </div>
</form>
<?= $this->endSection(); ?>