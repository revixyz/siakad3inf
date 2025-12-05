<?php
$idx=$_GET['id_admin'];

require_once "../config.php";
$sql_join= "SELECT tb_admin.id_admin, mhs.nama AS nama_mhs, dosen.nama AS nama_dosen, tb_admin.prodi, tb_admin.bimbingan, tb_admin.tgl_bimbingan
FROM tb_admin 
INNER JOIN mhs ON tb_admin.id = mhs.id
INNER JOIN dosen ON tb_admin.id_dosen = dosen.id_dosen WHERE tb_admin.id_admin='$idx'";
$data_join=$db->query($sql_join);



//var_dump($data);
?>


<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Detail Dosen</h3></div>
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
                <div class="card">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <!--begin::Card Title-->
                    <h3 class="card-title"></h3>
                    <!--end::Card Title-->
                    <!--begin::Card Toolbar-->
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                        type="button"
                        class="btn btn-tool"
                        data-lte-toggle="card-remove"
                        title="Remove"
                      >
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                    <!--end::Card Toolbar-->
                    <!-- here -->
                     <div class="col-md-6">
                    <table class="table table-bordered">
                        <?php
                        foreach($data_join as $d){
                            
                                 echo "<tr><td>NAMA MAHASISWA</td><td>$d[nama_mhs]</td></tr>";
                                 echo "<tr><td>NAMA DOSEN</td><td>$d[nama_dosen]</td></tr>";
                                 echo "<tr><td>PRODI</td><td>$d[prodi]</td></tr>";
                                 echo "<tr><td>BIMBINGAN</td><td>$d[bimbingan]</td></tr>";
                                 echo "<tr><td>TGL BIMBINGAN</td><td>$d[tgl_bimbingan]</td></tr>";

                                    
                        }
                        ?>

                    </table>
                    <a href="javascript:history.back(-1)" class="btn btn-secondary">Kembali</a>
                  </div>
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  
                  <!--end::Card Body-->
                  
                </div>
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