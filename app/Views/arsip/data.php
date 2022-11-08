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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Arsip Surat</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat</h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->include('layouts/components/validation_checker'); ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Judul Surat</th>
                                    <th scope="col">Waktu Pengarsipan</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if ($arsip) :
                                        $no = 1;
                                        foreach($arsip as $a): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $a->nomor_surat ?></td>
                                                <td><?= $a->nama_kategori ?></td>
                                                <td><?= $a->judul_surat ?></td>
                                                <td><?= $a->waktu_arsip ?></td>
                                                <td class="d-flex justify-content-center">
                                                <a href="#"
                                                    data-href="<?= base_url('arsip/'.$a->nomor_surat.'/delete') ?>"
                                                    onclick="confirmToDelete(this)"
                                                    class="btn mb-2 btn-outline-danger">Delete</a>
                                                <a href="<?= base_url('arsip/download/'.$a->id_surat) ?>"
                                                    class="btn mb-2 btn-outline-warning mr-1">Unduh</a>
                                                <a href="#"
                                                    data-href="<?= base_url('dashboard/hero/'.$a->nomor_surat.'/delete') ?>"
                                                    onclick="confirmToDelete(this)"
                                                    class="btn mb-2 btn-outline-primary">Lihat>></a>                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                <?php else : ?>
                                <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-left">
                                <a href="<?= base_url('/arsip/new'); ?>" class="btn btn-sm btn-primary"><i
                                        class="fas fa-plus"></i> Arsipkan Surat</a>
                            </div>
                        </div>
                        
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="h2">Are you sure?</h2>
                <p>The data will be deleted and lost forever</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $this->endSection(); ?>

<?= $this->section('js') ?>
<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }

    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection() ?>