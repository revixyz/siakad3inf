

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
                            <h3 class="card-title">Ganti Password</h3>
                        </div>

                        

                        <div class="card-body">
                            <form action="" method="POST">
                            <div class="form-group">
                                <label for="password_lama">Password Lama</label>
                                <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Masukkan Password Lama" required>
                            </div><br>

                            <div class="form-group">
                                <label for="password_baru">Password Baru</label>
                                <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Masukkan Password Baru" required>
                            </div><br>

                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password Baru" required>  
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