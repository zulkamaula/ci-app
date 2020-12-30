<div class="container">

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3 justify-content-center">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Dosen <strong>berhasil</strong><?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">

        <div class="col-md-5">
            <form action="<?= base_url('dosen'); ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search keyword.." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-5 mt-2">
            <h3 class="text-right mb-3">DAFTAR DOSEN</h3>
        </div>

    </div>

    <div class="row">

        <div class="col-md-10">



            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>E-mail</th>

                        <th>
                            <a href="<?= base_url(); ?>dosen/tambah" class="badge badge-primary float-right">&nbsp;Tambah Data Dosen&nbsp;</a>
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (empty($dosen)) : ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger text-center" role="alert">
                                    Data tidak ditemukan.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($dosen as $d) : ?>
                        <tr>
                            <th>
                                <?= ++$start; ?>
                            </th>
                            <td><?= $d['nama_dosen']; ?></td>
                            <td><?= $d['email']; ?></td>

                            <td>
                                <a href="<?= base_url(); ?>dosen/hapus/<?= $d['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin ingin hapus?')">hapus</a>

                                <a href="" class="badge badge-success float-right">ubah</a>

                                <a href="<?= base_url(); ?>dosen/detail/<?= $d['id']; ?>" class="badge badge-warning float-right">detail</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h6 class="text-right">
                Result : <?= $total_rows; ?>
            </h6>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>
</div>