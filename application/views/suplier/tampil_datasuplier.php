<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = $('#dynamic-table').DataTable( {
					"aoColumns": [
					  null, null, null, null, null, null,
					  { "bSortable": false }
					] } );
			})	
		</script>
<p>
<a href="<?php echo base_url();?>index.php/suplier/tambah" class="btn btn-primary btn-small">Tambah Supplier</a>
</p>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Id Supplier</th>
			<th>Nama Supplier</th>
			<th>Nama Perusahaan</th>
			<th>Alamat</th>
			<th>No. Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
		$no = 1;
		foreach ($data->result() as $row) {
		?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->id_suplier ;?></td>
			<td><?php echo $row->nama_suplier ;?></td>
			<td><?php echo $row->nama_perusahaan ;?></td>
			<td><?php echo $row->alamat ;?></td>
			<td><?php echo $row->telp ;?></td>
			<td>
				<a href="<?php echo base_url()?>index.php/suplier/edit/<?php echo $row->id_suplier; ?>">edit</a>
				<a href="<?php echo base_url()?>index.php/suplier/delete/<?php echo $row->id_suplier; ?>" onclick="return confirm('Anda Yakin Mau Menghapus Data Ini...?'); ">delete </a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>