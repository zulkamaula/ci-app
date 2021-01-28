<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6 mt-5">

            <div class="card">
                <div class="card-header">
                    Detail Data Fakultas

                    <a href="<?= base_url(); ?>fakultas/ubah/<?= $fakultas['nama_fakultas']; ?>" class="badge badge-success float-right">ubah</a>

                    <a href="<?= base_url(); ?>fakultas/hapus/<?= $fakultas['id_fakultas']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>

                </div>
                <div class="card-body">



                    <h5 class="card-title">
                        <?= $fakultas['nama_fakultas']; ?>
                    </h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        <?= $fakultas['nama_prodi']; ?>
                    </h6>
                    <hr>
                    <!-- <p class="card-text">
                        NPM : <?= $fakultas['npm']; ?>
                    </p>
                    <p class="card-text">
                        Jurusan :
                        <?= $fakultas['jurusan']; ?>
                    </p> -->
                    <a href="<?= base_url(); ?>fakultas" class="btn btn-dark float-right">
                        Kembali
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>