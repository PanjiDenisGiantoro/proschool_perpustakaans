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
              <li class="breadcrumb-item active"><?php echo $judul2; ?></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- /.row -->
        <div class="animated fadeInLeft col-md-12">
            <div class="card card-navy">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>master/sumber_save" method="post">

               <?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" >
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
                  </button>
                  <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                </div>
                <?php } ?>

                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Sumber Buku</label>
                    <div class="col-sm-12">
                        <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                        <input type="hidden" name="id_sumber" value="<?php echo $id_sumber; ?>">
                        <input type="text" class="form-control" name="nama_sumber" value="<?php echo $nama_sumber; ?>" required>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <div class="btn-group btn-group-sm">
                    <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>master/sumber"><i class="fa fa-undo"> </i> Kembali</a>
                  <button type="submit" class="btn bg-navy float-right"><i class="fa fa-save"> </i> Simpan</button>
                  
                </div>
                </div>
                </div>
              </form>
            </div>
        </div>
        <!--<div class="animated fadeInRight col-md-4">-->
        <!--   <div class="callout callout-info">-->
        <!--      <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>-->
        <!--      <ol>-->
        <!--        <li>-->
        <!--            Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.-->
        <!--        </li>-->
        <!--        <li>-->
        <!--            Gunakan <i>button</i>-->
        <!--            <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>-->
        <!--            untuk menambahkan <b><?php echo $judul; ?></b>.-->
        <!--        </li>-->
        <!--      </ol>-->
        <!--        <p>-->
        <!--            Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>-->
        <!--        </p>-->
        <!--  </div>-->
        <!--</div>-->
      </div>

    </div>
    </section>
    <!-- /.content -->
  </div>
