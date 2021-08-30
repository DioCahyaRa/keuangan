<!DOCTYPE html>
<html>
<head>
  <title>Surat Perintah Membayar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('Assets/css/')?>style.css">
</head>
<body>
<?php foreach($data as $datas):?>
  <section>
    <h2 class="text-center">Surat Perintah Membayar</h2>
    
    <div class="head">
        <table class="table-1" style="width:40%">
        
            <tr>
                <th>Dibayar Kepada</th>
                <td>: <?= $datas['kepada'];?></td> 
                
            </tr>
            <tr>
                <th>Pos Anggaran</th>
                <td>: <?= $datas['pos_anggaran'];?></td> 
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>: Rp. <?= number_format($datas['nominal']).",-";?></td> 
            </tr>
        </table>

        <table class="table-2" style="width:30%">
            <tr>
                <th>Nomor Kas</th>
                <td>: <?= $no_kas?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>: <?= $date;?></td>
            </tr>
            <tr>
                <th>Cara Bayar</th>
                <td>: <?= $datas['cara_pembayaran'];?></td> 
            </tr>
            <tr>
                <th>Jenis Biaya</th>
                <td>: <?= $datas['jns_biaya'];?></td> 
            </tr>
        </table>
    </div>

    <div class="head-2">
        <table class="table table-bordered" style="width:100%;">
            <tr>
                <th><?= $datas['terbilang']?></th>
            </tr>
        </table>
    </div>

    <div class="table-core">
        <table class="table text-center table-bordered" style="width:100%; font-size:15px;">
            <tr>
                <th colspan="2">No. Surat</th>
                <th colspan="2">Uraian</th>
                <th colspan="2">Jumlah</th>
            </tr>
            <tr>
                <td colspan="2"><?=  $no_surat?></td>
                <td colspan="2"><?= $datas['uraian'];?></td>
                <td colspan="2">Rp. <?= number_format($datas['nominal']).",-";?></td> 
            </tr>
            <tr>
                <th colspan="2">Paraf</th>
                <th>Pemohon</th>
                <th>Menyetujui</th>
                <th colspan="2">Menerima</th>
            </tr>
            <tr>
                <th>Kabag</th>
                <th>Account</th>
                <td rowspan="2">
                    <?php if($datas['status']=='UNAPPROVED KABAG' || $datas['status']=='CANCELED' || $datas['status']=='UNAPPROVED WAKET II'){
                        ?> <?= $datas['status']?>
                    <?php }else{?>
                        <img src="<?= base_url('Assets/Image/ttd.png')?>" style="width:40px;">
                    <?php }?>
                </td>
                <td rowspan="2">
                    <?php if($datas['status']=='UNAPPROVED KABAG' || $datas['status']=='CANCELED' || $datas['status']=='UNAPPROVED WAKET II' || $datas['status']=='UNAPPROVED KETUA'){
                        ?> <?= $datas['status']?>
                    <?php }else{?>
                        <img src="<?= base_url('Assets/Image/ttd.png')?>" style="width:40px;">
                    <?php }?>
                </td>
                <td colspan="2" rowspan="2"></td>
            </tr>
            <tr class="height-kosong">
                <th rowspan="2">
                    <?php if($datas['status']=='UNAPPROVED KABAG' || $datas['status']=='CANCELED'){
                        ?> <?= $datas['status']?>
                    <?php }else{?>
                        <img src="<?= base_url('Assets/Image/ttd.png')?>" style="width:40px;">
                    <?php }?>
                </th>
                <th rowspan="2">
                    <?php if($datas['status']=='CANCELED'){
                        ?> <?= $datas['status']?>
                    <?php }else{?>
                        <img src="<?= base_url('Assets/Image/ttd.png')?>" style="width:40px;">
                    <?php }?>
                </th>
            </tr>
            <tr>
                <td>(Marhakim, S.Pd., MM.)</td>
                <td>(Taufik Maulana, Drs., MBA.)</td>
                <td colspan="2" class="text-bottom">(.................)</td>
            </tr>
            <tr>
                <th colspan="2">Anggaran</th>
                <th>Realisasi</th>
                <th>Sisa Anggaran</th>
                <th colspan="2">Keterangan</th>
            </tr>
            <tr>
            <?php if($datas['status']=='APPROVED'){?>
                <td colspan="2">Rp. <?= number_format($anggaran).",-";?></td>
                <td> Rp. <?= number_format($realisasi).",-";?></td>
                <td> Rp. <?= number_format($sisa_anggaran).",-";?></td>
                <td colspan="2"></td>
            <?php }else{?>
                <td colspan="2"></td>
                <td></td>
                <td></td>
                <td colspan="2"></td>
            <?php }?>
            </tr>
        </table>
        <p class="text-center">BUKTI HARUS DILAMPIRKAN</p>
    </div>

    

  </section>
<?php endforeach;?>
</body>
</html>