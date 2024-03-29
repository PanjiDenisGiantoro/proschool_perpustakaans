  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-th"></i></i> <?php echo $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item text-navy"><a href="#"><i class="fas fa-home-lg-alt text-navy"></i> Home</a></li>
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
          <div class="animated col-12">
            <div class="card card-navy card-outline">
              <div class="card-header">
              	<div class="btn-group btn-group-sm">
               <a class="btn bg-navy btn-sm" href="<?php echo base_url(); ?>master/buku_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
               &nbsp; &nbsp; <a class="btn bg-navy btn-sm" href="" data-toggle="modal" data-target="#modalImport"><i class="fas fa-file-excel"> </i> Import Excel</a>
               &nbsp; &nbsp; <a class="btn bg-navy btn-sm" href="<?php echo base_url(); ?>master/buku_export" target="_blank"><i class="fa fa-download"> </i> Download Data Buku</a>
           </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped table-sm">
                  <thead>
                    <tr class="text-info bg-navy text-center">
                       	<th>No</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Lokasi Penyimpanan</th>
                        <th>Jumlah</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($buku->result_array() as $data) {
                                    $stok = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as hitung FROM peminjaman_buku_dt WHERE id_buku = '$data[id_buku]' AND status_pinjam_dt = '0'")->row();
                                    ?>
                                <tr class="text-sm">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['kode_buku']; ?></td>
                                    <td><?php echo $data['judul_buku']; ?></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['lokasi']; ?></td>
                                    <td><?php echo $data['jumlah_buku']; ?></td>
                                    <td><?php echo $data['jumlah_buku'] - $stok->hitung; ?></td>
                                    <td style="text-align:center; ">
                                    	<div class="btn-group btn-group-xs">
                                        <a class="btn bg-navy btn-xs detail-buku" href="#" data-toggle="modal" data-target="#modalView" data-id_buku="<?php echo $data['id_buku']; ?>"><i class="fa fa-eye"> </i></a>
                                        &nbsp; <a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'master/buku_edit/' . $data['id_buku']; ?>"><i class="fa fa-edit"> </i></a>
											&nbsp;<a class="btn bg-navy btn-xs" href="<?php echo base_url() . 'master/buku_hapus/' . $data['id_buku']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash"> </i></a>
										</div>
                                    </div>
                                    </td>
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

 <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title text-info"><i class="far fa-upload"></i></i> Import Data Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="<?php echo base_url(); ?>master/buku_import" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <table class="table-form">
                  <tbody>
                    <tr>
                      <td class="tblabel">Pilih File :&nbsp;<i class="fas fa-file-excel fa-2x text-success"> </i></i> </th>
                      <td><input class="form-control" name="file_import" type="file" required /></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <p style="margin:0;">- Ukuran Maks <b>5MB</b> dan Format File <b><i class="fas fa-file-excel fa-2x text-success"> </i></i>.xlsx</b>.</p>
                <p style="margin:0;">- Format Data Perpustakaan dapat di unduh <a href="<?php echo base_url(); ?>upload/format/buku_import.xlsx" target="_blank"> <i class="fal fa-download"></i> DISINI</a></a>
              </div>
              <div class="modal-footer">
              <button class="btn btn-info"><i class="far fa-upload"></i> Import Data</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy">
              <h4 class="modal-title"><i class="nav-icon fad fa-books-medical text-white"></i> Detail Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="tempat_buku"></div>
            </div>
          </div>
    </div>
</div>


<script>
    $(".detail-buku").click(function() {
        var id_buku = $(this).attr("data-id_buku");
        $.get("<?php echo base_url(); ?>master/ajax_detail_buku", {
            id_buku: id_buku
        }, function(data) {
            $(".tempat_buku").html(data);
        });
    });
</script>
