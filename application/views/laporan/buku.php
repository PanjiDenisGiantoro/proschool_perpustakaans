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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content animated ">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class=" col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header col-md-12">
              </div>
              <!-- /.card-header -->
              <!-- TABLE: LATEST ORDERS -->

                <div class="card" id="cetak">
                  <div class="card-header border-transparent text-right">
                        <a class="btn bg-navy btn-sm" href="<?php echo base_url(); ?>laporan/buku_excel" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0 table-hover table-sm">
                        <thead>
                          <tr class="bg-navy text-sm">
                             <th>No</th>
                              <th>Kode Buku</th>
                              <th>Judul Buku</th>
                              <th>Pengarang</th>
                              <th>Tahun Terbit</th>
                              <th>Penerbit</th>
                              <th>Total Halaman</th>
                              <th>Tinggi Buku</th>
                              <th>DDC</th>
                              <th>ISBN</th>
                              <th>Jumlah Buku</th>
                              <th>Tanggal Masuk</th>
                              <th>No Inventaris</th>
                              <th>Lokasi Penyimpanan</th>
                              <th>Sumber Buku</th>
                              <th>Kategori Buku</th>
                              <th>Deskripsi</th>
<!--                             <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Lokasi Penyimpanan</th>
                            <th>Total Halaman</th>
                            <th>Jumlah Buku</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                                $no = 1;
                                foreach ($buku->result_array() as $data) { ?>
                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $data['kode_buku']; ?></td>
                                  <td><?php echo $data['judul_buku']; ?></td>
                                  <td><?php echo $data['pengarang']; ?></td>
                                  <td><?php echo $data['tahun_terbit']; ?></td>
                                  <td><?php echo $data['tempat_terbit']; ?></td>
                                  <td><?php echo $data['total_halaman']; ?></td>
                                  <td><?php echo $data['tinggi_buku']; ?></td>
                                  <td><?php echo $data['ddc']; ?></td>
                                  <td><?php echo $data['isbn']; ?></td>
                                  <td><?php echo $data['jumlah_buku']; ?></td>
                                  <td><?php echo $data['tanggal_masuk']; ?></td>
                                  <td><?php echo $data['no_inventaris']; ?></td>
                                  <td><?php echo $data['lokasi']; ?></td>
                                  <td><?php echo $data['nama_sumber']; ?></td>
                                  <td><?php echo $data['nama_kategori']; ?></td>
                                  <td><?php echo $data['deskripsi_buku']; ?></td>
                                    <!-- <td><?php echo $no; ?></td>
                                    <td><?php echo $data['kode_buku']; ?></td>
                                    <td><?php echo $data['judul_buku']; ?></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['lokasi']; ?></td>
                                    <td><?php echo $data['total_halaman']; ?></td>
                                    <td><?php echo $data['jumlah_buku']; ?></td> -->
                                   
                                </tr>
                                <?php $no++;
                                } ?>
                        </tbody>
                      </table>
                    </div>
                    
                    <!-- /.table-responsive -->
                  </div>
                  
                  <!-- /.card-body -->
                  <!-- /.card-footer -->
                </div>
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