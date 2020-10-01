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
    			<h2>MANAJEMEN SATUAN</h2>
    		</div>

    		<!-- Basic Examples -->
    		<div class="row clearfix">
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    				<div class="card">
    					<div class="header">
    						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
    							<center>LIST SATUAN</center>
    						</h2> <br><br>
    						<!-- <a href="<?= base_url(); ?>Satuan/add">
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
    										<!-- <th>Kode Satuan</th> -->
    										<th>Nama Satuan</th>
    										<th>Created Date</th>
    										<th style="text-align: center;width:300px">ACTION</th>
    									</tr>
    								</thead>

    								<tbody>

    									<?php $i = 1;
										foreach ($satuan as $satu) : ?>
    									<tr>
    										<td><?= $i++; ?></td>
    										<!-- <td><?= $satu['kode_satuan'] ?></td> -->
    										<td><?= $satu['nama_satuan'] ?></td>
    										<td><?= $satu['created_at'] ?></td>
    										<td style="text-align: center;vertical-align: middle;">
    											<center>
    												<a href="#" data-toggle="modal"
    													data-target="#myModal<?=$satu['id_satuan']?>"
    													data-placement="top" title="Edit"><i style="color:#00b0e4;"
    														class="material-icons">description</i></a>&nbsp;
    												<!-- <a href="#" id="btn_posisi1" title="Delete"
    													data-id="<?= $satu['id_satuan'] ?>" data-toggle="modal"
    													data-target="#deleteModal"><i style="color:red;"
    														class="material-icons">delete</i></a> -->
    											</center>
    										</td>
    									</tr>

    									<!-- The Modal -->
    									<div class="modal fade" id="myModal<?=$satu['id_satuan']?>">
    										<div class="modal-dialog modal-md">
    											<div class="modal-content">

    												<!-- Modal Header -->
    												<div class="modal-header">
    													<h4 class="modal-title">Form Tambah</h4>
    													<button type="button" class="close"
    														data-dismiss="modal">&times;</button>
    												</div>

    												<!-- Modal body -->
    												<div class="modal-body">
    													<?php $attributes = array('method' => 'post'); ?>

    													<?php echo form_open('satuan/edit/' . $satu['id_satuan'], $attributes); ?>

    													<div class="form-group">
    														<label for="satuan">Nama Satuan :</label>
    														<div class="form-line">
    															<input type="text" id="satuan" name="satuan"
    																value="<?= $satu['nama_satuan']?>"
    																class="form-control" required autocomplete="off">
    														</div>
    													</div>

    												</div>

    												<!-- Modal footer -->
    												<div class="modal-footer">
    													<button type="button" class="btn btn-secondary"
    														data-dismiss="modal"
    														style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
    													<input type="submit" class="btn btn-primary pull-right"
    														style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;"
    														value="SIMPAN" name="edit_satuan">
    												</div>

    												</form>

    											</div>
    										</div>
    									</div>
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
    			<div class="modal-body">Apakah anda yakin ingin menghapus satuan ini ?</div>
    			<div class="modal-footer">
    				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
    			</div>
    		</div>
    	</div>
    </div>

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

    				<?php echo form_open('satuan/add', $attributes); ?>

    				<div class="form-group">
    					<label for="satuan">Nama Satuan :</label>
    					<div class="form-line">
    						<input type="text" id="satuan" name="satuan" class="form-control" required
    							autocomplete="off">
    					</div>
    				</div>

    			</div>

    			<!-- Modal footer -->
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal"
    					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
    				<input type="submit" class="btn btn-primary pull-right"
    					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
    					name="add_satuan">
    			</div>

    			</form>

    		</div>
    	</div>
    </div>
    <!-- End Modal  -->
