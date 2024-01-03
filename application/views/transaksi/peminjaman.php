<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

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
              <div class="col-md-7">
                <form action="<?php echo base_url(); ?>transaksi/proses_cari_pinjam" method="post">
                  <table class="table table-bordered table-hover table-striped table-sm">
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
				<div class="col-md-5">
					<button type="button" class="btn btn-info mt-2" data-toggle="modal" data-target="#modal-list-siswa">
						<i class="fas fa-list"></i> List Siswa
					</button>
					<!-- /.modal list siswa -->
					<div class="modal fade" id="modal-list-siswa">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">List Siswa</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<table class="table table-bordered table-hover table-striped table-sm" id="tables">
										<thead>
											<tr>
												<th>NIS</th>
												<th>Nama</th>
												<th>Kelas</th>
											</tr>

										</thead>
										<tbody>
										<?php
										$list = $this->db->query("SELECT * FROM sr_siswa JOIN sr_kelas ON sr_siswa.idkelas = sr_kelas.idkelas")->result();
										foreach($list as $key => $value) {
										?>
										<tr>
											<td><?= $value->s_nisn ?></td>
											<td><?= $value->s_nama ?></td>
											<td><?= $value->k_romawi ?></td>
										</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
              <div class="col-md-12">
                <form role="form" action="<?php echo base_url(); ?>transaksi/tambah_pinjam_buku" method="post">
                <input type="hidden" name="id_kelas" value="<?php echo $idkelas; ?>">
                <input type="hidden" name="id_siswa" value="<?php echo $idsiswa; ?>">
                <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered table-hover table-striped table-sm">
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
                <div class="col-md-12">
                  <table class="table table-bordered table-hover table-striped table-sm">
                    <tbody>
                      <tr>
                        <td style="width:150px;">Kode Buku</td>
                        <td>
                        <input class="form-control id_buku_real" name="id_buku_real" type="hidden" required>
<!--                          <input class="form-control id_buku" name="id_buku" type="text" placeholder="Silahkan Input Kode Buku" required>-->
							<select name="id_buku" id="id_buku" class="form-control select2">
								<option value="0">Pilih Buku</option>
								<?php
								$list = $this->db->query("SELECT * FROM mst_buku")->result();
								foreach($list as $key => $value) {
								?>
								<option value="<?php echo $value->id_buku; ?>"><?php echo $value->kode_buku.' - ' .$value->judul_buku.' - '.$value->pengarang; ?></option>
								<?php } ?>
							</select>

                        </td>

                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Judul Buku</td>
                        <td><input class="form-control judul_buku" name="judul_buku" type="text" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Stok</td>
                        <td><input class="form-control stok" name="stok" type="number" min="0"  readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Tanggungan</td>
                        <td><input class="form-control tanggungan" name="tanggungan" type="text" value="<?php echo $tanggungan; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Jumlah Pinjam</td>
                        <td><input class="form-control jumlah" name="jumlah" type="number" min="0" required value="1"></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Durasi Pinjam (hari)</td>
                        <td><input class="form-control durasi" name="durasi" type="number" min="0"  placeholder="Silahkan Input Durasi Pinjam" required></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php if (!empty($s_nisn)) { ?>
                  <div class="col-md-12 text-center">
                    <button class="btn bg-navy" name="tambah"><i class="fa fa-plus"> </i> Tambah Peminjaman Buku</button>
                  </div>
                <?php } ?>
              </form>
              </div>

              <div class="col-md-12">
                <br>
                <table class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr>
                      <th colspan="7" class="bg-navy">Daftar Transaksi Peminjaman</th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Jumlah Pinjam</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if (!empty($s_nisn)) {
                      $no = 1;
                      $id_peminjaman = "";
                      foreach ($peminjaman_dt as $data) {
                      $id_peminjaman = $data['id_peminjaman'];
                    ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['kode_buku']; ?></td>
                          <td><?php echo $data['judul_buku']; ?></td>
                          <td><?php echo $data['jumlah']; ?></td>
                          <td><?php echo date("d-m-Y", strtotime($data['tanggal_pinjam'])); ?></td>
                          <td><?php echo date("d-m-Y", strtotime($data['tanggal_kembali'])); ?></td>
                          <td class="text-center">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'transaksi/peminjaman_hapus/' . $data['id_peminjaman_dt'] . '/' . $s_nisn; ?>" onclick="return confirm('Yakin ingin hapus data ?');"><i class="fa fa-trash"> </i></a>

                          </td>
                        </tr>
                        <?php $no++;?>
                    <?php   }
                                                                                                        } ?>
                  </tbody>
                </table>

                <?php
                  if (!empty($nis)) {
                  $hitung = count($peminjaman_dt->result_array());
                  if ($hitung > 0) { ?>
                    <div class="text-center"> <a class="btn btn-primary btn-lg" href="<?php echo base_url() . 'transaksi/peminjaman_simpan/' . $id_peminjaman; ?>" onclick="return confirm('Yakin ingin simpan data ?');"> <i class="fa fa-save"> </i> Simpan Transaksi</a> </div>
                <?php }
                                                                                                        } ?>
              </div>

            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
  $("#id_buku").on('change',function (){

    var id_buku = $("#id_buku").val();
    $.getJSON("<?php echo base_url(); ?>transaksi/ajax_combo_buku", {
      id_buku: id_buku
    }, function(data) {
      $(".judul_buku").val(data[0].judul_buku);
      $(".stok").val(data[0].jumlah_buku);
           $(".id_buku_real").val(data[0].id_buku);
    });
  });
  $(document).ready(function() {
	  $('#tables').DataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": true
	  });
  });
</script>
