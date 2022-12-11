<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('info') ?>

    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url() ?>konsumen/tambah" class="btn btn-info">Tambah Konsumen</a><br><br>
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
                            <th class="text-center">Nama Konsumen</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No. Telpon</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $d->kode_konsumen ?></td>
                                <td class="text-center"><?= $d->nama_konsumen ?></td>
                                <td class="text-center"><?= $d->alamat_konsumen ?></td>
                                <td class="text-center"><?= $d->no_telp ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>konsumen/edit/<?= $d->kode_konsumen ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a onclick="return confirm('Yakin dek??')" href="<?= base_url() ?>konsumen/delete/<?= $d->kode_konsumen ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>