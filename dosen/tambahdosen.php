

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
                $nidn="";
                $nama="";
                $gender="";
                $email="";


                if(isset($_POST['simpan'])){
                    $nidn=$_POST['nidn'];
                    $nama=$_POST['nama'];
                    $gender=$_POST['gender'];
                    $email=$_POST['email'];

                    require_once "../config.php";

                    $waktu=date("Y-m-d H:i:s");
                    $sql = "INSERT INTO dosen (nidn, nama, gender, email)
            VALUES ('$nidn', '$nama', '$gender', '$email')";
                    // $simpan=$db->query($db);
                    $tes = $db->query($sql);
                    if ($tes) {
        echo "<script>
                window.location='?p=dosen';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>
                Gagal menyimpan data: " . $db->error . "
              </div>";
    }
                    
                }
                ?>


                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Dosen</h3>
                        </div>

                        

                        <div class="card-body">
                            <form action="#" method="post">
                              
                                

                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="text" name="nidn" id="nidn" class="form-control" value="<?=$nidn?>" placeholder="Masukkan NIM" required>
                            </div><br>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?=$nama?>" placeholder="Masukkan Nama Lengkap" required>
                            </div><br>

                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderL" value="L" <?php if($gender=="L") echo "checked";?>>
                                <label class="form-check-label" for="genderL">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderP" value="P" <?php if($gender=="P") echo "checked";?>>
                                <label class="form-check-label" for="genderP">Perempuan</label>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?=$email?>" placeholder="Masukkan Email" required>
                            </div><br><br>

                            <button type="submit"  name="simpan" class="btn btn-primary" value="Simpan">Simpan</button>
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