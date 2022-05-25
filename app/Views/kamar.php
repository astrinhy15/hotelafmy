<!-- memanggil file utama (beranda.php)-->
<?=$this->extend('beranda');?>
<?=$this->section('isi_web');?>

<table class="table table-hover text-left">
    <thead class=" bg-success">
        <tr>
        <th>#</th>
        <th>Kamar</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        </tr>
    </thead>
<?php
if(isset($daftarKamar)){
    $html=null;
    $no=null;
    foreach($daftarKamar as $row){
        $no++;
        $html .='<tr>';
        $html .='<td>'.$no.'</td>';
        $html .='<td>'.$row['tipe_kamar'].'</td>';
        $html .='<td>'.$row['harga_kamar'].'</td>';
        $html .='<td>'.$row['deskripsi'].'</td>';
        $html .='<td>'.$row['foto'].'</td>';
        $html .='</tr>';
    }
    echo $html; 
}
?>

</table>
<?=$this->endSection();?>