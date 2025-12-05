<?php
require_once "../config.php";


$sql1 = "SELECT * FROM mhs";
$query1 = $db->query($sql1);

$sql2 = "SELECT * FROM dosen";
$query2 = $db->query($sql2);
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
                

                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Admin</h3>
                        </div>

                        <?php
                            require_once "../config.php";


                            if(isset($_POST['simpan'])){
                            $id=$_POST['id'] ;
                            $id_dosen=$_POST['id_dosen'];
                            $prodi=$_POST['prodi'];
                            $bimbingan=$_POST['bimbingan'];
                            $tgl_bimbingan=$_POST['tgl_bimbingan'];


                            $sql = "INSERT INTO tb_admin ( id, id_dosen, prodi, bimbingan, tgl_bimbingan)
                                    VALUES ('$id', '$id_dosen', '$prodi', '$bimbingan', '$tgl_bimbingan')";

                            $tes = mysqli_query($db,$sql);

                            if ($tes){
                                echo "<script>
                                        window.location='?p=admin';
                                      </script>";
                            } else{
                                echo "<div class='alert alert-danger'>
                                        Gagal menyimpan data: " . $db->error . "
                                      </div>";
                            }
                            }
                          ?>


                        <div class="card-body">
                            <form action="#" method="post">

                            <div class="form-group">
                                <label for="id_admin"></label>
                            <input type="hidden" name="id_admin" id="id_admin" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <select class="form-control" name="id" id="" >
                                  <option selected disabled>Pilih Mahasiswa</option>
                                    <?php while ($mhs=mysqli_fetch_assoc($query1)){
                                        $id=$mhs['id'];
                                        $nama_mhs=$mhs['nama'];
                                        echo "<option value='$id'>$nama_mhs</option>";
                                    } ?>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="">Nama Dosen</label>
                                <select class="form-control" name="id_dosen" id="" >
                                  <option selected disabled>Pilih Dosen</option>
                                    <?php while ($dsn=mysqli_fetch_assoc($query2)){
                                        $id_dosen=$dsn['id_dosen'];
                                        $nama_dosen=$dsn['nama'];
                                        echo "<option value='$id_dosen'>$nama_dosen</option>";
                                    } ?>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="bimbingan">Bimbingan</label>
                                <input type="text" name="bimbingan" id="bimbingan" class="form-control"  placeholder="Masukkan Keterangan" required>
                            </div><br>

                            <div class="form-group">
                                <label for="">Jadwal Bimbingan</label>
                                <input type="date" name="tgl_bimbingan" id="" class="form-control"  >
                            </div><br>

                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control"  placeholder="Masukkan Prodi" required>
                            </div><br><br>

                            <button type="submit" class="btn btn-primary" name="simpan" value="Simpan">Simpan</button>
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