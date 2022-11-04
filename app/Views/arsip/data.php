<?= $this->extend('arsip/layouts/app'); ?>

<?= $this->section('content'); ?>

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">Data Surat</h2>
              <p class="card-text">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br>
                Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                      <thead>
                          <tr>
                            <th></th>
                            <th scope="col">No.</th>
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
                                        $no = 1;
                                        foreach($arsip as $a): ?>
                          <tr?>
                            <td>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                              </div>
                            </td>
                                <td><?= $no++ ?></td>
                                <td><?= $a->nomor_surat ?></td>
                                <td><?= $a->nama_kategori ?></td>
                                <td><?= $a->judul_surat ?></td>
                                <td><?= $a->waktu_arsip ?></td>
                                <td class="d-flex justify-content-center mb-2">
                                    <a href="#"
                                        data-href="<?= base_url('dashboard/hero/'.$a->nomor_surat.'/delete') ?>"
                                        onclick="confirmToDelete(this)"
                                        class="btn mb-2 btn-outline-danger">Delete</a>
                                    <a href="#"
                                        data-href="<?= base_url('dashboard/hero/'.$a->nomor_surat.'/delete') ?>"
                                        onclick="confirmToDelete(this)"
                                        class="btn mb-2 btn-outline-warning">Unduh</a>
                                    <a href="#"
                                        data-href="<?= base_url('dashboard/hero/'.$a->nomor_surat.'/delete') ?>"
                                        onclick="confirmToDelete(this)"
                                        class="btn mb-2 btn-outline-primary">Lihat>></a>
                                </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <?php else : ?>
                    <?php endif; ?>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
   
      <?= $this->endSection() ?>

      <?= $this->section('js') ?>
    </div> <!-- .wrapper -->
    <script src="<?= base_url('assets') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/moment.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/simplebar.min.js"></script>
    <script src='<?= base_url('assets') ?>/js/daterangepicker.js'></script>
    <script src='<?= base_url('assets') ?>/js/jquery.stickOnScroll.js'></script>
    <script src="<?= base_url('assets') ?>/js/tinycolor-min.js"></script>
    <script src="<?= base_url('assets') ?>/js/config.js"></script>
    <script src='<?= base_url('assets') ?>/js/jquery.dataTables.min.js'></script>
    <script src='<?= base_url('assets') ?>/js/dataTables.bootstrap4.min.js'></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#user-table').DataTable1({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('user/ajaxList') ?>",
                    "type": "POST"
                },
                "columnDefs": [{
                    "targets": [],
                    "orderable": false,
                }, ],
            });
        });
    </script>
    <script src="<?= base_url('assets') ?>/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
<?= $this->endSection() ?>