     <link href="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css"
     	rel="stylesheet" />
     <link href="<?= base_url(); ?>assets/AdminBsb/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
     	rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>
     <?php if ($this->session->flashdata('message')) : ?>
     <script type="text/javascript">
     	swal({
     		title: "BERHASIL !!!",
     		text: "<?php echo $this->session->flashdata('message'); ?>",
     		showConfirmButton: true,
     		type: 'success'
     	});

     </script>
     <?php endif; ?>
     <?php if ($this->session->flashdata('abort')) : ?>
     <script type="text/javascript">
     	swal({
     		title: "ERROR !!!",
     		text: "<?php echo $this->session->flashdata('abort'); ?>",
     		showConfirmButton: true,
     		type: 'error'
     	});

     </script>
     <?php endif; ?>
     <section class="content">
     	<div class="container-fluid">
     		<div class="block-header">
     			<h2>Progres Kontrak</h2>
     		</div>


     		<!-- Exportable Table -->
     		<div class="row clearfix">
     			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     				<div class="card">
     					<div class="header">
     						<h2 style="font-weight: bold;color: #ad1455;font-size: 22px;">
     							<center>Kelengkapan Administrasi</center>
     							<br>
     						</h2>
     					</div>
     					<div class="body">
     						<div class="table-responsive">
     							<table
     								class="table table-bordered table-striped table-hover js-basic-example dataTable">

     								<thead>
     									<tr>
     										<th style="width:30px">No</th>
     										<!-- <th>Kontrak</th> -->
     										<th>Nama File</th>
     										<th>File</th>
     										<th>Tanggal Upload</th>

     									</tr>
     								</thead>


     								<tbody>
     									<tr>
     										<td>1</td>
     										<td>Dokumen kontrak PDF</td>
     										<td>File Belum ada</td>
     										<td>Tanggal</td>
     									</tr>
     									<tr>
     										<td>2</td>
     										<td>Dokumen MSDS</td>
     										<td><a href="#">Download File</a></td>
     										<td>Tanggal</td>
     									</tr>
     									<tr>
     										<td>3</td>
     										<td>COO/COM(untuk material import)</td>
     										<td>File Belum ada</td>
     										<td>Tanggal</td>
     									</tr>
     									<tr>
     										<td>4</td>
     										<td>Surat keterangan asal usul barang dan surat keterangan barang
     											asli</td>
     										<td>File Belum ada</td>
     										<td>Tanggal</td>
     									</tr>
     									<tr>
     										<td>5</td>
     										<td>Sertifikat masa garansi</td>
     										<td>File Belum ada</td>
     										<td>Tanggal</td>
     									</tr>
     									<tr>
     										<td>6</td>
     										<td>Copy sertifikat factory test / routine test dari pabrik</td>
     										<td>File Belum ada</td>
     										<td>Tanggal</td>
     									</tr>

     								</tbody>
     							</table>
     						</div>
     					</div>
     				</div>
     			</div>
     		</div>

     	</div>
     </section>
