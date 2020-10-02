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
     			<h2>DETAIL REKAP PELAKSANAAN KONTRAK</h2>
     		</div>

     		<!-- Basic Examples -->
     		<div class="row clearfix">
     			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     				<div class="card">
     					<div class="header">
     						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
     							<center>DETAIL REKAP PELAKSANAAN KONTRAK</center>
     						</h2> <br><br>
     						<!-- <a href="<?= base_url(); ?>rekap/add">
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
     										<!-- <th>Kontrak</th> -->
     										<th>Uraian</th>
     										<th>Satuan</th>
     										<th>Vol</th>
     										<th>Harga</th>
     										<th>Jumlah</th>

     										<th style="text-align: center;width:100px">ACTION</th>
     									</tr>
     								</thead>

     								<tbody>

     									<?php $i = 1;
										foreach ($rekaps as $rekap) : ?>
     									<tr>
     										<td><?= $i++; ?></td>
     										<!-- <td><?= get_judul_kontrak_by_id($rekap['id_kontrak'])  ?></td> -->
     										<td><?= $rekap['uraian'] ?></td>
     										<td><?= get_satuan_nama_by_id($rekap['id_satuan']);  ?></td>
     										<td><?= $rekap['vol'] ?></td>
     										<td>Rp. <?= number_format($rekap['harga'])  ?></td>
     										<td>Rp. <?php 
											$jumlah =  $rekap['vol'] * $rekap['harga'];
											echo number_format($jumlah);
											  ?></td>
     										<td style="text-align: center;vertical-align: middle;">
     											<center>
     												<!-- <a href="<?= base_url(); ?>rekap/<?= $rekap['id_rekap']; ?>"
     													data-toggle="tooltip" data-placement="top" title="View"><i
     														style="color: #32CD32;"
     														class="material-icons">visibility</i></a>&nbsp; -->
     												<a href="#" type="button" data-toggle="modal"
     													data-target="#myModal<?= $rekap['id_rekap']?>"
     													data-placement="top" title="Edit"><i style="color:#00b0e4;"
     														class="material-icons">description</i></a>&nbsp;
     												<!-- <a href="#" id="btn_posisi" title="Delete" data-id="<?= $rekap['id_rekap'] ?>" data-toggle="modal" data-target="#deleteModal"><i style="color:red;" class="material-icons">delete</i></a> -->
     											</center>
     										</td>
     									</tr>

     									<!-- The Modal -->
     									<div class="modal fade" id="myModal<?= $rekap['id_rekap'] ?>">
     										<div class="modal-dialog modal-md">
     											<div class="modal-content">

     												<!-- Modal Header -->
     												<div class="modal-header">
     													<h4 class="modal-title">Form Edit rekap</h4>
     													<button type="button" class="close"
     														data-dismiss="modal">&times;</button>
     												</div>

     												<!-- Modal body -->
     												<div class="modal-body">
     													<?php $attributes = array('method' => 'post'); ?>

     													<?php echo form_open('rekap/edit/'.$id.'/'.$rekap['id_rekap'],
     													$attributes); ?>
     													<div class="form-group">
     														<label for="satuan">Uraian :</label>
     														<div class="form-line">
     															<input type="text" value="<?= $rekap['uraian'] ?>"
     																id="uraian" placeholder="Uraian" name="uraian"
     																class="form-control" required autocomplete="off">
     														</div>
     													</div>
     													<div class="form-group">
     														<label for="satuan">Satuan :</label>
     														<div class="form-line">
     															<div class="form-line">
     																<select style="font-size: 14px;"
     																	class="form-control show-tick" name="id_satuan"
     																	required autocomplete="off">
     																	<?php foreach($satuan as $sa) : ?>
     																	<option value="<?=$sa['id_satuan']?>">
     																		<?=$sa['nama_satuan']?></option>
     																	<?php endforeach; ?>
     																</select>
     															</div>
     														</div>
     													</div>

     													<div class="form-group">
     														<label for="satuan">Vol :</label>
     														<div class="form-line">
     															<input type="number" value="<?= $rekap['vol'] ?>"
     																id="vol" placeholder="Pengadaan" name="vol"
     																class="form-control" required autocomplete="off">
     														</div>
     													</div>


     													<div class="form-group">
     														<label for="satuan">Harga:</label>
     														<div class="form-line">
     															<input type="number" value="<?= $rekap['harga'] ?>"
     																id="harga" name="harga" placeholder="2000000"
     																class="form-control" required autocomplete="off">
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
     														value="EDIT" name="edit_rekap">
     												</div>

     												</form>

     											</div>
     										</div>
     									</div>
     									<!-- End Modal  -->

     									<?php endforeach; ?>
     									<!-- <tr>
     										<td></td>
     										<td></td>
     										<td></td>
     										<td></td>
     										<td>Jumlah</td>
     										<td>asdasd</td>
     									</tr>

     									<tr>
     										<td></td>
     										<td></td>
     										<td></td>
     										<td></td>
     										<td>ppn 10%</td>
     										<td>asdasd</td>
     									</tr>

     									<tr>
     										<td></td>
     										<td></td>
     										<td></td>
     										<td></td>
     										<td>Total</td>
     										<td>asdasd</td>
     									</tr> -->

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

     				<?php echo form_open('rekap/add/'. $id, $attributes); ?>


     				<div class="form-group">
     					<label for="satuan">Uraian :</label>
     					<div class="form-line">
     						<input type="text" id="uraian" placeholder="Uraian" name="uraian" class="form-control"
     							required autocomplete="off">
     					</div>
     				</div>

     				<div class="form-group">
     					<label for="satuan">Satuan :</label>
     					<div class="form-line">
     						<div class="form-line">
     							<select style="font-size: 14px;" class="form-control show-tick" name="id_satuan"
     								required autocomplete="off">
     								<option value="" selected disabled>-- Pilih Satuan --</option>
     								<?php foreach($satuan as $sa) : ?>
     								<option value="<?=$sa['id_satuan']?>"><?=$sa['nama_satuan']?></option>
     								<?php endforeach; ?>
     							</select>
     						</div>
     					</div>
     				</div>

     				<div class="form-group">
     					<label for="satuan">Vol :</label>
     					<div class="form-line">
     						<input type="number" id="vol" placeholder="69" name="vol" class="form-control" required
     							autocomplete="off">
     					</div>
     				</div>


     				<div class="form-group">
     					<label for="satuan">Harga:</label>
     					<div class="form-line">
     						<input type="number" id="harga" name="harga" placeholder="2000000" class="form-control"
     							required autocomplete="off">
     					</div>
     				</div>



     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_rekap">
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
     			<div class="modal-body">Apakah anda yakin ingin menghapus rekap ini ?</div>
     			<div class="modal-footer">
     				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
     				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
     			</div>
     		</div>
     	</div>
     </div>
