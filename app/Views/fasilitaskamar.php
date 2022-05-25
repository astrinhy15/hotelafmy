<!-- memanggil file utama (beranda.php)-->
<?=$this->extend('beranda');?> 
<!-- membuat blok isi web -->
<?=$this->section('isi_web');?>
<div class="row">

<?php
if(isset($daftarFasilitas)){
    
    $html=null;
    $no=null;
    foreach($daftarFasilitas as $row){ 

    $html .='<div class="col-md-4"> ';
    $html .='<div class="panel panel-success" style="min-height:350px"> ';
    $html .='<div class="panel-heading">'.$row['nama_fasilitas'].'</div> ';
    $html .='<div class="panel-body text-center"> <img src="'.base_url('uploads/'.$row['foto']).'" class="img-thumbnail" alt="Cinque Terre">'.$row['deskripsi'].'</div> ';
    $html .='</div> ';
    $html .='</div> <!-- col-md-4--> ';

    }
    echo $html;
}
?>

</div> <!-- end row -->

<?=$this->endSection();