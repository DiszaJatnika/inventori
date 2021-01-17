        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Add User</h6>
                </div>
                <div class="card-body">
                  <form action="<?=base_url()?>user/tambah_aksi" method="post">
                      <div class="form-group">
                          <label>Username</label>                       
                          <input type="text" name="username" class="form-control" required>     
                      </div>

                      <div class="form-group">
                          <label>Password</label>                       
                          <input type="text" name="password" class="form-control" required>     
                      </div> 

                      <div class="form-group">
                          <label>Email</label>                       
                          <input type="email" name="email" class="form-control" required>     
                      </div>      

                      <div class="form-group">
                          <label>Level</label> 
                          <select name="level" class="form-control" required>
                              <option value="Belum Memilih" >Pilih</option>
                              <option value="ADMIN" >Admin</option>
                              <option value="USER" >User</option>
                          </select>                    
                      </div>

                      <div class="form-group">
                          <label>Blokir</label> 
                          <select name="blokir" class="form-control" required>
                              <option value="Belum Memilih" >Pilih</option>
                              <option value="YES" >Yes</option>
                              <option value="NO" >No</option>
                          </select>    
                      </div> 


                      <div>
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-pencil"></i>  Simpan</button>
                            <button type="reset" class="btn btn-info">Reset</button>

                        </div> 
                    </form>         
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->