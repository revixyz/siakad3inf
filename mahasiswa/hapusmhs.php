<?php
$idx=$_GET['id'];
require_once "../config.php";
$sql="DELETE FROM mhs WHERE id='$idx'";
if($db->query($sql)){
    echo "<script>
    window.location='?p=mahasiswa';
    </script>";
}else{
    echo "<script>alert('Data Gagal Dihapus!');
    window.location='?p=mahasiswa';
    </script>";
}
?>