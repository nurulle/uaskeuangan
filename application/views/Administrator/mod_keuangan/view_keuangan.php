<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
				<span class='glyphicon glyphicon-plus'></span>
			</button>
			<div class="header">
				<h2>
					DATA KEUANGAN
				</h2>

			</div>
			<?php echo $this->session->flashdata('pesan') ?>
			<div class="body">
				<ul class="nav nav-tabs tab-nav-right" role="tablist">
					<li role="presentation" class="active"><a href="#masuk" data-toggle="tab">PEMASUKAN</a></li>
					<li role="presentation"><a href="#keluar" data-toggle="tab">PENGELUARAN</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane animated flipInX active" id="masuk">
						<table class="table table-bordered table-striped table-hover" id="table-pemasukan">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Dari</th>
									<th>Jumlah</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<?php
								$mlebu = $this->db->query("SELECT status , SUM(jumlah) AS masuk FROM keuangan WHERE status = 'Masuk'")->result_array();
								foreach ($mlebu as $anu) {
									$a = $anu['masuk'];
									$b = number_format($a, 2, ",", ".");
									echo "<tr>
										<th colspan='3'>Jumlah</th>
										<th colspan='1'>Rp. $b</th>   
									</tr>";
								}
								?>
							</tfoot>
							<tbody id="tbody-pemasukan"></tbody>
						</table>
					</div>
					<div role="tabpanel" class="tab-pane animated flipInX" id="keluar">
						<table class="table table-bordered table-striped table-hover" id="table-pengeluaran">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Keperluan</th>
									<th>Jumlah</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<?php
								$metu = $this->db->query("SELECT status , SUM(jumlah) AS keluar FROM keuangan WHERE status = 'keluar'")->result_array();
								foreach ($metu as $anu1) {
									$a1 = $anu1['keluar'];
									$b1 = number_format($a1, 2, ",", ".");
									echo "<tr>
									<th colspan='3'>Jumlah</th>
									<th colspan='1'>Rp. $b1</th>   
								</tr>";
								}
								?>
							</tfoot>
							<tbody id="tbody-pengeluaran"></tbody>
						</table>
					</div>
				</div>
				<center>
					<h1 class="card-inside-title">
						SISA SALDO SAAT INI
						<small>Pemasukan - Pengeluaran</small>
					</h1>
				</center>
				<div class="demo-single-button-dropdowns">
					<?php
					$query = $this->db->query("SELECT ROUND ( SUM(IF(status = 'Masuk', jumlah, 0))-(SUM(IF( status = 'Keluar', jumlah, 0))) ) AS subtotal FROM keuangan");
					foreach ($query->result_array() as $rows) {
						$dwet = $rows['subtotal'];
						$arto = number_format($dwet, 2, ",", ".");
						echo "<center><h2>Rp. $arto</h2></center>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" id="form-tambah">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">User</label>
						<!-- <input type="text" name="id_keuangan" id="id_keuangan"> -->
						<input type="text" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
							name="username" id="username-tambah">
					</div>
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
							id="status-tambah">
							<option value="">-- Pilih Status --</option>
							<option value="masuk">Masuk</option>
							<option value="keluar">Keluar</option>
						</select>
					</div>
					<div class="form-group">
						<label for="data">Tanggal</label>
						<input type="date" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
							name="date" id="date-tambah">
					</div>
					<div class="form-group">
						<label for="tujuan">Tujuan</label>
						<input type="text" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
							name="tujuan" id="tujuan-tambah">
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input type="number" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
							name="jumlah" id="jumlah-tambah">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-tambah"><span
							class='glyphicon glyphicon-plane'></span></button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" id="form-edit">
			<div class="modal-body">
				<div class="form-group">
					<label for="username">User</label>
					<input type="hidden" name="id_keuangan" id="id_keuangan">
					<input type="text" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
						name="username" id="username">
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<select name="status" id="status" class="form-control form-control-sm"
						style="border: 1px solid #9b9b9b">
						<option value="">-- Pilih --</option>
						<option value="masuk">Masuk</option>
						<option value="keluar">Keluar</option>
					</select>
				</div>
				<div class="form-group">
					<label for="data">Tanggal</label>
					<input type="date" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
						name="date" id="date">
				</div>
				<div class="form-group">
					<label for="tujuan">Tujuan</label>
					<input type="text" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
						name="tujuan" id="tujuan">
				</div>
				<div class="form-group">
					<label for="jumlah">User</label>
					<input type="number" class="form-control form-control-sm" style="border: 1px solid #9b9b9b"
						name="jumlah" id="jumlah">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-update"><span
						class='glyphicon glyphicon-plane'></span></button>
			</div>
			<!-- </form> -->
		</div>
	</div>
</div>


<script>
	$(document).ready(function () {
		ambilDataPemasukan()
		ambilDataPengeluaran()

		// Get data table pemasukan
		function ambilDataPemasukan() {
			$.ajax({
				url: '<?php echo base_url() . $this->uri->segment(1) ?>/ambilData',
				type: 'GET',
				async: true,
				dataType: 'json',
				success: function (data) {
					// console.log(data.masuk);
					let html = '';
					if(data.masuk.length > 0){
						for (i = 0; i < data.masuk.length; i++) {
							html += `
								<tr>
									<td>${data.masuk[i].tgl}</td>
									<td>${data.masuk[i].tujuan}</td>
									<td>${data.masuk[i].jumlah}</td>
									<td>
										<button class="btn btn-warning btn-edit" data-id="${data.masuk[i].id_keuangan}">
											<span class='glyphicon glyphicon-edit'></span>
										</button>
										<button class="btn btn-danger btn-hapus" data-id="${data.masuk[i].id_keuangan}">
											<span class='glyphicon glyphicon-trash'></span>
										</button>
									</td>
								</tr>
							`
						}
					}
					$('#tbody-pemasukan').html(html);
					$('#table-pemasukan').dataTable({
						"destroy": true
					})
					// $('#table-pemasukan').dataTable({})
				}
			})
		}

		//Get data tabel pengeluaran
		function ambilDataPengeluaran() {
			$.ajax({
				url: '<?php echo base_url() . $this->uri->segment(1) ?>/ambilData',
				type: 'GET',
				async: true,
				dataType: 'json',
				success: function (data) {
					// console.log(data.masuk);
					let html = '';
					if(data.keluar.length > 0){
						for (i = 0; i < data.keluar.length; i++) {
							html += `
								<tr>
									<td>${data.keluar[i].tgl}</td>
									<td>${data.keluar[i].tujuan}</td>
									<td>${data.keluar[i].jumlah}</td>
									<td>
									<button class="btn btn-warning btn-edit"  data-id="${data.keluar[i].id_keuangan}">
										<span class='glyphicon glyphicon-edit'></span>
									</button>
									<button class="btn btn-danger btn-hapus" data-id="${data.keluar[i].id_keuangan}">
										<span class='glyphicon glyphicon-trash'></span>
									</button>
									</td>
								</tr>
							`
						}
					}
					$('#tbody-pengeluaran').html(html);
					$('#table-pengeluaran').dataTable({
						"destroy": true
					})
					// $('#table-pengeluaran').dataTable({})
				}
			})
		}

		//Tambah Data
		$('.btn-tambah').on('click', function () {
			let url = '<?php echo base_url() . $this->uri->segment(1) ?>/tambah_keuangan';
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: $('#form-tambah').serialize(),
				success: function (data) {
					let html = '';
					// for (i = 0; i < data.length; i++) {
							html += `
								<tr>
									<td>${data.tgl}</td>
									<td>${data.tujuan}</td>
									<td>${data.jumlah}</td>
									<td>
									<button class="btn btn-warning btn-edit" data-id="${data.id_keuangan}">
										<span class='glyphicon glyphicon-edit'></span>
									</button>
									<button class="btn btn-danger btn-hapus" data-id="${data.id_keuangan}">
										<span class='glyphicon glyphicon-trash'></span>
									</button>
									</td>
								</tr>
							`
						// }
					// if(data.status == 'masuk'){
					// 	$('#tbody-pemasukan').append(html);
					// }else{
					// 	$('#tbody-pengeluaran').append(html);
					// }
					location.reload();
					$('#username-tambah').val('')
					$('#status-tambah').val('')
					$('#date-tambah').val('')
					$('#tujuan-tambah').val('')
					$('#jumlah-tambah').val('')
					$('#modal-tambah').modal('hide')
					

				}
			});
			return false;
		})

		//Get Data Edit Pemasukan
		$('#tbody-pemasukan').on('click', '.btn-edit', function () {
			let id_keuangan = $(this).attr('data-id');
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url() . $this->uri->segment(1) ?>/getDataEdit/' +
					id_keuangan,
				dataType: 'json',
				success: function (data) {
					$('#modal-edit').modal('show');
					$('#id_keuangan').val(data.keuangan[0].id_keuangan);
					$('#username').val(data.keuangan[0].username);
					$('#status').val(data.keuangan[0].status);
					$('#date').val(data.keuangan[0].tgl);
					$('#tujuan').val(data.keuangan[0].tujuan);
					$('#jumlah').val(data.keuangan[0].jumlah);
				}
			})
			return false;
		})

		//Get Data Edit Pengeluaran
		$('#tbody-pengeluaran').on('click', '.btn-edit', function () {
			let id_keuangan = $(this).attr('data-id');
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url() . $this->uri->segment(1) ?>/getDataEdit/' +
					id_keuangan,
				dataType: 'json',
				success: function (data) {
					$('#modal-edit').modal('show');
					$('#id_keuangan').val(data.keuangan[0].id_keuangan);
					$('#username').val(data.keuangan[0].username);
					$('#status').val(data.keuangan[0].status);
					$('#date').val(data.keuangan[0].tgl);
					$('#tujuan').val(data.keuangan[0].tujuan);
					$('#jumlah').val(data.keuangan[0].jumlah);
				}
			})
			return false;
		})
		
		//Hapus data table pemasukan
		$('#tbody-pemasukan').on('click', '.btn-hapus', function () {
			let id_keuangan = $(this).data('id')
			swal({
				title: "Apa anda yakin?",
				text: "Data akan terhapus secara permanen!",
				icon: "warning",
				confirmButtonColor: "#DD6B55",
				confirmButtonText: ["Ya, hapus data permanent!", true],
				showCancelButton: true,
				dangerMode: true
			},
			function () {
				console.log(id_keuangan);
				$.ajax({
					type: 'POST',
					url : '<?php echo base_url().$this->uri->segment(1) ?>/hapus',
					dataType: 'JSON',
					data: {id_keuangan : id_keuangan},
					success: function (data){
						swal("Berhasil dihapus")
						location.reload();
					},
					error: function(data){
						console.log(data.responseText);
					}
				})
			}
			)
			
		})

		// Hapus data table pengeluaran
		$('#tbody-pengeluaran').on('click', '.btn-hapus', function () {
			let id_keuangan = $(this).data('id')
			swal({
				title: "Apa anda yakin?",
				text: "Data akan terhapus secara permanen!",
				icon: "warning",
				confirmButtonColor: "#DD6B55",
				confirmButtonText: ["Ya, hapus data permanent!", true],
				showCancelButton: true,
				dangerMode: true
			},
			function () {
				console.log(id_keuangan);
				$.ajax({
					type: 'POST',
					url : '<?php echo base_url().$this->uri->segment(1) ?>/hapus',
					dataType: 'JSON',
					data: {id_keuangan : id_keuangan},
					success: function (data){
						swal("Berhasil dihapus")
						location.reload();
					},
					error: function(data){
						console.log(data.responseText);
					}
				})
			}
			)
			
		})

		$('.btn-update').on('click', function(){
			let url = '<?php echo base_url() . $this->uri->segment(1) ?>/ubah_keuangan';
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: $('#form-edit').serialize(),
				success: async function(data){
					$('#modal-edit').modal('hide');
					location.reload()
				}
			})
		})


	})

</script>
