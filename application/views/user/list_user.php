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
    			<h2>MANAJEMEN USER</h2>
    		</div>

    		<!-- Basic Examples -->
    		<div class="row clearfix">
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    				<div class="card">
    					<div class="header">
    						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
    							<center>LIST USER ADMIN DAN VENDOR</center>
    						</h2> <br><br>
    						<!-- <a href="<?= base_url(); ?>User/add/">
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
    										<th>No</th>
    										<th>Nama</th>
    										<th>Username</th>
    										<th>Status</th>
    										<th>Dibuat/Diedit oleh</th>
    										<th>Create Date</th>
    										<th style="text-align: center;">ACTION</th>
    									</tr>
    								</thead>

    								<tbody>


    									<?php $i = 1;
										foreach ($users as $user) : ?>
    									<tr>
    										<td><?= $i++; ?></td>
    										<td><?= $user['nama'] ?></td>
    										<td><?= $user['username'] ?></td>
    										<td><?= ($user['status'] == 1) ? 'Vendor' : 'Admin';  ?></td>
    										<td><?= $user['created_by'] ?></td>
    										<td><?= $user['created_at'] ?></td>
    										<td style="text-align: center;vertical-align: middle;">
    											<center>
    												<a href="<?= base_url('User/edit/' . $user['id_user']) ?>"
    													data-toggle="tooltip" data-placement="top" title="Edit"><i
    														style="color:#00b0e4;"
    														class="material-icons">description</i></a>&nbsp;
    												<!-- <a href="#" id="btn_posisi" title="Delete" data-id="" data-toggle="modal" data-target="#deleteModal"><i style="color:red;" class="material-icons">delete</i></a> -->
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
    <!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
    				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">×</span>
    				</button>
    			</div>
    			<div class="modal-body">Apakah anda yakin ingin menghapus data user ini ?</div>
    			<div class="modal-footer">
    				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
    			</div>
    		</div>
    	</div>
    </div> -->

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

    				<?php echo form_open_multipart('user/add', $attributes); ?>

    				<div class="form-group">
    					<label for="satuan">Nama Vendor :</label>
    					<div class="form-line">
    						<input type="text" class="form-control" placeholder="Ex : Nama " name="nama" required
    							autocomplete="off" />
    					</div>
    				</div>
    				<div class="form-group">
    					<label for="satuan">Username :</label>
    					<div class="form-line">
    						<input type="text" class="form-control" placeholder="Ex: blablacrocxxx" name="username"
    							required autocomplete="off" />
    					</div>
    				</div>
    				<div class="form-group">
    					<label for="satuan">Password :</label>
    					<div class="form-line">
    						<input type="password" class="form-control" placeholder="Ex: xxxxx" name="password" required
    							autocomplete="off" />
    					</div>
    				</div>
    				<div class="form-group">
    					<label for="satuan">Confirm Password :</label>
    					<div class="form-line">
    						<input type="password" class="form-control" placeholder="Ex: xxxxx" name="con_pass" required
    							autocomplete="off" />
    					</div>
    				</div>

    				<!-- <div class="form-group">
    					<label for="satuan">Status :</label>
    					<div class="form-line">
    						<select style="font-size: 14px;" class="form-control show-tick" name="status" required
    							autocomplete="off">
    							<option value="" selected disabled>-- Pilih Status --</option>
    							<option value="1">Vendor</option>
    							<option value="2">Admin</option>
    						</select>
    					</div>
    				</div> -->

    			</div>

    			<!-- Modal footer -->
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal"
    					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
    				<input type="submit" class="btn btn-primary pull-right"
    					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
    					name="submit">
    			</div>

    			</form>

    		</div>
    	</div>
    </div>
