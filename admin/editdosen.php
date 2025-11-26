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

                $nidn="";
                $nama="";
                $gender="";
                $email="";
                $prodi="";

                $id_dosen=$_GET['id_dosen'];
                $data= $db->query("SELECT * FROM dosen WHERE id_dosen='$id_dosen'");
                $d=$data->fetch_assoc();


                if(isset($_POST['simpanEdit'])){
                    $nidn=$_POST['nidn'];
                    $nama=$_POST['nama'];
                    $gender=$_POST['gender'];
                    $email=$_POST['email'];

                   

                    $waktu=date("Y-m-d H:i:s");
                    $sql = "UPDATE dosen SET nidn='$nidn', nama='$nama', gender='$gender', email='$email' WHERE id_dosen=$id_dosen";
                    // $simpan=$db->query($db);
                    $hasil = $db->query($sql);
                    if ($hasil) {
                            echo "<script>window.location='?p=dosen';</script>";
                        } else {
                            echo "<div class='alert alert-danger'>Gagal edit data: " . $db->error . "</div>";
                        }
                 }
                ?>


                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Dosen</h3>
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
                                
                                ?>
                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="text" name="nidn" id="nidn" class="form-control" value="<?=$d['nidn']?>" placeholder="Masukkan NIM" required>
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
                                <label for="email">Email</label>
                                <textarea name="email" id="email" class="form-control" rows="2" placeholder="Masukkan Alamat" value=""><?=$d['email']?></textarea>
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