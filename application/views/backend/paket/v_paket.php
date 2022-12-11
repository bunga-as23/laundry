<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('info') ?>

    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url() ?>paket/tambah" class="btn btn-info">Tambah Paket</a><br><br>
        </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No. </th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Nama Paket</th>
                            <th class="text-center">Harga Paket</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) : ?>
                            <tr>

                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center"><?= $d->kode_paket ?></td>
                                <td class="text-center"><?= $d->nama_paket ?></td>
                                <td class="text-center"><?= "Rp. " . number_format($d->harga_paket, 0, '.', '.') ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>paket/edit/<?= $d->kode_paket ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a onclick="return confirm('Yakin dek??')" href="<?= base_url() ?>paket/delete/<?= $d->kode_paket ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>