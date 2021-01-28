<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Fakultas
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama Fakultas</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                            <small class="form-text text-danger">
                                <?= form_error('nama_fakultas'); ?>
                            </small>
                        </div>

                        <!-- <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control" name="npm" id="npm">
                            <small class="form-text text-danger">
                                <?= form_error('npm'); ?>
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
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="DKV">DKV</option>
                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                            </select>
                        </div> -->

                        <button type="submit" name=tambah class="btn btn-primary mt-3 float-right">Tambah Data</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>