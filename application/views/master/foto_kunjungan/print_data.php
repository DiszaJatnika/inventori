<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan Dokumentasi</title>
</head>
<style>
    @media print {
        #print{
            display: none;
        }
    }
</style>
<body>
<!-- Modal -->
<table border="0" align="center" style="width:900px;border:none;">
    <tbody>
        <tr>
            <td style="text-align: center;"><img src="<?php echo base_url('assets/images/logo_xl_exsis.png')?>" width="100" height="100"></td>
            <td style="text-align: center;"><font size="6"><b>DOKUMENTASI MD TASIK CIBARAN</b></font><br>
                <b>JL. PASEH NO. 102, KOTA TASIKMALAYA JAWA BARAT INDONESIA</b></td>
        </tr>
        <tr>
            <td colspan="2"><b>==================================================================================================</b></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        
    </tbody>
</table>

    


    <table border="1" align="center" style="width:900px;margin-bottom:20px;">
        <thead>
        <tr>
            <th style="width:50px;text-align: center;">No</th>
            <th style="text-align: center;">TGL UPLAOD</th>
            <th style="text-align: center;">NAMA RO / MO</th>
            <th style="text-align: center;">DEPO</th>
            <th style="text-align: center;">KECAMATAN</th>
            <th style="text-align: center;">FOTO</th>
            <th style="text-align: center;width: 120px">KETERANGAN</th>
        </tr>
        </thead>
        <tbody>
            <?php $no = 1; if (!empty($data)) : ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->tgl_upload; ?></td>
                    <td><?php echo $row->nama_ro_mo; ?></td>
                    <td><?php echo $row->depo; ?></td>
                    <td><?php echo $row->kecamatan; ?></td>
                    <td><img width="100 " src="<?php echo base_url(); ?>assets/images/uploads/<?php echo $row->nama_berkas; ?>"/></td>
                    <td><?php echo $row->keterangan_berkas; ?></td>
                </tr>
            <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="9" align="center">Tidak Ada Data</td>
              </tr>  
            <?php endif ?>    
        </tbody>        
    </table>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    </table>
    <tr>
        <td><br/><br/><br/><br/></td>
    </tr>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <td align="right" colspan="3">Tasikmalaya, <?php echo date('d-M-Y')?></td>
        </tr>
        <tr>
            <td><br/></td>
        </tr>
        <tr>
            <td align="center">MD,</td>
            <td align="center">Ketua MD,</td>
            <td align="center">Pimpinan,</td>
        </tr>

        <tr>
            <td><br/><br/><br/><br/></td>
        </tr>
        <tr>
            <td align="center"></td>
        </tr>
    </table>
    <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
        <tr>
            <th><br/><br/></th>
        </tr>
        <tr>
            <th align="left"></th>
        </tr>
    </table>
</div>
</body>

</html>
<script>
    window.print();
</script>






