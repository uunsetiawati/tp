<div class="card-body">
	<a href="<?= base_url("shopee"); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>
</div>
<?= form_open_multipart('') ?>
<div class="card-body">
	<input type="hidden" name="pembuat" value="Shopee">
	<div class="form-group">
		<label>Acara</label>
		<div class="input-group mb-3">
			<div class="input-group-append">
				<div class="input-group-text">
					<span class="fas fa-book-open"></span>
				</div>
			</div>
			<select name="acara" class="form-control" required>
				<option value="<?= set_value('acara'); ?>">Pilihan :</option>
				<option value="Pelatihan">Pelatihan</option>
				<option value="Webinar">Webinar</option>
				<option value="Event">Event</option>
				<option value="Rapat">Rapat</option>
			</select>
		</div>
		<?php echo form_error('acara') ?>
	</div>
	<div class="form-group">
		<label>Tema</label>
		<div class="input-group mb-3">
			<input type="text" class="form-control" name="tema" placeholder="Ex: Pembukuan Sederhana Bagi UMKM" value="<?= set_value('tema'); ?>">
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-calendar"></span>
					</div>
				</div>
				<input type="date" class="form-control" name="tgl" value="<?= set_value('tgl'); ?>" required>
			</div>
			<?php echo form_error('tgl') ?>
		</div>
		<div class="form-group">
			<label>Waktu</label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-book-open"></span>
					</div>
				</div>
				<select class="form-control" name="waktu_mulai" required="">
					<option value="">Waktu Mulai</option>
					<?php
					for ($i = 0; $i <= 23; $i++) {
					?>
						<option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) . ":00"; ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT) . ":00"; ?></option>
					<?php
					}
					?>
				</select>
				<?php echo form_error('waktu_mulai') ?>
				<select class="form-control" name="waktu_selesai" required="">
					<option value="">Waktu Selesai</option>
					<?php
					for ($i = 0; $i <= 23; $i++) {
					?>
						<option value="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) . ":00"; ?>"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT) . ":00"; ?></option>
					<?php
					}
					?>
				</select>
				<?php echo form_error('waktu_selesai') ?>
			</div>
		</div>
		<div class="form-group">
			<label>Tempat</label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-building"></span>
					</div>
				</div>
				<input type="text" class="form-control" name="tempat" placeholder="Ex: R. KA UPT" value="<?= set_value('tempat'); ?>" required>
			</div>
			<?php echo form_error('tempat') ?>
		</div>
		<div class="form-group">
			<label>Peserta</label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-users"></span>
					</div>
				</div>
				<input type="text" class="form-control" name="peserta" placeholder="Koperasi & UKM" value="<?= set_value('peserta'); ?>" required>
			</div>
			<?php echo form_error('peserta') ?>
		</div>
		<div class="form-group">
			<label>Penanggung Jawab</label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
				<input type="text" class="form-control" name="pimpinan" placeholder="Ex: Fitrah Izul Falaq, S.Pd." value="<?= set_value('pimpinan'); ?>" required>
			</div>
			<?php echo form_error('pimpinan') ?>
		</div>
		<!-- <div class="form-group">
              <label>Kode</label> <small>Khusus agenda penting</small>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="katakunci" placeholder="Ex: digitalisasiumkm (digunakan juga redirect ke zoom melalui goupt)" value="<?= set_value('katakunci'); ?>">
            </div>
            <div class="form-group">
              <label>Link Zoom</label> <small>Isikan buat yang penting saja</small>
              <div class="input-group mb-3">
                <input type="link" class="form-control" name="link" placeholder="Link Join Zoom" value="<?= set_value('link'); ?>">
            </div> -->
		<div class="form-group">
			<label>Total Peserta</label>
			<div class="input-group mb-3">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-users"></span>
					</div>
				</div>
				<input type="text" class="form-control" name="total_peserta" placeholder="90" value="" required>
			</div>
			<?php echo form_error('total_peserta') ?>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" required>
				<label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
			</div>
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-success">Tambah</button>
			<button type="reset" class="btn btn-danger">Ulangi</button>
		</div>
		<?= form_close() ?>
	</div>
</div>
