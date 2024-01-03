  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="animated fadeInUp col-12">
            <div class="card card-info card-outline">

              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy text-sm">
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Jumlah </th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Telat</th>
                        <th>Denda</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no = 1;
                                $now = strtotime(date("Y-m-d"));
                                foreach ($peminjaman->result_array() as $data) {

                                    $your_date = strtotime($data['tanggal_kembali']);
                                    $datediff = $now - $your_date;
                                    $telat = round($datediff / (60 * 60 * 24));
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['s_nama']; ?></td>
                                        <td><?php echo $data['kode_buku']; ?></td>
                                        <td><?php echo $data['judul_buku']; ?></td>
                                        <td><?php echo $data['jumlah']; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($data['tanggal_pinjam'])); ?></td>
                                        <td><?php
                                            if ($data['status_pinjam_dt'] == 0) {
                                                echo date("d-m-Y", strtotime($data['tanggal_kembali']));
                                            } else {
                                                echo date("d-m-Y", strtotime($data['tanggal_kembali_asli']));
                                            } ?></td>
                                        <td><?php if ($data['status_pinjam_dt'] == 0) echo 'Dipinjam';
                                            else echo 'Kembali'; ?></td>
                                        <td><?php if ($data['telat'] > 0) echo $data['telat'];
                                            else echo '0'; ?> hari</td>
                                        <td><?php echo number_format($data['denda']); ?></td>

                                    </tr>
                                <?php $no++;
                                } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
