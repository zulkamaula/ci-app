<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-6 mt-5">

            <div class="card ">
                <div class="card-header">
                    Detail Data Dosen
                </div>
                <div class="card-body">

                    <h5 class="card-title">
                        <?= $dosen['nama_dosen']; ?>
                    </h5>

                    <h6 class="card-subtitle mb-2 text-muted">
                        E-mail : <?= $dosen['email']; ?>
                        <!-- <?= $dosen['tlp']; ?> -->
                    </h6>
                    <hr>
                    <p class="card-text">
                        No. Telepon : <?= $dosen['tlp']; ?>
                    </p>
                    <p class="card-text">
                        Alamat :
                        <?= $dosen['alamat']; ?>
                    </p>
                    <a href="<?= base_url(); ?>dosen" class="btn btn-dark float-right">
                        Kembali
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>