<?= $this->extend('arsip/layouts/app'); ?>

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
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section id="main-content">
          <section class="wrapper">
            <!-- /.row -->
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <div class="card-header">
                            <h3 class="card-title">Arsip Surat</h3>
                            <a>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.
                                <br> Klik "Lihat" pada kolom aksi untuk menampilkan surat.
                            </a>
                            <div class="float-right">
                                <a href="<?= base_url('/dashboard/dosen/new'); ?>" class="btn btn-sm btn-primary"><i
                                        class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= $this->include('arsip/layouts/components/validation_checker'); ?>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Waktu Pengarsipan</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if ($arsip) :
                                        foreach($arsip as $a): ?>
                                            <tr>
                                                <td><?= $a->nomor_surat ?></td>
                                                <td><?= $a->nama_kategori ?></td>
                                                <td><?= $a->judul_surat ?></td>
                                                <td><?= $a->waktu_arsip ?></td>
                                                <td class="d-flex justify-content-center">
                                                <a href="<?= base_url('dashboard/dosen/'.$a->id.'/edit') ?>"
                                                    class="btn btn-sm btn-outline-warning mr-1">Edit</a>
                                                <a href="#"
                                                    data-href="<?= base_url('dashboard/dosen/'.$a->id.'/delete') ?>"
                                                    onclick="confirmToDelete(this)"
                                                    class="btn btn-sm btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                <?php else : ?>
                                <?php endif; ?>
                                    </tbody>
                                </table>
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