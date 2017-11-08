<script type="text/javascript">
	function cekform()
	{
		if(!$("#namasuplier").val())
		{
			alert('Nama Supplier Tidak Boleh Kosong');
			$("#namasuplier").focus()
			return false;
		}

		if(!$("#namaperusahaan").val())
		{
			alert('Nama Perusahaan Tidak Boleh Kosong');
			$("#namaperusahaan").focus()
			return false;
		}

		if(!$("#alamat").val())
		{
			alert('Alamat Tidak Boleh Kosong');
			$("#alamat").focus()
			return false;
		}

		if(!$("#notelp").val())
		{
			alert('No Telepon Tidak Boleh Kosong');
			$("#notelp").focus()
			return false;
		}
	}
</script>

<?php
$info = $this->session->flashdata('info');
if(!empty($info))
{
	echo $info;
}
?>

<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>index.php/suplier/simpan" onsubmit="return cekform();">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ID Supplier</label>
		<div class="col-sm-9">
			<input type="text" name="idsuplier" id="idsuplier" class="col-xs-10 col-sm-5" value="<?php echo $idsuplier; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Supplier</label>
		<div class="col-sm-9">
			<input type="text" name="namasuplier" id="namasuplier" placeholder="Nama Supplier" class="col-xs-10 col-sm-5" value="<?php echo $namasuplier; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Perusahaan</label>
		<div class="col-sm-9">
			<input type="text" name="namaperusahaan" id="namaperusahaan" placeholder="Nama Perusahaan" class="col-xs-10 col-sm-5" value="<?php echo $namaperusahaan; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat</label>
		<div class="col-sm-9">
			<input type="text" name="alamat" id="alamat" placeholder="Alamat" class="col-xs-10 col-sm-5" value="<?php echo $alamat; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">No.Telepon</label>
		<div class="col-sm-9">
			<input type="text" name="notelp" id="notelp" placeholder="No.Telepon" class="col-xs-10 col-sm-5" value="<?php echo $notelp; ?>" >
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			Simpan
			</button>

		    &nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
			<i class="ace-icon fa fa-undo bigger-110"></i>
			Reset
			</button>

			&nbsp; &nbsp; &nbsp;
			<a href="<?php echo base_url();?>index.php/suplier" class="btn btn-primary btn-small">Tutup</a>
		</div>
	</div>
</form>