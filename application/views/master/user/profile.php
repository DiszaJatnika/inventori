
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        <div class="box-body">
          
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?=base_url('assets/img/profile').'/'.$user['image'];?>" class="card-img" width="160" height="160">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $this->fungsi->user_login()->username ?></h5>
                <p class="card-text"><?php echo $this->fungsi->user_login()->email ?></p>
              </div>
            </div>
          </div>
        </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <small>Catatan: <font color="red"><i>Jangan memberikan hak akses kepada orang lain tanpa sepengetahuan admin!</i></font></small>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      </section>
        <!-- right col -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
