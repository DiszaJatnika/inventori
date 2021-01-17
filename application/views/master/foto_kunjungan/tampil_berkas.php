<div class="clearfix"></div>
    
  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row mt-3">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Data A upload</h5>
              <div class="mt-3 text-right">
                <a href="<?=site_url('upload/print')?>">
                <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-print"></i> Print</button>
                </a>
                <a href="<?=site_url('upload/create');?>">
                  <button type="submit" class="btn btn-info submit-btn"><i class="fa fa-plus"></i> Tambah Doc.</button>
                </a>
            </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Upload</th>
                        <th>Nama RO/MO</th>
                        <th>Image</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; if (!empty($data)) : ?>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->tgl_upload; ?></td>
                            <td><?php echo $row->nama_ro_mo; ?></td>
                            <td><img width="100 " src="<?php echo base_url(); ?>assets/images/uploads/<?php echo $row->nama_berkas; ?>"/></td>
                            <td><?php echo $row->keterangan_berkas; ?></td>
                            <td>
                              <a href="<?=site_url('upload/e/'.$row->kd_berkas)?>">
                                <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i></button>
                              </a>
                              <a href="<?=site_url('upload/delete/'.$row->kd_berkas)?>">
                                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
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
      </div><!--End Row-->
      
      <!--start overlay-->
          <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->
