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
              <div class="card-header">
              </div>
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
                        <th>Telat</th>
                        <th>Denda</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
				  $no = 1;
				  $pengembalian = $this->db->query("select * from peminjaman_buku 
    join peminjaman_buku_dt on peminjaman_buku.id_peminjaman = peminjaman_buku_dt.id_peminjaman 
    join sr_siswa on sr_siswa.idsiswa = peminjaman_buku.id_siswa 
    join mst_buku on mst_buku.id_buku = peminjaman_buku_dt.id_buku where tanggal_kembali_asli != '' and       peminjaman_buku_dt.tanggal_kembali_asli > DATE_SUB(now(), INTERVAL 3 MONTH)")->result();
				  foreach ($pengembalian as $p){
				  ?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $p->s_nama; ?></td>
						<td><?php echo $p->kode_buku; ?></td>
						<td><?php echo $p->judul_buku; ?></td>
						<td><?php echo $p->jumlah; ?></td>
						<td><?php echo $p->tanggal_pinjam; ?></td>
						<td><?php echo $p->tanggal_kembali_asli; ?></td>
						<td><?php echo $p->telat; ?> Hari</td>
						<td><?php echo $p->denda; ?></td>
						</tr>
				  <?php } ?>
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
