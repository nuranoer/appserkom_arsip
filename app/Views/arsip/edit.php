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
                        <form action="<?= base_url('dashboard/dosen/'. $data->id .'/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data->id ?>" />
                            <div class="card-body">
                                <?= $this->include('layouts/components/validation_checker'); ?>
                                <div class="form-group">
                                    <label>NIDN</label>
                                    <input type="text" name="DSNNIDN" value="<?= $data->DSNNIDN ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="DSNNAMA" value="<?= $data->DSNNAMA ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Prodi</label>
                                    <select name="PRODIID" id="PRODIID" class="form-control">
                                        <option value="" disabled selected>Silahkan Pilih</option>
                                        <?php foreach($prodi as $p): ?>
                                            <option value="<?= $p->PRODIID ?>" <?= $data->PRODIID == $p->PRODIID ? 'selected' : '' ?>><?= $p->PRODINAMA ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kota</label>
                                    <input type="text" name="DSNKOTA" value="<?= $data->DSNKOTA ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" name="DSNTGLLHR" value="<?= $data->DSNTGLLHR ?>" class="form-control">
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