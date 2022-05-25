<!-- memanggil file utama (beranda.php)-->
<?=$this->extend('beranda');?>
<?=$this->section('isi_web');?>

<table class="table table-hover text-left">
    <thead class=" bg-success">
        <tr>
        <th>#</th>
        <th>Nama Fasilitas</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        </tr>
    </thead>
<?php
if(isset($daftarFasilitas)){
    $html=null;
    $no=null;
    foreach($daftarFasilitas as $row){
        $no++;
        $html .='<tr>';
        $html .='<td>'.$no.'</td>';
        $html .='<td>'.$row['nama_fasilitas'].'</td>';
        $html .='<td>'.$row['deskripsi'].'</td>';
        $html .='<td>'.$row['foto'].'</td>';
        $html .='</tr>';
    }
    echo $html; 
}
?>

</table>
<?=$this->endSection();?>