<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('info') ?>

    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url() ?>about/tambah" class="btn btn-info">Tambah About</a><br><br>
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
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($about as $a) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('assets/images/about/') ?><?= $a->gambar_about ?>" target="_blank">
                                        <img src="<?= base_url('assets/images/about/') ?><?= $a->gambar_about ?>" width="70">
                                    </a>
                                </td>
                                <td class="text-center"><?= $a->judul_about ?></td>
                                <td class="text-center"><?= $a->deskripsi_about ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>about/edit/<?= $a->id_about ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a onclick="return confirm('Yakin mau menghapus?')" href="<?= base_url() ?>about/delete/<?= $a->id_about ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>