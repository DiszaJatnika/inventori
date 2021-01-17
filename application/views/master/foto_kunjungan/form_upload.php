<div class="clearfix"></div>
    
  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">A Vability Location</div>
           <hr>
           <div class="col-md-12">
              <?php if ($pesan = $this->session->flashdata('pesan')): ?>
                <?php echo $pesan; ?>
              <?php endif ?>             
           </div>
           
               <?php 
            if(isset($error))
            {
                echo "ERROR UPLOAD : <br/>";
                print_r($error);
                echo "<hr/>";
            }
            ?>
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>upload/proses">
                <div class="form-group">
                    <label for="input-1">Tanggal Visit</label>
                    <input type="text" class="form-control" id="input-1" name="tanggal_visit" value="<?=date('Y-m-d')?>"  readonly>
                </div>
                <div class="form-group">
                <label>Pilih Kode Marchendise *</label> 
                <div class="input-group">
                    <select name="id_marchendise"  class="form-control" required autofocus>
                      <option value="">- Pilih -</option>
                          <?php foreach($data as $i => $row) {
                          echo '<option value="'.$row->id_marchendise.'" onkeyup="this.value = this.value.toUpperCase()"> ID : '.$row->id_marchendise.' / Tanggal Upload : '.$row->tgl_upload.'</option>';
                          } ?>
                    </select>
                  </div>
                </div>
                <div>Berkas   1: </div>
                <div><input type="file" name="berkas[]" required></div>
                <div>Keterangan 1 : </div>
                <div><textarea name="keterangan_berkas[]" style="resize:none;" readonly >Foto Tampak Depan</textarea></div>
                <hr/>
                <div>Berkas   2: </div>
                <div><input type="file" name="berkas[]" required></div>
                <div>Keterangan 2 : </div>
                <div><textarea name="keterangan_berkas[]" style="resize:none;" readonly>Foto Etalase</textarea></div>
                <hr/>
                <div>Berkas   3: </div>
                <div><input type="file" name="berkas[]" required></div>
                <div>Keterangan 3 : </div>
                <div><textarea name="keterangan_berkas[]" style="resize:none;" readonly>Foto Poster</textarea></div>
                <div>Berkas   4: </div>
                <div><input type="file" name="berkas[]" required></div>
                <div>Keterangan 4 : </div>
                <div><textarea name="keterangan_berkas[]" style="resize:none;" readonly>Foto Selfi</textarea></div>
                <hr/>
                <br/>
                <div><input type="submit" value="Simpan"/></div>
            </form>

         </div>
         </div>
      </div>



    <!--start overlay-->
          <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    
