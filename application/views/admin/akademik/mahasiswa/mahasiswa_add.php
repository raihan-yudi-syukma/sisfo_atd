<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

	<!-- Wrapper -->
  	<div class="wrapper">
  		<?php 
	    $this->load->view('templates/navbar');
	    $this->load->view('templates/sidebar'); 
	    ?>

		<div class="content-wrapper">
			<div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px">
				<table align="center" border="0" cellspacing ="10" cellpadding="15">

					<!-- header -->
					<tr>
						<td colspan="2" align="center">
							<img class="img-input-mhs" src="<?= base_url('assets/img/laptop_input.png') ?>"><br><br>	
							<!-- title -->
							<h2 class="header-input-mhs">
								<i class="far fa-circle fas fa-download"></i> Input Data Mahasiswa
							</h2>
							<!-- flashdata -->
							<?php if ($this->session->flashdata('mahasiswa_saved')) : ?>
							<div class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 380px">
								<h4 align="center"><?= $this->session->flashdata('mahasiswa_saved') ?> 👍</h4>
								<?php $this->session->unset_userdata('mahasiswa_saved') ?>
								<button title="Close this notification" type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?php endif ?>
						</td>
					</tr>
					<!-- /.header -->

					<!-- form -->
					<form method="POST">
					<ul>
					<!-- nim -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">NIM</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="text" class="<?= form_error('nim') ? 'input-invalid' : 'input' ?>" name="nim" id="nim" placeholder="Maks. 10 digit (tidak kurang dari '0')" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?= set_value('nim') ?>" required>
							<?= form_error('nim', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- nama -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Nama</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="text" class="<?= form_error('nama') ? 'input-invalid' : 'input' ?>" name="nama" id="nama" placeholder="Maks. 30 karakter" maxlength="30" value="<?= set_value('nama') ?>" required>
							<?= form_error('nama', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- input tempat lahir -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Tempat Lahir</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="text" class="<?= form_error('tpt_lahir') ? 'input-invalid' : 'input' ?>" name="tpt_lahir" id="tpt_lahir" placeholder="Maks. 30 karakter" maxlength="30" value="<?= set_value('tpt_lahir') ?>" required>
							<?= form_error('tpt_lahir', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- tanggal lahir -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Tanggal Lahir</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="date" class="<?= form_error('tgl_lahir') ? 'input-invalid' : 'input' ?>" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" required>
							<?= form_error('tgl_lahir', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- kelamin -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Jenis Kelamin</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<label class="radio-mhs">
								<input type="radio" class="radio-mhs" name="kelamin" id="laki-laki" value="Laki-laki" <?= set_radio('kelamin', 'Laki-laki') ?>> Laki-laki
							</label>&nbsp
							<label class="radio-mhs">
								<input type="radio" class="radio-mhs" name="kelamin" id="perempuan" value="Perempuan" <?= set_radio('kelamin', 'Perempuan') ?>> Perempuan
							</label>
							<?= form_error('kelamin', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- alamat -->
					<tr>
						<td  class="td-label-mhs"><li class="label-mhs">Alamat</li></td>
						<td>
							<div class="d-flex" style="align-items: flex-start;">
								<b class="label-mhs m-0 mr-10">: &nbsp&nbsp</b>
								<textarea class="<?= form_error('alamat') ? 'input-invalid' : 'input' ?>" name="alamat" id="alamat" cols="25" rows="4" placeholder="Maks. 100 karakter" maxlength="100" 
								style="resize: none" required><?= set_value('alamat') ?></textarea>
							</div>
							<?= form_error('alamat', '<div class="text-tomato font-weight-bolder">', '</div>') ?>
						</td>
					</tr>
					<!-- /.alamat -->

					<!-- no. telepon -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">No. Telepon</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="tel" class="<?= form_error('no_telepon') ? 'input-invalid' : 'input' ?>" name="no_telepon" id="no_telepon" placeholder="Maks. 15 digit" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?= set_value('no_telepon') ?>" required>
							<?= form_error('no_telepon', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- select program studi -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Program Studi</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<select class="<?= form_error('program_studi') ? 'input-invalid' : 'input' ?>"  name="program_studi" id="program_studi" required>
								<option value="" selected disabled hidden>Pilih Program Studi</option>
								<?php foreach ($program_studi as $prodi) : ?>
								<option value="<?= $prodi ?>" <?= set_select('program_studi', $prodi) ?>>
									<?= $prodi ?>
								</option>
								<?php endforeach?>
							</select>
							<?= form_error('program_studi', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>
					</ul>
					<!-- /.ul input -->

					<!-- buttons -->
					<td colspan="2" align="center">
						<br>

						<button type="submit" class="btn-submit">
							<b>Simpan <i class="fas fa-save"></i></b>
						</button>&nbsp&nbsp

						<script type="text/javascript">
							function bersih() {
								// mengosongkan field
								document.getElementById('nim').value = ''; 
								document.getElementById('nama').value = '';
								document.getElementById('tpt_lahir').value = '';
								document.getElementById('tgl_lahir').value = '';
								document.getElementById('alamat').value = '';
								document.getElementById('no_telepon').value = '';
								document.getElementById('laki-laki').checked = false;
								document.getElementById('perempuan').checked = false;
								document.getElementById('program_studi').selectedIndex = 0;
							}
						</script>

						<button type="button" class="btn-reset" onclick="bersih()">
							<b>Bersih <i class="fas fa-broom"></i></b>
						</button>
					</td>
					<!-- buttons -->
					</form>
				</table>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->

		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- /.wrapper -->
</body>
</html>