<?php
require_once "../config.php";

$data=$db->query("SELECT * FROM dosen");
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
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Dosen</h3></div>
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
                    <a href="../admin?p=tambahdosen" class="btn btn-sm btn-success mb-3">Tambah</a>
                    <table class="table table-striped table-however">
                    <thead>
                      <tr><th>No</th><th>NIDN</th><th>Nama</th><th>Gender</th><th>Email</th><th>Opsi</th></tr>
                    </thead>
                    <tbody>
                      <?php
                     $no=0;
                      foreach($data as $d){ //foreach adalah perulangan dalam data dalam variabel data diatas (query)
                        $no++;

                        if($d['gender']=="L"){
                                $jk="Laki-laki";
                            }else{
                                $jk="Perempuan";
                            }
                         
                        echo "<tr>
                        <td>{$no}</td>
                        <td>$d[nidn]</td>
                        <td>$d[nama]</td>
                        <td>$jk</td>
                        <td>$d[email]</td>
                        <td>
                        <a href='../admin?p=detaildosen&id_dosen=$d[id_dosen]' class='btn btn-sm btn-primary'>Detail</a>
                        <a href='../admin?p=editdosen&id_dosen=$d[id_dosen]' class='btn btn-sm btn-info'>Edit</a>
                        <a href='../admin?p=hapusdosen&id_dosen=$d[id_dosen]' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin Hapus Data?\")'>Hapus</a>
                        </td>
                        </tr>";
                      }
                      ?>                                      
                    </table>
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