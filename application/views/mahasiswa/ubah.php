<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Mahasiswa
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $mahasiswa['nama'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('nama'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control" name="npm" id="npm" value="<?= $mahasiswa['npm'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('npm'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $mahasiswa['email'] ?>">
                            <small class="form-text text-danger">
                                <?= form_error('email'); ?>
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <?php foreach ($jurusan as $j) : ?>
                                    <?php if ($j == $mahasiswa['jurusan']) : ?>
                                        <option value="<?= $j; ?>" selected>
                                            <?= $j; ?>
                                        </option>
                                    <?php else : ?>
                                        <option value="<?= $j; ?>">
                                            <?= $j; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>

                            <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mahasiswa['id']; ?>" class="btn btn-dark mt-3">
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