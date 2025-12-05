<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../config.php";


$sql1 = "SELECT * FROM mhs";
$query1 = $db->query($sql1);

$sql2 = "SELECT * FROM dosen";
$query2 = $db->query($sql2);

$id_admin=$_GET['id_admin'];
$sql="SELECT * FROM tb_admin WHERE id_admin='$id_admin'";
$data=$db->query($sql);

while($admin=mysqli_fetch_assoc($data)) {
?>

<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <!-- <div class="col-sm-6"><h3 class="mb-0">Tambah Mahasiswa</h3></div> -->
              <!--end::Col-->
              
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-12">
                <!--begin::Card-->
                <?php
                 require_once "../config.php";



                if(isset($_POST['simpanEdit'])){
                    $id_admin=$_POST['id_admin'];
                    $id=$_POST['id'];
                    $id_dosen=$_POST['id_dosen'];
                    $prodi=$_POST['prodi'];
                    $bimbingan=$_POST['bimbingan'];
                    $tgl_bimbingan=$_POST['tgl_bimbingan'];

                    $sql = "UPDATE tb_admin SET id='$id', id_dosen='$id_dosen', prodi='$prodi', bimbingan='$bimbingan', tgl_bimbingan='$tgl_bimbingan' WHERE id_admin=$id_admin";
                    // $simpan=$db->query($db);
                    $hasil = $db->query($sql);
                    if ($hasil) {
                            echo "<script>window.location='?p=admin';</script>";
                        } else {
                            echo "<div class='alert alert-danger'>Gagal edit data: " . $db->error . "</div>";
                        }
                 }
                ?>


                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Admin</h3>
                        </div>

                        

                        <div class="card-body">
                            <form action="#" method="post">
                            <input type="hidden" name="id_admin" value="<?=$admin['id_admin']?>">

                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <select name="id" id="" value="<?=$admin['id']?>" class="form-control">
                                    <?php while ($mhs=mysqli_fetch_assoc($query1)){
                                        $id=$mhs['id'];
                                        $nama_mhs=$mhs['nama'];
                                        $id_lama=$mhs['id'];
                                        echo "<option value='$id'";
                                        if($id == $id_lama) {
                                            echo "selected";
                                        } 
                                        echo ">$nama_mhs</option>";
                                    } ?>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="">Nama Dosen</label>
                                <select name="id_dosen" id="" value="<?=$admin['id_dosen']?>" class="form-control">
                                    <?php while ($dosen=mysqli_fetch_assoc($query2)){
                                        $id_dosen=$dosen['id_dosen'];
                                        $nama_dosen=$dosen['nama'];
                                        $id_dosen_lama=$dosen['id_dosen'];
                                        echo "<option value='$id_dosen'";
                                        if($id_dosen == $id_dosen_lama) {
                                            echo "selected";
                                        } 
                                        echo ">$nama_dosen</option>";
                                    } ?>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control" value="<?=$admin['prodi']?>" placeholder="Masukkan Nama Lengkap" required>
                            </div><br>

                            <div class="form-group">
                                <label for="bimbingan">Bimbingan</label>
                                <input type="text" name="bimbingan" id="bimbingan" class="form-control" value="<?=$admin['bimbingan']?>" placeholder="Masukkan Nama Lengkap" required>
                            </div><br>

                            <div class="form-group">
                                <label for="">Tanggal Bimbingan</label>
                                <input type="date" name="tgl_bimbingan" id="" value="<?=$admin['tgl_bimbingan']?>" class="form-control">
                            </div><br><br>

                            <button type="submit"  name="simpanEdit" class="btn btn-primary" value="Simpan">Edit</button>
                            <a href="javascript:history.back(-1)" class="btn btn-secondary">Kembali</a>
                            
                            </form>
                        </div>
                        </div>
                    </div>
                    </section>
                <!--end::Card-->
                
                
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <?php } ?>