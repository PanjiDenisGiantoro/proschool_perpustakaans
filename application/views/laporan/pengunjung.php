   <?php
 $sekolah = $this->db->query("SELECT * FROM mst_sekolah WHERE id = 1")->row();
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px white;"><i class="fad fa-books-medical"></i></i> <?php echo $judul; ?></h1>
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
    <section class="content animated ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
            <div class="card card-navy card-outline">
              <div class="card-header col-md-12">

                <a><i class="fa fa-file-search text-navy"> </i> Cari Data Pengunjung Berdasarkan</a>
                <form role="form" action="<?php echo base_url(); ?>laporan/proses_tampil_pengunjung" method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                            <button type="button" class="btn bg-navy"><i class="fal fa-calendar-alt"></i></button>
                          </div>
                          <input class="form-control tglcalendar" type="text" name="tgl_awal" readonly="readonly" placeholder="Dari Tanggal" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>Sampai Tanggal</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend date" data-date="" data-date-format="yyyy-mm-dd">
                          <button type="button" class="btn bg-navy"><i class="fal fa-calendar-alt"></i></button>
                        </div>
                        <input class="form-control tglcalendar" type="text" name="tgl_akhir" readonly="readonly" placeholder="Dari Tanggal"  required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Keperluan</label>
                                        <select class="form-control select2" type="text" name="keperluan">
                                            <option value="all">[ SEMUA KEPERLUAN ]</option>
                                            <option value="Baca Buku">Baca Buku</option>
                                            <option value="Baca dan Pinjam">Baca dan Pinjam</option>
                                            <option value="Pinjam Buku">Pinjam Buku</option>
                                            <option value="Kembali Buku">Kembali Buku</option>
                                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                      <div class="btn-group btn-group-sm">
                        <button class="btn bg-navy btn-sm"><i class="fa fa-search "> </i> Tampilkan Data</button>
                        <button class="btn bg-navy btn-sm" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                        <a class="btn bg-navy btn-sm" href="<?php echo base_url(); ?>laporan/pengunjung_excel/<?php echo date('Y-m-d', strtotime($tgl_awal)); ?>/<?php echo date('Y-m-d', strtotime($tgl_akhir)); ?>" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                      </div>
                      </div>
                    </div> 
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->
              <?php if (!empty($pengunjung)) { ?>
                <div class="card" id="cetak">
                  <div class="card-header border-transparent">
                    <center>
						<h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
							<?php
							$profile = $this->db->query("select * from sr_profile where idprofile = 1")->row();
							?>
							<img class="profile-user-img img-fluid img-circle"

								 src="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/panel/assets/upload/profile/thumbnails/'.$profile->pr_logo?>"
								 alt="User profile picture">
						</h4>
						<div style="display:inline-block;vertical-align:middle;">
							<h1></h1>
							<h1><?php echo $profile->pr_nama; ?></h1>
							<p><?php echo $profile->pr_alamat; ?></p>
							<p><?php echo $profile->pr_email.' | '.$profile->pr_telepon; ?></p>
						</div>
                      <h4 style="margin:0;">Laporan Pengunjung Perpus </h4>
                      <p style="margin:0;">Periode : <?php echo $tgl_awal . ' s/d ' . $tgl_akhir; ?></p>
                    </center>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 table-hover table-sm">
                        <thead>
                          <tr class="text-sm bg-navy">
                            <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal Kunjungan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                                    $no = 1;
                                    $now = strtotime(date("Y-m-d"));
                                    foreach ($pengunjung->result_array() as $data) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                    <td><?php echo $data['nama_kelas']; ?></td>
                                    <td><?php echo $data['keperluan']; ?></td>
                                    <td><?php echo date("d-m-Y H:i:s", strtotime($data['tanggal'])); ?></td>
                                </tr>
                                <?php $no++;
                                    } ?>
                        </tbody>
                      </table>
                    </div>
					  <div class="col-md-10 col-10 text-right mt-5">
						  <p style="margin:0;">Bogor, <?php echo date("d-m-Y"); ?></p>
						  <p style="margin:0;">Mengetahui</p>
						  <br><br><br><br><br>
						  <p style="margin:0;">(Administrator )</p>
					  </div>
					  <div class="col-md-10  col-10  text-right" style="float:left">
						  <p style="margin:0;">&nbsp;</p>
						  <p style="margin:0;">&nbsp;</p>
						  <br><br><br><br>
						  <p style="margin:0;"></p>
						  <!--		<p style="margin:0;">(administrasi)</p>-->
					  </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
              <?php } ?>
              <!-- /.card -->
            </div>
            <!-- /.col -->
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
  <script>
    $(document).ready(function() {
      $('#cari-siswa').typeahead({
        source: function(query, result) {
          $.ajax({
            url: "<?php echo base_url(); ?>pelanggaran_siswa/ajax_siswa",
            data: 'query=' + query,
            dataType: "json",
            type: "POST",
            success: function(data) {
              result($.map(data, function(item) {
                return item;
              }));
            }
          });
        }
      });
    });
  </script>
