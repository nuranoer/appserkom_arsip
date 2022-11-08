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
                                <?php
                                    if ($arsip) :
                                        foreach($arsip as $a): ?>
                                            <tr>
                                                <td><?= $a->nomor_surat ?></td>
                                                <td><?= $a->nama_kategori ?></td>
                                                <td><?= $a->judul_surat ?></td>
                                                <td><?= $a->waktu_arsip ?></td>
                                                <td class="d-flex justify-content-center">
                                                
                                            </tr>
                                            <?php endforeach; ?>
                                </table>
                                <?php else : ?>
                                <?php endif; ?>

                            </div>
                    </div>
                </div>
                <a href="<?= base_url('arsip/download/'.$a->id_surat) ?>"
                    class="btn mb-2 btn-outline-warning mr-1">Kembali</a>
                <a href="<?= base_url('arsip/lihat/'.$a->id_surat) ?>"
                    class="btn mb-2 btn-outline-primary mr-1">Unduh</a>
                <a href="<?= base_url('arsip/lihat/'.$a->id_surat) ?>"
                    class="btn mb-2 btn-outline-primary mr-1">Edit/ganti file</a>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
