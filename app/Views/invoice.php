<html>

<head>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td,
		th {
			border: 1px solid #000000;
			text-align: center;
			height: 20px;
			margin: 8px;
		}
	</style>
</head>

<body>
	<div style="font-size:40px; color:'#dddddd'"><i>Reservasi Hotel</i></div>
	<p>
		<i>Hotel Afmy</i><br>
		Kuningan, Jawa Barat
	</p>
	<hr>
	<hr>
	<p></p>
	<p>
		Pemesan : <?= $reservasi['nama_tamu'] ?><br>
		Email : <?= $reservasi['email'] ?><br>
		Telepon : <?= $reservasi['telepon'] ?><br>
		Transaksi No : <?= $reservasi['id_reservasi'] ?><br>
		Tanggal : <?= date('d-m-Y', strtotime($reservasi['cek-in'])) ?><br>
	</p>
	<table cellpadding="6">
		<tr>
			<th><strong>Tipe Kamar</strong></th>
			<th><strong>Harga permalam</strong></th>
			<th><strong>Jumlah hari</strong></th>
			<th><strong>Jumlah kamar</strong></th>
			<th><strong>Total Harga</strong></th>
		</tr>
		<tr>
			<td><?= $reservasi['nama_tipe_kamar'] ?></td>
			<td><?= "Rp " . number_format($harga_permalam, 2, ',', '.')  ?></td>
			<td><?= $jml_hari ?></td>
			<td><?= $reservasi['jumlah_kamar'] ?></td>
			<td><?= "Rp " . number_format($reservasi['harga'], 2, ',', '.')  ?></td>
		</tr>
	</table>
</body>
<a href="<?= session('kembali') ?? '/' ?>" class="no-print">kembali</a>

</html>