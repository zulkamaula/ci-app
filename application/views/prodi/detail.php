<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6 mt-5">

            <div class="card">
                <div class="card-header">
                    Detail Data Prodi

                    <a href="<?= base_url(); ?>prodi/ubah/<?= $prodi['nama_prodi']; ?>" class="badge badge-success float-right">ubah</a>

                    <a href="<?= base_url(); ?>prodi/hapus/<?= $prodi['id_prodi']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>

                </div>
                <div class="card-body">



                    <h5 class="card-title">
                        <?= $prodi['nama_prodi']; ?>
                    </h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        <?= $prodi['id_fakultas']; ?>
                    </h6>
                    <!-- <hr>
                    <p class="card-text">
                        NPM : <?= $prodi['npm']; ?>
                    </p>
                    <p class="card-text">
                        Jurusan :
                        <?= $prodi['jurusan']; ?>
                    </p> -->
                    <a href="<?= base_url(); ?>prodi" class="btn btn-dark float-right">
                        Kembali
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>