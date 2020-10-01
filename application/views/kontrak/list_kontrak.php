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
     			<h2>REKAP PELAKSANAAN KONTRAK</h2>
     		</div>

     		<!-- Basic Examples -->
     		<div class="row clearfix">
     			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     				<div class="card">
     					<div class="header">
     						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
     							<center>REKAP PELAKSANAAN KONTRAK</center>
     						</h2> <br><br>
     						<!-- <a href="<?= base_url(); ?>kontrak/add">
    							<button type="button" class="btn btn-info waves-effect">
    								<i class="material-icons">add</i>
    								<span>TAMBAH</span>
    							</button>
    						</a> -->

     						<button class="btn btn-info waves-effect" type="button" data-toggle="modal"
     							data-target="#myModal">
     							<i class="material-icons">add</i>
     							<span>TAMBAH</span>
     						</button>
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
     										<th style="text-align: center;width:100px">ACTION</th>
     									</tr>
     								</thead>

     								<tbody>

     									<?php $i = 1;
										foreach ($kontraks as $kontrak) : ?>
     									<tr>
     										<td><?= $i++; ?></td>
     										<td><?= $kontrak['nomor_kontrak']  ?></td>
     										<td><?= get_nama_vendor_by_id($kontrak['id_vendor'])  ?></td>
     										<td><?= $kontrak['judul_kontrak'] ?></td>
     										<td><?= $kontrak['mulai_kontrak']  ?></td>
     										<td><?= $kontrak['selesai_kontrak'] ?></td>
     										<td>100%</td>
     										<td> <a href="#" type="button" data-toggle="modal"
     												data-target="#ModalView<?= $kontrak['id_kontrak']?>"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
     										<td style="text-align: center;vertical-align: middle;">
     											<center>
     												<a href="<?= base_url(); ?>rekap/detail/<?= $kontrak['id_kontrak']; ?>"
     													data-toggle="tooltip" data-placement="top" title="View"><i
     														style="color: #32CD32;"
     														class="material-icons">visibility</i></a>&nbsp;
     												<a href="#" type="button" data-toggle="modal"
     													data-target="#myModal<?= $kontrak['id_kontrak']?>"
     													data-placement="top" title="Edit"><i style="color:#00b0e4;"
     														class="material-icons">description</i></a>&nbsp;
     												<!-- <a href="#" id="btn_posisi" title="Delete" data-id="<?= $kontrak['id_kontrak'] ?>" data-toggle="modal" data-target="#deleteModal"><i style="color:red;" class="material-icons">delete</i></a> -->
     											</center>
     										</td>
     									</tr>

     									<!-- The Modal -->
     									<div class="modal fade" id="myModal<?= $kontrak['id_kontrak'] ?>">
     										<div class="modal-dialog modal-md">
     											<div class="modal-content">

     												<!-- Modal Header -->
     												<div class="modal-header">
     													<h4 class="modal-title">Form Edit Kontrak</h4>
     													<button type="button" class="close"
     														data-dismiss="modal">&times;</button>
     												</div>

     												<!-- Modal body -->
     												<div class="modal-body">
     													<?php $attributes = array('method' => 'post'); ?>

     													<?php echo form_open('kontrak/edit/'.$kontrak['id_kontrak'],
     													$attributes); ?>

     													<div class="form-group">
     														<label for="satuan">Nomor Kontrak :</label>
     														<div class="form-line">
     															<input type="text"
     																value="<?= $kontrak['nomor_kontrak'] ?>"
     																id="nomor_kontrak" name="nomor_kontrak"
     																placeholder="005/xxx/xxx" class="form-control"
     																required autocomplete="off">
     														</div>
     													</div>

     													<div class="form-group">
     														<label for="satuan">Vendor :</label>
     														<div class="form-line">
     															<div class="form-line">
     																<select style="font-size: 14px;"
     																	class="form-control show-tick" name="id_vendor"
     																	required autocomplete="off">
     																	<option value="" selected disabled>-- Pilih
     																		Vendor --</option>
     																	<?php foreach($vendor as $ven) : ?>
     																	<?php if($kontrak['id_vendor'] == $ven['id_user']) : ?>
     																	<option value="<?= $ven['id_user'] ?>"
     																		selected>
     																		<?= $ven['nama'] ?></option>
     																	<?php else : ?>
     																	<option value="<?= $ven['id_user'] ?>">
     																		<?= $ven['nama'] ?></option>
     																	<?php endif; ?>
     																	<?php endforeach; ?>
     																</select>
     															</div>
     														</div>
     													</div>

     													<div class="form-group">
     														<label for="satuan">Judul Kontrak :</label>
     														<div class="form-line">
     															<input value="<?= $kontrak['judul_kontrak'] ?>" type="
     																text" id="judul_kontrak" placeholder="Pengadaan" name="judul_kontrak" class="form-control"
     																required autocomplete="off">
     														</div>
     													</div>


     													<div class="form-group">
     														<label for="satuan">Mulai Kontrak :</label>
     														<div class="form-line">
     															<input type="text"
     																value="<?= $kontrak['mulai_kontrak'] ?>"
     																id="mulai_kontrak" name="mulai_kontrak"
     																placeholder="2020-12-12"
     																class="form-control datepicker" required
     																autocomplete="off">
     														</div>
     													</div>


     													<div class="form-group">
     														<label for="satuan">Selesai Kontrak :</label>
     														<div class="form-line">
     															<input type="text"
     																value="<?= $kontrak['selesai_kontrak'] ?>"
     																id="selesai_kontrak" placeholder="2020-12-12"
     																name="selesai_kontrak"
     																class="form-control datepicker" required
     																autocomplete="off">
     														</div>
     													</div>



     												</div>

     												<!-- Modal footer -->
     												<div class="modal-footer">
     													<button type="button" class="btn btn-secondary"
     														data-dismiss="modal"
     														style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     													<input type="submit" class="btn btn-success pull-right"
     														style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;"
     														value="EDIT" name="edit_kontrak">
     												</div>

     												</form>

     											</div>
     										</div>
     									</div>
     									<!-- End Modal  -->

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

     <!-- The Modal -->
     <div class="modal fade" id="myModal">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Tambah</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open('kontrak/add', $attributes); ?>

     				<div class="form-group">
     					<label for="satuan">Nomor Kontrak :</label>
     					<div class="form-line">
     						<input type="text" id="nomor_kontrak" name="nomor_kontrak" placeholder="005/xxx/xxx"
     							class="form-control" required autocomplete="off">
     					</div>
     				</div>

     				<div class="form-group">
     					<label for="satuan">Vendor :</label>
     					<div class="form-line">
     						<div class="form-line">
     							<select style="font-size: 14px;" class="form-control show-tick" name="id_vendor"
     								required autocomplete="off">
     								<option value="" selected disabled>-- Pilih Vendor --</option>
     								<?php foreach($vendor as $ven) : ?>
     								<option value="<?= $ven['id_user'] ?>"><?= $ven['nama'] ?></option>
     								<?php endforeach; ?>
     							</select>
     						</div>
     					</div>
     				</div>

     				<div class="form-group">
     					<label for="satuan">Judul Kontrak :</label>
     					<div class="form-line">
     						<input type="text" id="judul_kontrak" placeholder="Pengadaan" name="judul_kontrak"
     							class="form-control" required autocomplete="off">
     					</div>
     				</div>


     				<div class="form-group">
     					<label for="satuan">Mulai Kontrak :</label>
     					<div class="form-line">
     						<input type="text" id="mulai_kontrak" name="mulai_kontrak" placeholder="2020-12-12"
     							class="form-control datepicker" required autocomplete="off">
     					</div>
     				</div>


     				<div class="form-group">
     					<label for="satuan">Selesai Kontrak :</label>
     					<div class="form-line">
     						<input type="text" id="selesai_kontrak" placeholder="2020-12-12" name="selesai_kontrak"
     							class="form-control datepicker" required autocomplete="off">
     					</div>
     				</div>



     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_kontrak">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

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
