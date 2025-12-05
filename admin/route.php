<?php

$p=$_GET['p'] ?? '';

switch ($p){
    
    case 'mahasiswa';
        require_once "mahasiswa.php";
        break;
    case 'tambahmhs';
        require_once "tambahmhs.php";
        break;
    case 'detailmhs';
        require_once "detailmhs.php";   
        break;          
    case 'editmhs';
        require_once "editmhs.php";   
        break;
    case 'hapusmhs';
        require_once "hapusmhs.php";
        break;


    case 'dosen';
        require_once "dosen.php";
        break;
    case 'tambahdosen';
        require_once "tambahdosen.php";
        break;
    case 'detaildosen';
        require_once "detaildosen.php";   
        break;
    case 'editdosen';
        require_once "editdosen.php";
        break;
    case 'hapusdosen';
        require_once "hapusdosen.php";
        break;


    case 'admin';
        require_once "admin.php";
        break;
    case 'tambahadmin';
        require_once "tambahadmin.php";
        break;
    case 'detailadmin';
        require_once "detailadmin.php";   
        break;
    case 'editadmin';
        require_once "editadmin.php";
        break;
    case 'hapusadmin';
        require_once "hapusadmin.php";  
        break;

        
    case 'gantipwd';
        require_once "gantipwd.php";
        break;


    default;
        require_once "dashboard.php";
        break;
}

?>