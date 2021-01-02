<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6 mt-5">

            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa

                    <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mahasiswa['id']; ?>" class="badge badge-success float-right">ubah</a>

                    <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mahasiswa['id']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>

                </div>
                <div class="card-body">



                    <h5 class="card-title">
                        <?= $mahasiswa['nama']; ?>
                    </h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        <?= $mahasiswa['email']; ?>
                    </h6>
                    <hr>
                    <p class="card-text">
                        NPM : <?= $mahasiswa['npm']; ?>
                    </p>
                    <p class="card-text">
                        Jurusan :
                        <?= $mahasiswa['jurusan']; ?>
                    </p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-dark float-right">
                        Kembali
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>