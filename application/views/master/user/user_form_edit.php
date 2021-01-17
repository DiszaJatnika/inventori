        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit User</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                </div>
                <div class="card-body">
                  <?php foreach($user as $data) : ?>
                    <form method="post" action="<?php echo base_url('user/update_aksi'); ?>">
                      <div class="form-group">
                          <label>Username</label>                      
                          <input class="form-control" type="hidden" name="user_id" value="<?php echo $data->user_id ?>"> 
                          <input type="text" name="username" class="form-control" value="<?php echo $data->username ?>" required>     
                      </div>

                      <div class="form-group">
                          <label>Password</label>                       
                          <input type="text" name="password" class="form-control" value="<?php echo $data->password ?>" required>     
                      </div> 

                      <div class="form-group">
                          <label>Email</label>                       
                          <input type="email" name="email" class="form-control" value="<?php echo $data->email ?>" required>     
                      </div>      

                      <div class="form-group">
                          <label>Level</label> 
                          <select name="level" class="form-control" required>
                              <option value="<?php echo $data->level ?>" ><?php echo $data->level ?></option>
                              <option value="ADMIN" >Admin</option>
                              <option value="USER" >User</option>
                          </select>                    
                      </div>

                      <div class="form-group">
                          <label>Blokir</label> 
                          <select name="blokir" class="form-control" required>
                              <option value="<?php echo $data->blokir ?>" ><?php echo $data->blokir ?></option>
                              <option value="Yes" >Yes</option>
                              <option value="No" >No</option>
                          </select>    
                      </div> 


                      <div>
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-pencil"></i>  Edit</button>
                            <button type="reset" class="btn btn-info">Reset</button>

                        </div> 
                    </form>         
                    <?php endforeach; ?>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

