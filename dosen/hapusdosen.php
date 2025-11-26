<?php
$idx=$_GET['id_dosen'];
require_once "../config.php";
$sql="DELETE FROM dosen WHERE id_dosen='$idx'";
if($db->query($sql)){
    echo "<script>
    window.location='?p=dosen';
    </script>";
}else{
    echo "<script>alert('Data Gagal Dihapus!');
    window.location='?p=dosen';
    </script>";
}
?>