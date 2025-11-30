<?php
require_once "../config.php";

$data=$db->query("SELECT * FROM admin");
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
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Admin</h3></div>
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
                    <a href="../admin?p=tambahadmin" class="btn btn-sm btn-success mb-3">Tambah</a>
                    <table class="table table-striped table-however">
                    <thead>
                      <tr><th>No</th><th>Nama Mahasiswa</th><th>Nama Dosen</th><th>Prodi</th><th>Bimbingan</th><th>Tgl Bimbingan</th><th>Opsi</th></tr>
                    </thead>
                    <tbody>
                      <?php
                     $no=0;
                      foreach($data as $d){ //foreach adalah perulangan dalam data dalam variabel data diatas (query)
                        $no++;

                        
                         
                        echo "<tr>
                        <td>{$no}</td>
                        <td>$d[id]</td>
                        <td>$d[id_dosen]</td>
                        <td>$d[prodi]</td>
                        <td>$d[bimbingan]</td>
                        <td>$d[tgl_bimbingan]</td>
                        <td>
                        <a href='../admin?p=detailadmin&id_admin=$d[id_admin]' class='btn btn-sm btn-primary'>Detail</a>
                        <a href='../admin?p=editadmin&id_admin=$d[id_admin]' class='btn btn-sm btn-info'>Edit</a>
                        <a href='../admin?p=hapusadmin&id_admin=$d[id_admin]' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin Hapus Data?\")'>Hapus</a>
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