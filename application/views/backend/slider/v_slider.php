<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('info') ?>

    <div class="row">
        <div class="col-md-12">
            <a href="<?= base_url() ?>slider/tambah" class="btn btn-info">Tambah Slider</a><br><br>
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
                            <th class="text-center">Status</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($slider as $s) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>assets/images/slider/<?= $s->gambar_slider ?>">
                                        <img src="<?= base_url() ?>assets/images/slider/<?= $s->gambar_slider ?>" width="60">
                                    </a>
                                </td>
                                <td class="text-center"><?= $s->judul_slider ?></td>
                                <td class="text-center"><?= $s->deskripsi_slider ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($s->status_slider == "Aktif") { ?>
                                        <span class="badge badge-info">Aktif</span>
                                    <?php  } else { ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php  }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>slider/edit/<?= $s->id_slider ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= base_url() ?>slider/delete/<?= $s->id_slider ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Menghapus?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>