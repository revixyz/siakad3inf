<?php
$idx=$_GET['id_admin'];
require_once "../config.php";
$sql="DELETE FROM tb_admin WHERE id_admin='$idx'";
if($db->query($sql)){
    echo "<script>
    window.location='?p=admin';
    </script>";
}else{
    echo "<script>alert('Data Gagal Dihapus!');
    window.location='?p=admin';
    </script>";
}
?>