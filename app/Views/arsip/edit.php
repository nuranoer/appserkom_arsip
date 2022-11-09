<?= $this->extend('layouts/app'); ?>

<?= $this->section('css') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?= $this->include('layouts/components/title'); ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Arsip Surat >> Edit</h3><br>
                            <p>Unggah Surat yang telah terbit pada form ini untuk diarsipkan<br>
                            Catatan : <br>
                            - Gunakan FIle Berformat PDF</p>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('arsip/update/'.$arsip-> id_surat .'') ?>" method="post">
                            <input type="hidden" name="id_surat" value="<?= $arsip->id_surat ?>" />
                            <div class="card-body">
                                <?= $this->include('layouts/components/validation_checker'); ?>
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="text" name="nomor_surat" value="<?= $arsip->nomor_surat ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <option value="" disabled selected>Silahkan Pilih</option>
                                        <?php foreach($kategori as $k): ?>
                                            <option value="<?= $k->id_kategori ?>" <?= $arsip->id_kategori == $k->id_kategori ? 'selected' : '' ?>><?= $k->nama_kategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul_surat" value="<?= $arsip->judul_surat ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                <label for="formFile" class="form-label">File Surat (PDF)</label>
                                <input class="form-control file_surat" accept=".pdf" name="file_surat" value="<?= $arsip->file_surat ?>" type="file" id="file_surat">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                </div>           
                                

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>