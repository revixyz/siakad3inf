<?php
 
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

                $nim="";
                $nama="";
                $gender="";
                $alamat="";
                $prodi="";

                $id=$_GET['id'];
                $data= $db->query("SELECT * FROM mhs WHERE id='$id'");
                $d=$data->fetch_assoc();


                if(isset($_POST['simpanEdit'])){
                    $nim=$_POST['nim'];
                    $nama=$_POST['nama'];
                    $gender=$_POST['gender'];
                    $alamat=$_POST['alamat'];
                    $prodi=$_POST['prodi'];
                    $waktu=$_POST['waktu'];

                   

                    $waktu=date("Y-m-d H:i:s");
                    $sql = "UPDATE mhs SET nim='$nim', nama='$nama', gender='$gender', alamat='$alamat', prodi='$prodi', waktu='$waktu' WHERE id=$id";
                    // $simpan=$db->query($db);
                    $hasil = $db->query($sql);
                    if ($hasil) {
                            echo "<script>window.location='?p=mahasiswa';</script>";
                        } else {
                            echo "<div class='alert alert-danger'>Gagal edit data: " . $db->error . "</div>";
                        }
                 }
                ?>


                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Mahasiswa</h3>
                        </div>

                        

                        <div class="card-body">
                            <form action="#" method="post">
                                <?php
                                foreach ($data as $d){
                                    if($d['gender']=="L"){
                                        $genderL="checked";
                                    }else{
                                        $genderP="checked";
                                    }
                                }

                                switch($d['prodi']){
                                case '1':
                                    $prodi="Informatika";
                                    break;
                                case '2':
                                    $prodi="Arsitektur";
                                    break;
                                case '3':
                                    $prodi="Ilmu Lingkungan";
                                    break;
                                default:
                                    $prodi="Unknown";
                                    break;                           
                                 }
                                
                                ?>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" value="<?=$d['nim']?>" placeholder="Masukkan NIM" required>
                            </div><br>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?=$d['nama']?>" placeholder="Masukkan Nama Lengkap" required>
                            </div><br>

                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderL" value="L" <?php if($d['gender']=="L") echo "checked";?>>
                                <label class="form-check-label" for="genderL">Laki-laki</label>
                                </div>  
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderP" value="P" <?php if($d['gender']=="P") echo "checked";?>>
                                <label class="form-check-label" for="genderP">Perempuan</label>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="2" placeholder="Masukkan Alamat" value=""><?=$d['alamat']?></textarea>
                            </div><br>

                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <select class="form-control" name="prodi" id="prodi" >
                                    <option value="1" <?php if($d['prodi']=="1") echo "selected";?>>Informatika</option>
                                    <option value="2" <?php if($d['prodi']=="2") echo "selected";?>>Arsitektur</option>
                                    <option value="3" <?php if($d['prodi']=="3") echo "selected";?>>Ilmu Lingkungan</option>
                                </select>
                                 
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