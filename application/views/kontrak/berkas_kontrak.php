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
     										<!-- <th>Tanggal Upload</th> -->

     									</tr>
     								</thead>


     								<tbody>
     									<tr>
     										<td>1</td>
     										<td>Dokumen kontrak PDF</td>

     										<td><?php if(isset($berkas['file1']) && !empty($berkas['file1'])) : ?>
     											<a href="<?= base_url('assets/upload/berkas/1/'. $berkas['file1']) ?>"
     												target="_blank" rel="noopener noreferrer">Download
     												Dokumen</a>
     											<?php else : ?>
     											File belum diupload
     											<?php endif; ?>
     										</td>
     										<!-- <td><?= $berkas['created_at'] ?></td> -->

     									</tr>
     									<tr>
     										<td>2</td>
     										<td>Dokumen MSDS</td>
     										<td><?php if(isset($berkas['file2']) && !empty($berkas['file2'])) : ?>
     											<a href="<?= base_url('assets/upload/berkas/2/'. $berkas['file2']) ?>"
     												target="_blank" rel="noopener noreferrer">Download
     												Dokumen</a>
     											<?php else : ?>
     											File belum diupload
     											<?php endif; ?>
     										</td>
     										<!-- <td><?= $berkas['created_at'] ?></td> -->

     									</tr>
     									<tr>
     										<td>3</td>
     										<td>COO/COM(untuk material import)</td>
     										<td><?php if(isset($berkas['file3']) && !empty($berkas['file3'])) : ?>
     											<a href="<?= base_url('assets/upload/berkas/3/'. $berkas['file3']) ?>"
     												target="_blank" rel="noopener noreferrer">Download
     												Dokumen</a>
     											<?php else : ?>
     											File belum diupload
     											<?php endif; ?></td>
     										<!-- <td><?= $berkas['created_at'] ?></td> -->

     									</tr>
     									<tr>
     										<td>4</td>
     										<td>Surat keterangan asal usul barang dan surat keterangan barang
     											asli</td>
     										<td><?php if(isset($berkas['file4']) && !empty($berkas['file4'])) : ?>
     											<a href="<?= base_url('assets/upload/berkas/4/'. $berkas['file4']) ?>"
     												target="_blank" rel="noopener noreferrer">Download
     												Dokumen</a>
     											<?php else : ?>
     											File belum diupload
     											<?php endif; ?></td>
     										<!-- <td><?= $berkas['created_at'] ?></td> -->

     									</tr>
     									<tr>
     										<td>5</td>
     										<td>Sertifikat masa garansi</td>
     										<td><?php if(isset($berkas['file5']) && !empty($berkas['file5'])) : ?>
     											<a href="<?= base_url('assets/upload/berkas/5/'. $berkas['file5']) ?>"
     												target="_blank" rel="noopener noreferrer">Download
     												Dokumen</a>
     											<?php else : ?>
     											File belum diupload
     											<?php endif; ?></td>
     										<!-- <td><?= $berkas['created_at'] ?></td> -->

     									</tr>
     									<tr>
     										<td>6</td>
     										<td>Copy sertifikat factory test / routine test dari pabrik</td>
     										<td><?php if(isset($berkas['file6']) && !empty($berkas['file6'])) : ?>
     											<a href="<?= base_url('assets/upload/berkas/6/'. $berkas['file6']) ?>"
     												target="_blank" rel="noopener noreferrer">Download
     												Dokumen</a>
     											<?php else : ?>
     											File belum diupload
     											<?php endif; ?></td>
     										<!-- <td><?= $berkas['created_at'] ?></td> -->

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
