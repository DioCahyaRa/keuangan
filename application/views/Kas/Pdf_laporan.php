<!DOCTYPE html>
<html>
<head>
  <title>Laporan Kas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('Assets/css/')?>style.css">
</head>
<body>

  <section>
    <h2 class="text-center">Laporan Kas</h2>
    <p class="text-center">Tanggal : <?= $date['start_date']?> s/d  <?= $date['end_date']?></p>

    <div class="table-harian">
        <table class="table text-center table-bordered" style="width:100%; font-size:15px;">
            <tr>
                <th>No</th>
                <th>No Bukti</th>
                <th colspan="4">Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
            <?php $no=1; foreach($data_laporan as $datas):?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $datas['no_kas']?></td>
                <td colspan="4"><?= $datas['uraian']?></td>
                <td>
                    <?php if ($datas['masuk_keluar'] == 'Masuk'):?>
                        Rp. <?= number_format($datas['nominal']).",-";?>
                    <?php else:?>
                        Rp. 0,-
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($datas['masuk_keluar'] == 'Keluar'):?>
                        Rp. <?= number_format($datas['nominal']).",-";?>
                    <?php else:?>
                        Rp. 0,-
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <table class="table text-center table-bordered" style="width:100%; font-size:15px;">
            <tr>
                <th>Saldo Kas per Tanggal <?= $date['date']?> </th>
                <th>Rp. <?= number_format($saldo).",-";?></th>
                <th>Rp. 0,-</th>
            </tr>
            <tr>
                <th>Jumlah Keluar/Masuk</th>
                <th>Rp. <?= number_format($debit).",-";?></th>
                <th>Rp. <?= number_format($kredit).",-";?></th>
            </tr>
            <tr>
                <th>Saldo</th>
                <th colspan="2">Rp. <?= number_format($saldo_akhir).",-";?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th>Rp. <?= number_format($debit).",-";?></th>
                <th>Rp. <?= number_format($debit).",-";?></th>
            </tr>
        </table>
    </div>

        <table class="table table-bordered text-center">
            <tr>
                <th>Kasir</th>
                <th>Waket II / Kabag Keuangan</th>
                <th>Ketua</th>
            </tr>

            <tr>
                <td rowspan="3"></td>
                <td rowspan="3"></td>
                <td rowspan="3"></td>
            </tr>

            <tr></tr>
            <tr></tr>

            <tr>
                <td>( Fajar Ismail )</td>
                <td>( Marhakim, S.Pd., MM.)</td>
                <td>( Taufik Maulana, Drs., MBA )</td>
            </tr>
        </table>

  </section>
</body>
</html>