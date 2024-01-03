<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark"><i class="fad fa-books-medical"></i></i> <?php echo $judul; ?></h1>
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
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <form action="<?php echo base_url(); ?>transaksi/proses_cari_kembali" method="post">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;"><b>Cari Siswa</b></td>
                        <td>
                          <div class="input-group">
                            <input type="text" class="form-control" autofocus="" name="s_nisn" placeholder="NIS Siswa" required>
                            <span class="input-group-btn">
                              <button class="btn bg-navy" type="submit">Cari</button>
                            </span>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
              <div class="col-md-12"> 
              <form action="<?php echo base_url(); ?>transaksi/tambah_kembali_buku" method="post">
                <input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>">
                <input type="hidden" name="idsiswa" value="<?php echo $idsiswa; ?>">
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;">NIS</td>
                        <td><input class="form-control s_nisn" name="s_nisn" type="text" value="<?php echo $s_nisn; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Nama Siswa</td>
                        <td><input class="form-control s_nama" name="s_nama" type="text" value="<?php echo $s_nama; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Kelas</td>
                        <td><input class="form-control k_keterangan" name="k_keterangan" type="text" value="<?php echo $k_keterangan; ?>" readonly></td>
                      </tr>
                  </table>
                </div>
              </form>
              </div>
              <div class="col-md-12">
                <br>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="8" style="background:#000;color:#fff;">Daftar Transaksi Pengembalian</th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th>Telat</th>
                      <th>Denda</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($s_nisn)) {
                      $no = 1;
                      $id_peminjaman = "";
                      $now = date("d-m-Y");
                      foreach ($pengembalian_dt as $data) {
                        $id_peminjaman = $data['id_peminjaman'];

                        $your_date = date("d-m-Y", strtotime($data['tanggal_kembali']));
                                    $datediff = date_diff( date_create($now), date_create($your_date) );
                                    $t = date_create($your_date);
                                    $n = date_create(date('d-m-Y'));
                                    $terlambat = date_diff($t, $n);
                                    $hari = $terlambat->format("%a");    
                                    $denda = $hari * 2000;

                        ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['kode_buku']; ?></td>
                      <td><?php echo $data['judul_buku']; ?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tanggal_pinjam'])); ?></td>
                      <td><?php echo date("d-m-Y", strtotime($data['tanggal_kembali'])); ?></td>
                      <td><?php if ($data['telat'] !=null || $your_date < $now) echo Rp. $data['telat'];
                                else if ($your_date < $now) echo $hari ;
                                else echo '0' ; ?> hari</td>
                      <td><?php if ($data['denda'] !=null || $your_date < $now) echo Rp. $data['denda'];
                                else if ($your_date < $now) echo $denda ;
                                else echo Rp. '0' ; ?></td>
                      <td class="text-center">
                      <?php if($data['status_pinjam_dt'] == 2) { ?>
                        Selesai
                      <?php } else { ?>
                      <a class="btn btn-primary btn-xs" href="<?php echo base_url() . 'transaksi/pengembalian_simpan/' . $data['id_peminjaman_dt'] . '/' . $s_nisn.'/'.$hari; ?>" onclick="return confirm('Yakin ingin mengembalikan buku ini ?');"><i class="fa fa-edit"> </i>Pengembalian</a></td>

                      <?php } ?>
                    </tr>
                    <?php $no++;?>
                    <?php   }
                    } ?>
                  </tbody>
                </table>

             
              </div>

            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>
