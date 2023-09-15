<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Laporan Keuangan</h1>
    <h3 align="center"><?= $judul;?></h3>
    <table border="1" align="center">
        <thead>
             <tr>
                <td
                     align="right" colspan="7"> saldo tanggal : <?= $tanggal1 ?> 
                     Rp<?= number_format($saldo = $this->Dashboard_model->saldo_awal($tanggal1)) ?>
                </td>
            </tr>
            <tr >
                <th>No</th>
                <th>Tanggal</th>
                <th>Transaksi</th>
                <th>keterangan</th>
                <th>pemasukan</th>
                <th>pengeluaran</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            
               
            <?php $no = 1;
            $saldo = $this->Dashboard_model->saldo_awal($tanggal1);
            foreach ($filter as $ter) : ?>
            
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td><?= $ter['tanggal']; ?></td>
                <td><?= $ter['jenis_transaksi']; ?></td>
                <td><?= $ter['keterangan']; ?></td>
                <?php if ($ter['jenis_transaksi'] == 'pemasukan') : ?>
                    <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>

                    <?php if ($ter['jenis_transaksi'] == 'pengeluaran') : ?>
                        <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>
                     <?php if($ter['jenis_transaksi'] == 'pemasukan') : ?>
                            <td align="right">Rp. <?= number_format($saldo = $saldo + $ter['nominal']); ?></td>
                        <?php else : ?>
                            <td align="right">Rp. <?= number_format($saldo = $saldo - $ter['nominal']); ?></td>
                        <?php endif; ?>
                </tr>
                <?php endforeach; ?>
                    <tr>
                       <td align="center" colspan="4">JUMLAH </td>
                       <td align="right"> Rp <?= number_format($tMasuk['pemasukan']); ?></td>
                       <td align="right"> Rp <?= number_format($tKeluar['pengeluaran']); ?></td>
                       <td align="right"> Rp <?= number_format($tMasuk['pemasukan'] - $tKeluar['pengeluaran']); ?></td>
                   </tr>
          
        </tbody>
    </table>
        
</body>
</html>