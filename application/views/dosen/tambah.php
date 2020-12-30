<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Dosen
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_dosen">Nama</label>
                            <input type="text" class="form-control" name="nama_dosen" id="nama_dosen">
                            <small class="form-text text-danger">
                                <?= form_error('nama_dosen'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="npm">No. Telepon</label>
                            <input type="text" class="form-control" name="tlp" id="tlp">
                            <small class="form-text float-right">
                                (Nomor harus diisi 11 digit)
                            </small>
                            <small class="form-text text-danger">
                                <?= form_error('tlp'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email">
                            <small class="form-text text-danger">
                                <?= form_error('email'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                            <small class="form-text text-danger">
                                <?= form_error('alamat'); ?>
                            </small>

                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary mt-3 float-right">Tambah Data</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>