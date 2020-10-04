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
     							<center>REKAP PELAKSANAAN KONTRAK
     							</center>
     						</h2> <br><br>
     						<!-- <a href="<?= base_url(); ?>rekap/add">
    							<button type="button" class="btn btn-info waves-effect">
    								<i class="material-icons">add</i>
    								<span>TAMBAH</span>
    							</button>
    						</a> -->

     						<!-- <button class="btn btn-info waves-effect" type="button" data-toggle="modal"
     							data-target="#myModal">
     							<i class="material-icons">add</i>
     							<span>TAMBAH</span>
     						</button> -->
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

     										<th>Vol</th>
     										<th>Realisasi</th>
     										<th>Satuan</th>
     										<th>Harga</th>
     										<th>Jumlah</th>
     										<th>Progress</th>
     										<th style="text-align: center;">Add Realisasi</th>
     									</tr>
     								</thead>

     								<tbody>

     									<?php $i = 1;
										foreach ($rekaps as $rekap) : ?>
     									<tr>
     										<td><?= $i++; ?></td>
     										<!-- <td><?= get_judul_kontrak_by_id($rekap['id_kontrak'])  ?></td> -->
     										<td><?= $rekap['uraian'] ?></td>

     										<td><?= $rekap['vol'] ?></td>
     										<td><?= $rekap['realisasi'] ?></td>
     										<td><?= get_satuan_nama_by_id($rekap['id_satuan']);  ?></td>
     										<td>Rp. <?= number_format($rekap['harga'])  ?></td>
     										<td>Rp. <?php 
											$jumlah =  $rekap['vol'] * $rekap['harga'];
											echo number_format($jumlah);
											  ?></td>
     										<td>
     											<?php $progress = $rekap['realisasi'] / $rekap['vol'] * 100; echo floor($progress) ?>%
     										</td>
     										<td style=" text-align: center;vertical-align: middle;">
     											<a href="#" title="id rekap" data-id="#" data-toggle="modal"
     												data-target="#ModalTambah<?= $rekap['id_rekap'] ?>"><i
     													style="color:green;"
     													class="material-icons">add_circle_outline</i></a>
     										</td>
     									</tr>


     									<!-- Tambah Modal-->
     									<div class="modal fade" id="ModalTambah<?= $rekap['id_rekap'] ?>" tabindex="-1"
     										role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     										<div class="modal-dialog modal-dialog-centered" role="document">
     											<div class="modal-content">
     												<div class="modal-header">
     													<h5 class="modal-title" id="exampleModalLabel">Tambah realisasi
     													</h5>
     													<button class="close" type="button" data-dismiss="modal"
     														aria-label="Close">
     														<span aria-hidden="true">×</span>
     													</button>
     												</div>
     												<?php $attributes = array('method' => 'post'); ?>

     												<?php echo form_open('vendor/add/' . $rekap['id_rekap'] . '/' . $rekap['id_kontrak'], $attributes); ?>
     												<div class="modal-body">
     													<label for="">Realisasi</label>
     													<input type="number" id="stokTambah<?= $rekap['id_rekap'] ?>"
     														name="realisasi" class="form-control"
     														placeholder="Total progress yang sudah terealisasi"
     														onblur="cekTambah(<?= $rekap['id_rekap'] ?>, <?= $rekap['vol'] ?>)">

     												</div>
     												<!-- Modal footer -->
     												<div class="modal-footer">
     													<input type="submit" name="tambah" class="btn btn-primary"
     														value="Add">
     													<!-- <button type="button" class="btn btn-secondary">Simpan</button> -->

     												</div>
     												</form>
     											</div>
     										</div>

     									</div>

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
     								<!-- <tfoot>
     									<tr>
     										<td>Jumlah</td>
     										<td><strong>Rp. <?= number_format($jumlah_seluruh['harga']) ?></strong>
     										</td>
     										<td>-</td>
     										<td>ppn 10%</td>
     										<td><strong>
     												Rp.
     												<?php $ppn = $jumlah_seluruh['harga'] * 10 / 100; echo number_format($ppn) ?>
     											</strong>
     										</td>
     										<td>-</td>
     										<td>Total</td>
     										<td><strong>Rp.
     												<?php $total = $jumlah_seluruh['harga'] - $ppn; echo number_format($total); ?>
     											</strong>
     										</td>
     									</tr>


     								</tfoot> -->
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
     			<div class="modal-body">Apakah anda yakin ingin menghapus rekap ini ?</div>
     			<div class="modal-footer">
     				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
     				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
     			</div>
     		</div>
     	</div>
     </div>
