        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data User</h1>
          <p class="mb-4">Berisi data User sebagai Hak Akses dalam penggunaan aplikasi ini  </p>

          <!-- DataTales Example -->
          <?php echo $this->session->flashdata('message_edit') ?>
          <?php echo $this->session->flashdata('message_success') ?>
          <?php echo $this->session->flashdata('message') ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php echo anchor('user/add', '<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah User</button>') ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Blokir</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; if (!empty($data)) : ?>
                    <?php foreach ($data as $row) : ?>
                      <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$row->username ?></td>
                        <td><?=$row->email ?></td>
                        <td><?=$row->level ?></td>
                        <td><?=$row->blokir ?></td>
                        <td>
                          <a href="<?=site_url('user/update/'.$row->user_id)?>" class="btn btn-info btn-circle">
                            <i class="fas fa-info-circle"></i>
                          </a>
                          <a href="<?=site_url('user/delete/'.$row->user_id)?>" class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                    </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="9" align="center">Tidak Ada Data</td>
                      </tr>  
                    <?php endif ?>                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->