<!DOCTYPE html>
<html>

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

  	<div class="wrapper">
    	<?php 
	    $this->load->view('templates/navbar');
	    $this->load->view('templates/sidebar'); 
	    ?>

		<div class="content-wrapper">
        	<div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px">
			    <table align="center" border="0" cellspacing ="10" cellpadding="15">

			    	<!-- form header -->
					<tr>
						<td colspan="2" align="center">
							<img class="img-input-mhs" src="<?= base_url('assets/img/laptop_input.png') ?>"><br><br>
							<!-- title -->	
							<h2 class="header-input-mhs">
								<i class="fas fa-pen"></i> Ubah Data Mahasiswa
							</h2>
							<!-- flashdata -->
							<?php if ($this->session->flashdata('mahasiswa_updated')) : ?>
							<div align="center" class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 380px">
								<h4><?= $this->session->flashdata('mahasiswa_updated') ?> 👍</h4>
								<?php $this->session->unset_userdata('mahasiswa_updated') ?>
								<button title="close this notification" type="button" class="close" data-dismiss="alert" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?php endif ?>
						</td>
					</tr>
					<!-- /.form header -->

					<form method="POST">
					<ul>
					<!-- nim -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">NIM</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input class="<?= form_error('nim') || $this->session->flashdata('nim_duplicated') ? 'input-invalid' : 'input' ?>" type="text" name="nim" id="nim" placeholder="Maks. 10 digit (tidak kurang dari '0')" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?= set_value('nim', $mahasiswa['nim']) ?>" required>
							<?= form_error('nim', '<div class="text-tomato font-weight-bold">', '</div>') ?>

							<!-- if the submitted NIM is alredy taken... -->
							<?php if ($this->session->flashdata('nim_duplicated')) : ?>
							<br>
							<div class="text-tomato font-weight-bold">
								<?= $this->session->flashdata('nim_duplicated') ?>
								<?php $this->session->unset_userdata('nim_duplicated') ?>
							</div>
							<?php endif ?>
						</td>
					</tr>

					<!-- nama -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Nama</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input class="<?= form_error('nama') ? 'input-invalid' : 'input' ?>" type="text" name="nama" id="nama" maxlength="30" placeholder="Maks. 30 karakter" value="<?= set_value('nama', $mahasiswa['nama']) ?>" required>
							<?= form_error('nama', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- tempat lahir -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Tempat Lahir</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="text" class="<?= form_error('tpt_lahir') ? 'input-invalid' : 'input' ?>" name="tpt_lahir" id="tpt_lahir" maxlength="30" placeholder="Maks. 30 karakter" value="<?= set_value('tpt_lahir', $mahasiswa['tpt_lahir']) ?>" required>
							<?= form_error('tpt_lahir', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- tanggal lahir -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Tanggal Lahir</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="date" class="<?= form_error('tgl_lahir') ? 'input-invalid' : 'input' ?>" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir', $mahasiswa['tgl_lahir']) ?>" required>
							<?= form_error('tgl_lahir', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- jenis kelamin -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Jenis Kelamin</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<label class="radio-mhs">
								<input type="radio" class="radio-mhs" name="kelamin" id="laki-laki" value="Laki-laki" <?= set_radio('kelamin', 'Laki-laki', $mahasiswa['kelamin'] == 'Laki-laki' ? TRUE : FALSE) ?>> Laki-laki
							</label>&nbsp
							<label class="radio-mhs">
								<input type="radio" class="radio-mhs" name="kelamin" id="perempuan" value="Perempuan" <?= set_radio('kelamin', 'Perempuan', $mahasiswa['kelamin'] == 'Perempuan' ? TRUE : FALSE) ?>> Perempuan
							</label>
							<?= form_error('kelamin', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- input alamat -->
					<tr>
						<td  class="td-label-mhs"><li class="label-mhs">Alamat</li></td>
						<td>
							<div class="d-flex" style="align-items: flex-start">
								<b class="label-mhs m-0 mr-10">: &nbsp&nbsp</b>
								<textarea class="<?= form_error('alamat') ? 'input-invalid' : 'input' ?>" name="alamat" id="alamat" maxlength="100" cols="25" rows="4" placeholder="Maks. 100 karakter" 
								style="resize: none" required><?= set_value('alamat', $mahasiswa['alamat']) ?></textarea>
							</div>
							<?= form_error('alamat', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- no. telepon -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">No. Telepon</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<input type="tel" class="<?= form_error('no_telepon') ? 'input-invalid' : 'input' ?>" name="no_telepon" id="no_telepon" maxlength="15" placeholder="Maks. 15 digit" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?= set_value('no_telepon', $mahasiswa['no_telepon']) ?>" required>
							<?= form_error('no_telepon', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>

					<!-- program studi -->
					<tr>
						<td class="td-label-mhs"><li class="label-mhs">Program Studi</li></td>
						<td>
							<b class="label-mhs">: &nbsp</b>
							<select class="<?= form_error('program_studi') ? 'input-invalid' : 'input' ?>"  name="program_studi" id="program_studi" required>
								<option value="" selected disabled hidden>Pilih Program Studi</option>
								<?php foreach ($program_studi as $prodi) : ?>
								<option value="<?= $prodi ?>" <?= set_select('program_studi', $prodi, $prodi == $mahasiswa['program_studi'] ? TRUE : FALSE) ?>>
									<?= $prodi ?>
								</option>
								<?php endforeach ?>
							</select>
							<?= form_error('program_studi', '<div class="text-tomato font-weight-bold">', '</div>') ?>
						</td>
					</tr>
					</ul>
					<!-- /.ul input -->

					<!-- buttons -->
					<td colspan="2" align="center">
						<br>
						<button title="Submit data" type="submit" class="btn-submit">
							<b>Ubah <i class="fas fa-save"></i></b>
						</button>&nbsp &nbsp

						<script type="text/javascript">
							function resetValue() {
								// mereset field <input> ke value semula
								document.getElementById('nim').value = '<?= $mahasiswa['nim'] ?>'; 
								document.getElementById('nama').value = '<?= $mahasiswa['nama'] ?>';
								document.getElementById('tpt_lahir').value = '<?= $mahasiswa['tpt_lahir'] ?>';
								document.getElementById('tgl_lahir').value = '<?= $mahasiswa['tgl_lahir'] ?>'
								document.getElementById('alamat').value = '<?= $mahasiswa['alamat'] ?>';
								document.getElementById('no_telepon').value = '<?= $mahasiswa['no_telepon'] ?>';

								// mereset field <input type="radio"> ke value semula
								<?php if ($mahasiswa['kelamin'] == 'Laki-laki') : ?> 
								document.getElementById('laki-laki').checked = true;
								<?php elseif ($mahasiswa['kelamin'] != 'Laki-laki') : ?>
								document.getElementById('laki-laki').checked = false;
								<?php endif ?>

								<?php if ($mahasiswa['kelamin'] == 'Perempuan') : ?>
								document.getElementById('perempuan').checked = true;
								<?php elseif ($mahasiswa['kelamin'] != 'Perempuan') : ?>
								document.getElementById('perempuan').checked = false;
								<?php endif ?>

								// mereset <select> ke value semula
								<?php if($mahasiswa['program_studi'] == 'Manajemen Informatika') : ?>
								document.getElementById('program_studi').selectedIndex = 1;
								<?php elseif($mahasiswa['program_studi'] == 'Sistem Informasi') : ?>
								document.getElementById('program_studi').selectedIndex = 2;
								<?php elseif($mahasiswa['program_studi'] == 'Teknik Komputer') : ?>
								document.getElementById('program_studi').selectedIndex = 3;
								<?php endif ?>
							};

							// mengosongkan field
							function bersih() {
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

						<button title="Set the form fields to its default value (the field value before the form submitted)" type="button" class="btn-reset" onclick="resetValue()">
							<b>Reset <i class="fas fa-eraser"></i></b>
						</button>&nbsp&nbsp

						<button title="Emtpy the form fields" type="button" class="btn-reset" onclick="bersih()">
							<b>Bersih <i class="fas fa-broom"></i></b>
						</button>
					</td>
					<!-- buttons -->
					</form>
					<!-- /.form -->
				</table>
				<!-- /.table -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->

		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- wrapper -->
</body>
</html>