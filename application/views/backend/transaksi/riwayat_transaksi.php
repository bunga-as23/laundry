<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?= $this->session->flashdata('info') ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No. </th>
                                <th class="text-center">Tanggal Masuk</th>
                                <th class="text-center">Kode Transaksi</th>
                                <th class="text-center">Konsumen</th>
                                <th class="text-center">Paket</th>
                                <th class="text-center">Berat (KG)</th>
                                <th class="text-center">Grand Total</th>
                                <th class="text-center">Tanggal Ambil</th>
                                <th class="text-center">Status Bayar</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d->tgl_masuk ?></td>
                                    <td><?= $d->kode_transaksi ?></td>
                                    <td><?= $d->nama_konsumen ?></td>
                                    <td><?= $d->nama_paket ?></td>
                                    <td><?= $d->berat ?></td>
                                    <td><?= "Rp." . number_format($d->grand_total, 0, '.', '.') ?></td>
                                    <td><?= $d->tgl_ambil ?></td>
                                    <td><?= $d->bayar ?></td>
                                    <td>
                                        <?php
                                        if ($d->status == "Baru") { ?>
                                            <select name="status" class="badge badge-danger status">
                                                <option value="<?= $d->kode_transaksi ?>Baru" selected>Baru</option>
                                                <option value="<?= $d->kode_transaksi ?>Proses">Proses</option>
                                                <option value="<?= $d->kode_transaksi ?>Selesai">Selesai</option>
                                            </select>
                                        <?php } else if ($d->status == "Proses") { ?>
                                            <select name="status" class="badge badge-warning status">
                                                <option value="<?= $d->kode_transaksi ?>Baru">Baru</option>
                                                <option value="<?= $d->kode_transaksi ?>Proses" selected>Proses</option>
                                                <option value="<?= $d->kode_transaksi ?>Selesai">Selesai</option>
                                            </select>
                                        <?php  } else { ?>
                                            <button class="btn btn-success btn-sm dropdown-toggle">Selesai</button>
                                        <?php }
                                        ?>
                                    </td>

                                    <?php
                                    if ($d->status == "Selesai") { ?>
                                        <td>
                                            <a href="<?= base_url() ?>transaksi/detail/<?= $d->kode_transaksi ?>" class="btn btn-warning btn-sm">Detail</a>
                                        </td>
                                    <?php  } else { ?>
                                        <td>
                                            <a href="<?= base_url() ?>transaksi/detail/<?= $d->kode_transaksi ?>" class="btn btn-warning btn-sm">Detail</a>
                                            <a href="<?= base_url() ?>transaksi/edit_transaksi/<?= $d->kode_transaksi ?>" class="btn btn-info btn-sm">Edit</a>
                                        </td>
                                    <?php }
                                    ?>


                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $('.status').change(function() {
            var status = $(this).val();
            var kt = status.substr(0, 13);
            var stt = status.substr(13, 10);

            $.ajax({
                url: "<?= base_url() ?>transaksi/update_status",
                method: "post",
                data: {
                    kt: kt,
                    stt: stt
                }
            });

            location.reload();
        });
    </script>

</body>

</html>