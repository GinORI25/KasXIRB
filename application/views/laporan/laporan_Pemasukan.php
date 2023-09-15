<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Laporan Pemasukan</h1>
    <h3 align="center"><?= $judul;?></h3>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Transaksi</th>
                <th>keterangan</th>
                <th>pemasukan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($tabrak as $ter) : ?>
            <tr>
                <td align="center"><?= $no++ ?></td>
                <td><?= $ter['tanggal']; ?></td>
                <td><?= $ter['jenis_transaksi']; ?></td>
                <td><?= $ter['keterangan']; ?></td>
                <td align="right">Rp. <?= number_format($ter['nominal']); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                       <td align="center" colspan="4">JUMLAH </td>
                       <td align="right"> Rp <?= number_format($tMasuk['pemasukan']); ?></td>
                   </tr>
        </tbody>
    </table>
</body>
</html>