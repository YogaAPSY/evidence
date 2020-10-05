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
     										<th style="text-align: center;">Action</th>

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
     										<td style=" text-align: center;vertical-align: middle;"><a href="#"
     												type="button" data-toggle="modal" data-target="#myModal1"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
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
     										<td style=" text-align: center;vertical-align: middle;"><a href="#"
     												type="button" data-toggle="modal" data-target="#myModal2"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
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
     										<td style=" text-align: center;vertical-align: middle;"><a href="#"
     												type="button" data-toggle="modal" data-target="#myModal3"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
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
     										<td style=" text-align: center;vertical-align: middle;"><a href="#"
     												type="button" data-toggle="modal" data-target="#myModal4"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
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
     										<td style=" text-align: center;vertical-align: middle;"><a href="#"
     												type="button" data-toggle="modal" data-target="#myModal5"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
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
     										<td style=" text-align: center;vertical-align: middle;"><a href="#"
     												type="button" data-toggle="modal" data-target="#myModal6"
     												data-placement="top" title="Edit"><i style="color:#00b0e4;"
     													class="material-icons">description</i></a>&nbsp;</td>
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


     <!-- The Modal -->
     <div class="modal fade" id="myModal1">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Upload</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open_multipart('vendor/upload/'. $id_kontrak, $attributes); ?>

     				<div class="form-group">
     					<div class="form-line">
     						<label>
     							<h4 style="font-size: 17.1px;">Dokumen kontrak
     							</h4>
     						</label>
     						<!-- <input type="hidden" value="1" name="tes"> -->
     						<input type="file" onchange="cekPdf800(this)" name="file1" class="form-control"
     							placeholder="Ex : NARK2020" required autocomplete="off" />

     					</div>
     					<small>File harus berupa PDF</small>
     				</div>


     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_berkas">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

     <!-- The Modal -->
     <div class="modal fade" id="myModal2">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Upload</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open_multipart('vendor/upload/'. $id_kontrak, $attributes); ?>

     				<div class="form-group">
     					<div class="form-line">
     						<label>
     							<h4 style="font-size: 17.1px;">File MSDS
     							</h4>
     						</label>
     						<input onchange="cekPdf800(this)" type="file" name="file2" class="form-control"
     							placeholder="Ex : NARK2020" required autocomplete="off" />

     					</div>
     					<small>pdf</small>
     				</div>


     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_berkas">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

     <!-- The Modal -->
     <div class="modal fade" id="myModal3">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Upload</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open_multipart('vendor/upload/'. $id_kontrak, $attributes); ?>

     				<div class="form-group">
     					<div class="form-line">
     						<label>
     							<h4 style="font-size: 17.1px;">COO/COM(untuk material impor)
     							</h4>
     						</label>
     						<input type="file" name="file3" class="form-control" placeholder="Ex : NARK2020" required
     							autocomplete="off" />
     					</div>
     					<small>pdf</small>
     				</div>


     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_berkas">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

     <!-- The Modal -->
     <div class="modal fade" id="myModal4">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Upload</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open_multipart('vendor/upload/'. $id_kontrak, $attributes); ?>

     				<div class="form-group">
     					<div class="form-line">
     						<label>
     							<h4 style="font-size: 17.1px;">Surat keterangan asal usul barang dan surat keterangan
     								barang
     								asli
     							</h4>
     						</label>
     						<input type="file" name="file4" class="form-control" placeholder="Ex : NARK2020" required
     							autocomplete="off" />
     					</div>
     					<small>pdf</small>
     				</div>


     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_berkas">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

     <!-- The Modal -->
     <div class="modal fade" id="myModal5">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Upload</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open_multipart('vendor/upload/'. $id_kontrak, $attributes); ?>

     				<div class="form-group">
     					<div class="form-line">
     						<label>
     							<h4 style="font-size: 17.1px;">Sertifikat masa garansi
     							</h4>
     						</label>
     						<input type="file" name="file5" class="form-control" placeholder="Ex : NARK2020" required
     							autocomplete="off" />
     					</div>
     					<small>pdf</small>
     				</div>


     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_berkas">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

     <!-- The Modal -->
     <div class="modal fade" id="myModal6">
     	<div class="modal-dialog modal-md">
     		<div class="modal-content">

     			<!-- Modal Header -->
     			<div class="modal-header">
     				<h4 class="modal-title">Form Upload</h4>
     				<button type="button" class="close" data-dismiss="modal">&times;</button>
     			</div>

     			<!-- Modal body -->
     			<div class="modal-body">
     				<?php $attributes = array('method' => 'post'); ?>

     				<?php echo form_open_multipart('vendor/upload/'. $id_kontrak, $attributes); ?>

     				<div class="form-group">
     					<div class="form-line">
     						<label>
     							<h4 style="font-size: 17.1px;">Copy sertifikat factory test/ routine test dari pabrik
     							</h4>
     						</label>
     						<input type="file" name="file6" class="form-control" placeholder="Ex : NARK2020" required
     							autocomplete="off" />
     					</div>
     					<small>pdf</small>
     				</div>


     			</div>

     			<!-- Modal footer -->
     			<div class="modal-footer">
     				<button type="button" class="btn btn-secondary" data-dismiss="modal"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;">Close</button>
     				<input type="submit" class="btn btn-primary pull-right"
     					style="margin-right: 20px;font-size: 16px;height: 40px;width: 100px;" value="SIMPAN"
     					name="add_berkas">
     			</div>

     			</form>

     		</div>
     	</div>
     </div>
     <!-- End Modal  -->

     <script>
     	function cekPdf800(file) {

     		var sFileName = file.files[0].name;
     		var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
     		var iFileSize = file.size;
     		var iConvert = (file.files[0].size / 1024).toFixed(2);
     		var FileSize = file.files[0].size / 1024 / 1024; // in MB

     		/// OR together the accepted extensions and NOT it. Then OR the size cond.
     		/// It's easier to see this way, but just a suggestion - no requirement.
     		if (FileSize > 0.8 && (sFileExtension == "pdf")) {
     			txt = "Tipe File : '" + sFileExtension + "'\n\n";
     			txt += "Size: " + iConvert + " kb \n\n";
     			txt +=
     				"Ukuran file lebih dari 800 KB.\n\n";
     			console.log(txt);
     			swal({
     				title: "ERROR !!!",
     				text: txt,
     				showConfirmButton: true,
     				type: 'error'
     			});
     			$(file).val('');
     			return false;
     		} else if (!(sFileExtension == "pdf")) {

     			txt = "Tipe File : '" + sFileExtension + "'\n\n";

     			txt +=
     				"Format file bukan PDF.\n\n";
     			console.log(txt);
     			swal({
     				title: "ERROR !!!",
     				text: txt,
     				showConfirmButton: true,
     				type: 'error'
     			});
     			$(file).val('');
     			return false;
     		} else {
     			console.log('ini betul');
     		}
     	}

     </script>
