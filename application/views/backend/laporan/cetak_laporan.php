<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            font-size: 14px;
            font-family: sans-serif;
            background: lightblue;
        }
    </style>
</head>

<body>

    <table width="750">
        <tr>
            <td style="text-align: center; font-size: 24px; font-weight:bold; font-family: sans-serif;">Laporan Transaksi</td>
        </tr>
    </table>

    <table width="750">
        <tr>
            <td style="text-align: center; font-size: 16px; font-family: sans-serif;">Dari Tanggal <?= mediumdate_indo($this->session->userdata('tanggal_mulai')) ?> Sampai Tanggal <?= mediumdate_indo($this->session->userdata('tanggal_akhir')) ?></td>
        </tr>
    </table><br><br>

    <table width="750" border="1">
        <tr>
            <th>Tanggal Masuk</th>
            <th>Kode Transaksi</th>
            <th>Konsumen</th>
            <th>Paket</th>
            <th>Berat (KG)</th>
            <th>Grand Total</th>
            <th>Status</th>
        </tr>

        <?php foreach ($laporan as $l) { ?>
            <tr>
                <td><?= mediumdate_indo($l->tgl_masuk)  ?></td>
                <td><?= $l->kode_transaksi ?></td>
                <td><?= $l->nama_konsumen ?></td>
                <td><?= $l->nama_paket ?></td>
                <td><?= $l->berat ?></td>
                <td><?= "Rp. " . number_format($l->grand_total, 0, '.', '.') ?></td>
                <td><?= $l->status ?></td>
            </tr>
        <?php } ?>

    </table>

</body>

</html>
<script>
    window.print();
</script>