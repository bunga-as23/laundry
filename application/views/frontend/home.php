<div class="container">
    <div class="row my-5" data-aos="fade-up" data-aos-duration="1000">

        <?php foreach ($about as $a) { ?>
            <div class=" col-md-4">
                <img class="set-image" src="<?= base_url('assets/images/about/') ?><?= $a->gambar_about ?>">
            </div>

            <div class="col-md-8">
                <h5><?= $a->judul_about ?></h5>
                <p><?= $a->deskripsi_about ?></p>
            </div>
        <?php } ?>


    </div>

    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-12">
            <h5>Jenis Paket</h5>


            <table class="table table-bordered">
                <thead>
                    <tr class="th-warna">
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($paket as $p) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->nama_paket ?></td>
                            <td><?= "Rp. " . number_format($p->harga_paket, 0, '.', '.')  ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>