<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Kamar</h2>
<p>Silahkan masukan data kamar baru pada form dibawah ini</p>
<form method="POST" action="/kamar/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="text" name="txtNoKamar" class="form-control" placeholder="Masukan nomor kamar , misal :1A" autocomplete="off" autofocus required>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select name="txtInputTipeKamar" class="form-control" required>
            <?php foreach ($tipe_kamar as $tipe_kamar) : ?>
                <option value="<?= $tipe_kamar['id_tipe_kamar'] ?>"><?= $tipe_kamar['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <!-- <div class="form-group">
        <label class="font-weight-bold">Kamar</label>
        <input type="text" name="txtInputStatus" class="form-control" placeholder="Masukan Jumlah Kamar" autocomplete="off" autofocus>
    </div> -->
    <!-- <div class="form-group">
        <label class="font-weight-bold">Harga Kamar</label>
        <input type="text" name="txtInputHargaKamar" class="form-control" placeholder="Masukan harga kamar" autocomplete="off" autofocus required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextareal" class="font-weight-bold">Deskripsi Kamar</label>
        <textarea name="txtInputDeskripsi" class="form-control rounded-0" id="exampleFormControlTextareal" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto Kamar</label>
        <input type="file" name="txtInputFoto" class="form-control">
    </div> -->
    <div class="form-group">
        <button class="btn btn-primary">Simpan Kamar</button>
    </div>
</form>
<?= $this->endSection(); ?>