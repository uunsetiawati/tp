<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="col-12">
        <div class="card-header">
          <!-- <a href="<?= site_url('link/tambah/') ?>" class="btn btn-success btn-sm"><i class='fas fa-plus'></i> Tambah</a> -->
          <a href="<?= base_url("link"); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
        </div>
        <div class="card">
          <div class="card-header bg-info">
            <h3 class="card-title"><?= $menu ?></h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="25%">Kode</th>
                    <th width="40%">Hits</th>
                    <th width="30%">#</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no= "1";foreach ($row->result() as $key => $data) {; ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><a href="<?= $this->fungsi->pilihan_selected("tb_link",$data->link_id)->row("link")?>"><?= $this->fungsi->pilihan_selected("tb_link",$data->link_id)->row("kode")?></a></td>
                      <td><?= $data->platform ?> | <?= $data->is_mobile == "1" ? "hp" : "desktop" ?> | <?= $data->referrer ?> | <?= $data->ip ?></td>
                      <td><?= $data->created ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <span class="tableTools-container btn btn-sm"></span>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->