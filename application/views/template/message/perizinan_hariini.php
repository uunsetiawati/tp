<?php if ($perizinan->num_rows() != null) { ?>
	<div class="alert alert-secondary alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h5><i class="fas fa-list"></i> Perizinan Hari Ini</h5>
		<?php
		$no = 1;
		foreach ($perizinan->result() as $key => $data) {;
		?>
			<a href="https://wa.me/+62<?= $data->hp ?>"><?= $data->nama ?></a> - <?= $data->asal ?> - <?= $data->teknis ?><br>
		<?php } ?>
	</div>
<?php } ?>
