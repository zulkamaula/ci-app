<div class="container">

    <!-- SweetAlert2 -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
    </div>

    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-1 justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data mahasiswa <strong>berhasil</strong><?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->

    <?php endif; ?>

    <div class="row mt-1 mb-2 justify-content-center">
        <div class="col-lg-8">
            <h3 class="text-center"> Fakultas </h3>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-3 mt-2">
            <a href="<?= base_url(); ?>fakultas/tambah" class="btn btn-primary">Tambah Data Fakultas</a>
        </div>

        <div class="col-lg-5 mt-2">
            <form action="<?= base_url('fakultas'); ?>" method="post">

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa.." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <hr>
            <?php if (empty($fakultas)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data fakultas tidak ditemukan.
                </div>
            <?php endif; ?>

            <ul class="list-group mb-3">

                <?php foreach ($fakultas as $f) : ?>
                    <li class="list-group-item">
                        <?= $f['nama_fakultas']; ?>

                        <!-- <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $f['id']; ?>" class="badge badge-danger float-right" onclick=" return confirm('yakin ingin hapus data?');">hapus</a> -->

                        <!-- <a href="<?= base_url(); ?>mahasiswa/detail/<?= $f['id']; ?>" class="badge badge-success float-right">ubah</a> -->

                        <a href="<?= base_url(); ?>fakultas/detail/<?= $f['id_fakultas']; ?>" class="badge badge-primary float-right">detail</a>

                    </li>
                <?php endforeach; ?>
            </ul>
            <?= $this->pagination->create_links(); ?>
            <h6 class="text-right">Result : <?= $total_rows; ?></h6>
        </div>
    </div>
</div>