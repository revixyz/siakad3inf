<?php
require_once "../config.php";
$data=$db->query("SELECT * FROM mhs");

$keyword="";
$category="";
$searchClilcked="";
if(isset($_POST['keyword'])){
  $keyword=$_POST['keyword'];
}
if(isset($_POST['category'])){
  $category=$_POST['category'];
}
if(isset($_POST['cari'])){
  $searchClilcked=$_POST['cari'];
}


if(isset($_POST['cari'])){
  if($category=="nim"){
    $data=$db->query("SELECT * FROM mhs WHERE nim LIKE '%$keyword%' ");
  }elseif($category=="nama"){
    $data=$db->query("SELECT * FROM mhs WHERE nama LIKE '%$keyword%' ");
  }elseif($category=="gender"){
    $data=$db->query("SELECT * FROM mhs WHERE gender LIKE '%$keyword%' ");
  }elseif($category=="alamat"){
    $data=$db->query("SELECT * FROM mhs WHERE alamat LIKE '%$keyword%' ");
  }elseif($category=="prodi"){
    $data=$db->query("SELECT * FROM mhs WHERE prodi LIKE '%$keyword%' ");
  }
  if($category=="prodi"){
    if(strtolower($keyword)=="informatika"){
      $data=$db->query("SELECT * FROM mhs WHERE prodi=1 ");
    }elseif(strtolower($keyword)=="arsitektur"){
      $data=$db->query("SELECT * FROM mhs WHERE prodi=2 ");
    }elseif(strtolower($keyword)=="ilmu lingkungan"){
      $data=$db->query("SELECT * FROM mhs WHERE prodi=3 ");
    }
  }
}else{
  $data=$db->query("SELECT * FROM mhs");
}

$jumlah = $data->num_rows;


?>


<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-sm-6"><h3 class="mb-0">Dashboard Mahasiswa</h3></div>
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
                    <table><tr><td>
                      <a href="../admin?p=tambahmhs" class="btn btn-sm btn-success mb-3">Tambah</a>
                    </td><td>
                    <form method="POST" action="" class="d-flex mb-3 ms-2">
                      <input type="text" name="keyword" class="form-control form-control-sm" placeholder="Search..." value='<?=$keyword?>' >
                    <select name='category' class="form-select form-select-sm ms-2">
                      <option value="" <?php if($category=="") echo "selected";?>>--Pilih Category--</option>
                      <option value='nim' <?php if($category=="nim") echo "selected";?>>NIM</option>
                      <option value='nama' <?php if($category=="nama") echo "selected";?>>Nama</option>
                      <option value='gender' <?php if($category=="gender") echo "selected";?>>Gender</option>
                      <option value='alamat' <?php if($category=="alamat") echo "selected";?>>Alamat</option>
                      <option value='prodi' <?php if($category=="prodi") echo "selected";?>>Prodi</option>
                    </select>
                      <button type="submit" name='cari' value="<?=$searchClilcked?>" class="btn btn-sm btn-primary ms-2">Cari</button>
                    </td></tr></table>

                    <?php
                    if ($searchClilcked) {
                        if($jumlah==0){
                          echo "<i><p>Tidak ditemukan data </p></i>";
                        }else
                        echo "<i><p>Ditemukan <strong>$jumlah</strong> data untuk kata kunci <strong>$keyword</strong> pada category <strong>$category</strong></p></i>";
                      
                    }
                    ?>
                    
                    <table class="table table-striped table-however">
                    <thead>
                      <tr><th>No</th><th>NIM</th><th>Nama</th><th>Gender</th><th>Alamat</th><th>Prodi</th><th>Opsi</th></tr>
                    </thead>
                    <tbody>
                      <?php
                     $no=0;
                      foreach($data as $d){ //foreach adalah perulangan dalam data dalam variabel data diatas (query)
                        $no++;

                        if($d['prodi']==1){
                          $d['prodi']="Informatika";
                        }elseif($d['prodi']==2){
                          $d['prodi']="Arsitektur";
                        }elseif($d['prodi']==3){
                          $d['prodi']="Ilmu Lingkungan";
                        }else($d['prodi']="Unknown");

                        if($d['gender']=="L"){
                                $jk="Laki-laki";
                            }else{
                                $jk="Perempuan";
                            }
                        
                        

                        echo "<tr>
                        <td>{$no}</td>
                        <td>$d[nim]</td>
                        <td>$d[nama]</td>
                        <td>$jk</td>
                        <td>$d[alamat]</td>
                        <td>$d[prodi]</td>
                        <td>
                        <a href='../admin?p=detailmhs&id=$d[id]' class='btn btn-sm btn-primary'>Detail</a>
                        <a href='../admin?p=editmhs&id=$d[id]' class='btn btn-sm btn-info'>Edit</a>
                        <a href='../admin?p=hapusmhs&id=$d[id]' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin Hapus Data?\")'>Hapus</a>
                        </td>
                        </tr>";
                      }
                      if ($jumlah==0){
                        echo "<tr><td colspan='7' class='text-center'>Data Kosong</td></tr>";
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