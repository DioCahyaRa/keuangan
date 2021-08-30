<!DOCTYPE html>
<html>
<head>
  <title>Surat Perintah Menerima Uang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('Assets/css/')?>style.css">
</head>
<body>
<?php foreach($data as $datas):?>
  <section>
    <h2 class="text-center">Surat Perintah Menerima Uang</h2>
    
    <div class="head">
        <table class="table-1" style="width:40%">
        
            <tr>
                <th>Terima Dari</th>
                <td>: <?= $datas['asal_dana'];?></td>
            </tr>
            <tr>
                <th>Cara Bayar</th>
                <td>: <?= $datas['cara_pembayaran'];?></td> 
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>: Rp. <?= number_format($datas['nominal']).",-";?></td> 
            </tr>
        </table>

        <table class="table-2" style="width:30%">
            <tr>
                <th>No. Kas</th>
                <td>: <?= $no_kas?></td> 
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>: <?= $date?></td> 
            </tr>
            <tr>
                <th>Jenis Biaya</th>
                <td>: <?= $datas['jns_biaya'];?></td> 
            </tr>
        </table>
    </div>

    <div class="head-2">
        <table class="table table-bordered text-center" style="width:100%;">
            <tr>
                <th><?= $datas['terbilang']?></th>
            </tr>
        </table>
    </div>

    <div class="table-core">
        <table class="table text-center table-bordered" style="width=100%">
            <tr>
                <th colspan="2">No. Surat</th>
                <th colspan="3">Uraian</th>
                <th colspan="2">Jumlah</th>
            </tr>
            <tr>
                <td colspan="2"><?= $no_surat?></td>
                <td colspan="3"><?= $datas['uraian'];?></td>
                <td colspan="2">Rp. <?= number_format($datas['nominal']).",-";?></td> 
            </tr>
            <tr>
                <th colspan="2">Paraf</th>
                <th colspan="5" class="text-center">Menyetujui</th>
                
            </tr>
            <tr>
                <th>Kabag</th>
                <th>Account</th>
                <th rowspan="2" colspan="5">
                    <?php if($datas['status']=='UNAPPROVED KABAG' || $datas['status']=='UNAPPROVED KETUA' || $datas['status']=='CANCELED'){
                        ?> <?= $datas['status']?>
                    <?php }else{?>
                        <img src="<?= base_url('Assets/Image/ttd2.png')?>" style="width:140px;">
                    <?php }?></th>
                
            </tr>
            <tr class="height-kosong">
                <th rowspan="2"><?php if($datas['status']=='UNAPPROVED KABAG'|| $datas['status']=='CANCELED'){
                    ?> <?= $datas['status']?>
                    <?php }else{?>
                    <img src="<?= base_url('Assets/Image/ttd.png')?>" style="width:70px;">
                    <?php }?></th>
                <th rowspan="2"><img src="<?= base_url('Assets/Image/ttd.png')?>" style="width:70px;"></th>
            </tr>
            <tr>
                
                <td colspan="5" class="text-center">(Taufik Maulana, Drs., MBA.)</td>
            </tr>
            
        </table>
        <p class="text-center">BUKTI HARUS DILAMPIRKAN</p>
    </div>

    

  </section>
<?php endforeach;?>
</body>
</html>