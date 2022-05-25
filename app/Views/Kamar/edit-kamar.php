<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Kamar</h2>
<p>Silahkan masukan data kamar baru pada form dibawah ini</p>
<form method="POST" action="/kamar/update" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="hidden" name="id_kamar" value="<?= $detailKamar[0]['id_kamar']; ?>">
        <input type="text" name="txtNoKamar" class="form-control" placeholder="Masukan nomor kamar , misal :1A" value="<?= $detailKamar[0]['no_kamar']; ?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <select name="txtInputTipeKamar" class="form-control" required>
            <?php foreach ($datatipekamar as $row) : ?>
                <option value="<?= $row['id_tipe_kamar'] ?>"><?= $row['nama_tipe_kamar'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Kamar</button>
    </div>
</form>
<?= $this->endSection(); ?>