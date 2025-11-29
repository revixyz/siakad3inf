<?php

session_start();

function require_level($required_level): void{
    if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true ) {
        header ("Location: .././");
        exit;
    }

    if ($_SESSION['level'] !== $required_level){
        switch ($_SESSION['level']){
            case 'admin':
                header("Location: ../admin/?p=admin");
                break;

            case 'mahasiswa':
                header("Locatoin: ../mahasiswa/?p=mahasiswa");
                break;

            case 'dosen':
                header("Location: ../dosen/?p=dosen");
                break;

            default;
                header("Location: ./index.php");
                break;
        }
        exit;
    }
}
?>
