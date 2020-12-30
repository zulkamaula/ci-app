<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Dosen
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $dosen['id']; ?>">
                        <div class="form-group">
                            <label for="nama_dosen">Nama</label>
                            <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" value="<?= $dosen['nama_dosen'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('nama_dosen'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="tlp">tlp</label>
                            <input type="text" class="form-control" name="tlp" id="tlp" value="<?= $dosen['tlp'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('tlp'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $dosen['email'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('email'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $dosen['alamat'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('alamat'); ?>
                            </small>
                        </div>
                        <div class="form-group">

                            <a href="<?= base_url(); ?>dosen" class="btn btn-dark mt-3">
                                Kembali
                            </a>

                            <button type="submit" name=tambah class="btn btn-primary mt-3 float-right">Ubah Data</button>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>