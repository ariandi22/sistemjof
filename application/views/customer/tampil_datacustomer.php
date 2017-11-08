<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = $('#dynamic-table').DataTable( {
					"aoColumns": [
					  null, null, null, null, null, null, null, null,
					  { "bSortable": false }
					] } );
			})	
		</script>
<p>
<a href="<?php echo base_url();?>index.php/customer/tambah" class="btn btn-primary btn-small">Tambah Customer</a>
</p>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Id Customer</th>
			<th>Nama Pemesan</th>
			<th>Nama Perusahaan</th>
			<th>Nama Proyek</th>
			<th>Alamat Perusahaan</th>
			<th>Alamat Proyek</th>
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
			<td><?php echo $row->id_customer ;?></td>
			<td><?php echo $row->nama_pemesan ;?></td>
			<td><?php echo $row->nama_perusahaan ;?></td>
			<td><?php echo $row->nama_proyek ;?></td>
			<td><?php echo $row->alamat_perusahaan ;?></td>
			<td><?php echo $row->alamat_proyek ;?></td>
			<td><?php echo $row->telp ;?></td>
			<td>
				<a href="<?php echo base_url()?>index.php/customer/edit/<?php echo $row->id_customer; ?>">edit</a>
				<a href="<?php echo base_url()?>index.php/customer/delete/<?php echo $row->id_customer; ?>" onclick="return confirm('Anda Yakin Mau Menghapus Data Ini...?'); ">delete </a>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>