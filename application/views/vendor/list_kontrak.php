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
     			<h2>MONITORING PELAKSANAAN KONTRAK</h2>
     		</div>

     		<!-- Basic Examples -->
     		<div class="row clearfix">
     			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     				<div class="card">
     					<div class="header">
     						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
     							<center>MONITORING PELAKSANAAN KONTRAK</center>
     						</h2> <br><br>



     					</div>

     					<div class="body">

     						<div class="table-responsive">
     							<table
     								class="table table-bordered table-striped table-hover js-basic-example dataTable">
     								<thead>
     									<tr>
     										<th style="width:30px">No</th>
     										<th>Nomor kontrak</th>
     										<th>Vendor</th>
     										<th>Judul Kontrak</th>
     										<th>Mulai Kontrak</th>
     										<th>Selesai Kontrak</th>
     										<th>Progress</th>
     										<th>Berkas</th>
     										<th>Uraian</th>
     									</tr>
     								</thead>

     								<tbody>

     									<?php $i = 1;
										foreach ($vendors as $kontrak) : ?>
     									<tr>
     										<td><?= $i++; ?></td>
     										<td><?= $kontrak['nomor_kontrak']  ?></td>
     										<td><?= get_nama_vendor_by_id($kontrak['id_vendor'])  ?></td>
     										<td><?= $kontrak['judul_kontrak'] ?></td>
     										<td><?= $kontrak['mulai_kontrak']  ?></td>
     										<td><?= $kontrak['selesai_kontrak'] ?></td>
     										<td><?php 
											 $check = check_rekap($kontrak['id_kontrak']);
											 if($check == 0){
												 echo "0";
											 }else{
												$progress = floor(floor(get_progress($kontrak['id_kontrak']))) / $check;
												echo $progress;
											 }
											 
											   ?>%</td>
     										<td style="text-align: center;vertical-align: middle;">
     											<center>
     												<a href="<?= base_url(); ?>vendor/berkas/<?= $kontrak['id_kontrak']; ?>"
     													data-toggle="tooltip" data-placement="top" title="View"><i
     														style="color: #00b0e4;"
     														class="material-icons">description</i></a>&nbsp;

     											</center>
     										</td>
     										<td style="text-align: center;vertical-align: middle;">
     											<center>
     												<a href="<?= base_url(); ?>vendor/detail/<?= $kontrak['id_kontrak']; ?>"
     													data-toggle="tooltip" data-placement="top" title="View"><i
     														style="color: #32CD32;"
     														class="material-icons">visibility</i></a>&nbsp;

     											</center>
     										</td>
     									</tr>

     									<?php endforeach; ?>
     								</tbody>
     							</table>
     						</div>
     					</div>
     				</div>
     			</div>
     		</div>

     		<!-- #END# Basic Examples -->
     	</div>
     	</div>
     </section>


     <!-- Logout Modal-->
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     	aria-hidden="true">
     	<div class="modal-dialog" role="document">
     		<div class="modal-content">
     			<div class="modal-header">
     				<h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
     				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
     					<span aria-hidden="true">×</span>
     				</button>
     			</div>
     			<div class="modal-body">Apakah anda yakin ingin menghapus kontrak ini ?</div>
     			<div class="modal-footer">
     				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
     				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
     			</div>
     		</div>
     	</div>
     </div>
