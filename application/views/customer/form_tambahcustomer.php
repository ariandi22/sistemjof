<script type="text/javascript">
	function cekform()
	{
		if(!$("#namapemesan").val())
		{
			alert('Nama Pemesan Tidak Boleh Kosong');
			$("#namapemesan").focus()
			return false;
		}

		if(!$("#namaperusahaan").val())
		{
			alert('Nama Perusahaan Tidak Boleh Kosong');
			$("#namaperusahaan").focus()
			return false;
		}

		if(!$("#namaproyek").val())
		{
			alert('Nama Proyek Tidak Boleh Kosong');
			$("#namaproyek").focus()
			return false;
		}

		if(!$("#alamatperusahaan").val())
		{
			alert('Alamat Perusahaan Tidak Boleh Kosong');
			$("#alamatperusahaan").focus()
			return false;
		}

		if(!$("#alamatproyek").val())
		{
			alert('Alamat Proyek Tidak Boleh Kosong');
			$("#alamatproyek").focus()
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

<form class="form-horizontal" role="form" method="POST" action="<?php echo base_url();?>index.php/customer/simpan" onsubmit="return cekform();">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">ID Customer</label>
		<div class="col-sm-9">

			<?php if(empty($idcustomer)) : ?> <!-- jika id customer kosong, berarti ini form tambah -->
			<input type="text" name="idcustomer" id="idcustomer" placeholder="ID Customer" class="col-xs-10 col-sm-5" value="<?php echo $kode; ?>" readonly> <!-- set ke read only-->
			<?php endif; ?>

			<?php if(!empty($idcustomer)): ?> <!-- jika id costumer tidak kosong, berarti ini form edit. -->
			<input type="text" name="idcustomer" id="idcustomer" placeholder="ID Customer" class="col-xs-10 col-sm-5" value="<?php echo $idcustomer; ?>">
			<?php endif; ?>
			
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Pemesan</label>
		<div class="col-sm-9">
			<input type="text" name="namapemesan" id="namapemesan" placeholder="Nama Pemesan" class="col-xs-10 col-sm-5" value="<?php echo $namapemesan; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Perusahaan</label>
		<div class="col-sm-9">
			<input type="text" name="namaperusahaan" id="namaperusahaan" placeholder="Nama Perusahaan" class="col-xs-10 col-sm-5" value="<?php echo $namaperusahaan; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Proyek</label>
		<div class="col-sm-9">
			<input type="text" name="namaproyek" id="namaproyek" placeholder="Nama Proyek" class="col-xs-10 col-sm-5" value="<?php echo $namaproyek; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat Perusahaan</label>
		<div class="col-sm-9">
			<input type="text" name="alamatperusahaan" id="alamatperusahaan" placeholder="Alamat Perusahaan" class="col-xs-10 col-sm-5" value="<?php echo $alamatperusahaan; ?>" >
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat Proyek</label>
		<div class="col-sm-9">
			<input type="text" name="alamatproyek" id="alamatproyek" placeholder="Alamat Proyek" class="col-xs-10 col-sm-5" value="<?php echo $alamatproyek; ?>" >
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
			<a href="<?php echo base_url();?>index.php/customer" class="btn btn-primary btn-small">Tutup</a>
		</div>
	</div>
</form>