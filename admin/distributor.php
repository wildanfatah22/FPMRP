<!-- untuk bagian head -->
<?php include_once ('head.php') ?>

  <body class="nav-md">

    <!-- awal container -->
    <div class="container body">
      <div class="main_container">

        <!-- menu samping -->
        <?php include_once ('header.php'); ?>

        <!-- awal isi halaman -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Distributor</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <!-- button tambah data -->
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="distributor_tmbh.php" class="btn btn-primary">Tambah Distributor</a>
              </div>
            </div>

            <div class="clearfix"></div>

            <?php
            // validasi untuk proses simpan, ubah, hapus data barang masuk
            if (isset($_GET['simpan'])) {

              echo '
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Data Distributor Berhasil Ditambahkan !
              </div>';

            } else if (isset($_GET['ubah'])) {

              echo '
              <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Ubah Data Distributor Berhasil !
              </div>';

            } else if (isset($_GET['hapus'])) {

              echo '
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                Hapus Data Distributor Berhasil !
              </div>';

            }
             ?>

            <!-- untuk bagian tabel dan awal row tabel -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Distributor</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped table-bordered" id="datatables" style="width: 100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Distributor</th>
                              <th>Nama Distributor</th>
                              <th>No. Hp / Telepon</th>
                              <th>Fax</th>
                              <th>Email</th>
                              <th>Website</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>

                          <?php
                          // untuk koneksi
                          include_once ('../db/koneksi.php');

                          $query  = "SELECT * FROM dta_distributor";
                          $result = $mysqli->query($query);

                          $no = 1;
                          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                           ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $row['id_distributor']; ?></td>
                              <td><?php echo $row['nama']; ?></td>
                              <td><?php echo $row['nomor']; ?></td>
                              <td><?php echo $row['fax']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['website']; ?></td>
                              <td><?php echo $row['alamat']; ?></td>
                              <td align="center">
                                <a class="btn btn-success" href="distributor_detail.php?id_distributor=<?php echo $row['id_distributor'] ?>"><i class="fa fa-folder-open"></i> </a>
                                <a class="btn btn-primary" href="distributor_ubah.php?id_distributor=<?php echo $row['id_distributor'] ?>"><i class="fa fa-edit"></i> </a>
                                <a class="btn btn-danger" href="javascript:;" data-id="<?php echo $row['id_distributor'] ?>" data-toggle="modal" data-target="#modal-konfirmasihapusdistributor"><i class="fa fa-trash"></i> </a>
                              </td>
                          </tr>

                          <?php
                          $no++;
                          }
                           ?>

                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
            <!-- akhir row tabel -->

            <!--Modal konfirmasi menggunakan bootstrap 3.3.7-->
            <div class="modal fade" id="modal-konfirmasihapusdistributor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Ingin Menghapus Data Distributor Ini ?
                        </div>
                        <div class="modal-footer">
                          <a href="javascript:;" id="hapus-data-distributor" class="btn btn-danger">Hapus</a>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
        <!-- akhir isi halaman -->

        <!-- footer -->
        <?php include_once ('footer.php'); ?>

      </div>
    </div>
    <!-- akhir container -->

  <!-- untuk bagian foot -->
  <?php include_once ('foot.php'); ?>

  <!-- koding hapus -->
  <script type="text/javascript">
    $(document).ready(function () {

      $('#modal-konfirmasihapusdistributor').on('show.bs.modal',
      function (event)
      {
        var div   = $(event.relatedTarget)
        var id    = div.data('id')
        var modal = $(this);
        modal.find('#hapus-data-distributor').attr("href","distributor_hapus.php?id_distributor="+id);
      })

    });
  </script>
