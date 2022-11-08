<?= $this->extend('layouts/app'); ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Arsip Surat >> Lihat</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td><?= $filepdf->nomor_surat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Judul Surat</th>
                                        <td><?= $filepdf->judul_surat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?= $filepdf->nama_kategori ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Pengarsipan</th>
                                        <td><?= $filepdf->waktu_arsip ?></td>
                                    </tr>
                                    
                                </table>
                                


                            </div>
                            <iframe src="<?= base_url('uploads/'.$filepdf->file_surat) ?>" height="500" width="100%" title="Iframe Example"></iframe>
                    </div>
                </div>
                <a href="<?= base_url('/') ?>"
                    class="btn mb-2 btn-outline-warning mr-1">Kembali</a>
                <a href="<?= base_url('arsip/download/'.$filepdf->id_surat) ?>"
                    class="btn mb-2 btn-outline-primary mr-1">Unduh</a>
                <a href="<?= base_url('arsip/lihat/'.$filepdf->id_surat) ?>"
                    class="btn mb-2 btn-outline-primary mr-1">Edit/ganti file</a>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
