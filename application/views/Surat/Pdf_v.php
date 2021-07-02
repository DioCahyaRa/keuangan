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
                <th> </th>
                <td> </td> 
                
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

    

  </section>
<?php endforeach;?>
</body>
</html>