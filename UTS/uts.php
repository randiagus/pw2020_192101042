<!DOCTYPE html>
<html>
<head>
	<title>Nusantara Computer Center</title>
</head>
<body>
	<h2 style="text-align: center;">Nusantara Computer Center</h2>
	<form method = 'post'>
		<table style="margin-left: auto;margin-right: auto;">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type='text' name='nama'></td>
			</tr>
			<tr>
				<td>Kode Pendaftaran</td>
				<td>:</td>
				<td>
					<select name="kode_Pendaftaran" style="width: 175px;">
						<option value="">--Kode Pendaftaran--</option>
						<option value="VBSK00108">VBSK00108</option>
						<option value="DPSJ00210">DPSJ00210</option>
						<option value="LXSM10105">LXSM10105</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<select name="kelas" style="width: 175px;">
						<option value="">--Kelas--</option>
						<option value="Reguler">Reguler</option>
						<option value="Privat">Privat</option>
					</select>
				</td>
				<td>Jumlah Pertemuan</td>
				<td>:</td>
				<td><input type='text' name='jumlahPertemuan' style="width: 50px;"></td>
				<td>kali</td>
			</tr>
			<tr>
				<td>Jumlah Peserta</td>
				<td>:</td>
				<td><input type='text' id='jumlahPeserta' name='jumlahPeserta' style="width: 50px;"> Orang</td>
			</tr>
			<tr>
				<td>Hasil Test Awal</td>
				<td>:</td>
				<td>
					<select name="hslText" style="width: 175px;">
						<option value="">--Hasil Test Awal--</option>
						<option value="Grade A">Grade A</option>
						<option value="Grade B">Grade B</option>
						<option value="Grade C">Grade C</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type='submit' name="submit" value='Proses'style="margin: 10px;"><input type='submit' value='Ulang'></td>
			</tr>
		</table>  
	</form>
	<br>
	<br>
	
	<?php 
	if (isset($_POST['submit'])) {
		echo '<h2 style="text-align: center;">Nusantara Computer Center</h2>';
		echo '<h4 style="text-align: center;">Kode Pendaftaran : <label id="hasilKdPendaftaran">'.$_POST['kode_Pendaftaran'].'</label></h4>';
		echo '<table style="margin-left: auto;margin-right: auto;">';
		echo '<tr>';
		echo '<td>Nama</td>';
		echo '<td>:</td>';
		echo '<td>'.$_POST['nama'].'</td>';

		$jenis_kursus = substr($_POST['kode_Pendaftaran'], 0, 2);
		if ($jenis_kursus == 'LX') {
			$newJenisKursus = 'Sistem Operasi';
		}else {
			$newJenisKursus = 'Pemrograman';
		}

		echo '<td>Jenis Kursus</td>';
		echo '<td>:</td>';
		echo '<td>'.$newJenisKursus.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Kelas</td>';
		echo '<td>:</td>';
		echo '<td>'.$_POST['kelas'].'</td>';

		$noUrut = substr($_POST['kode_Pendaftaran'], 4, 3);

		echo '<td>No. Urut</td>';
		echo '<td>:</td>';
		echo '<td>'.$noUrut.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Hasil Test Awal</td>';
		echo '<td>:</td>';
		echo '<td>'.$_POST['hslText'].'</td>';

		$hari = substr($_POST['kode_Pendaftaran'], 3, 1);
		if ($hari == 'K') {
			$newHari = 'Kamis';
		}else if($hari == 'J') {
			$newHari = "Jum'at";
		}else {
			$newHari = 'Minggu';
		}

		echo '<td>Hari</td>';
		echo '<td>:</td>';
		echo '<td>'.$newHari.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Jumlah Peserta</td>';
		echo '<td>:</td>';
		echo '<td>'.$_POST['jumlahPeserta'].' Orang</td>';
		echo '<td>Jumlah Pertemuan</td>';
		echo '<td>:</td>';
		echo '<td>'.$_POST['jumlahPertemuan'].' Kali</td>';
		echo '</tr>';

		$biayaKursus = substr($_POST['kode_Pendaftaran'], 0, 2);
		if ($biayaKursus == 'VB') {
			$newBiayaKursus = 750000;
		}else if($biayaKursus == 'DP') {
			$newBiayaKursus = 650000;
		}else {
			$newBiayaKursus = 800000;
		}

		$newBiayaKursus = $newBiayaKursus * $_POST['jumlahPeserta'];


		echo '<tr>';
		echo '<td>Biaya Kursus</td>';
		echo '<td>:</td>';
		echo '<td>Rp. '.number_format($newBiayaKursus,2,",",".").'</td>';

		if ($_POST['kelas'] == 'Privat') {
			if ($_POST['jumlahPeserta'] > 5) {
				$biayaTambahan = 75000 * $_POST['jumlahPeserta'];
			}else{
				$biayaTambahan = 200000 * $_POST['jumlahPeserta'];
			}
		}else{
			if ($_POST['jumlahPeserta'] < 10) {
				$biayaTambahan = 50000 * $_POST['jumlahPeserta'];
			}else{
				$biayaTambahan = 0;
			}
		}

		echo '<td>Biaya Tambahan</td>';
		echo '<td>:</td>';
		echo '<td>Rp. '.number_format($biayaTambahan,2,",",".").'</td>';
		echo '</tr>';

		if ($_POST['hslText'] == 'Grade A') {
			$biayaSubsidi = (5/100) * $newBiayaKursus;
		}else if ($_POST['hslText'] == 'Grade B') {
			$biayaSubsidi = (2/100) * $newBiayaKursus;
		}else {
			$biayaSubsidi = 0;
		}


		echo '<tr>';
		echo '<td>Biaya Subsidi</td>';
		echo '<td>:</td>';
		echo '<td>Rp. '.number_format($biayaSubsidi,2,",",".").'</td>';

		$totalBiaya = $newBiayaKursus + $biayaTambahan - $biayaSubsidi;

		echo '<td>Biaya Yang Dibayar</td>';
		echo '<td>:</td>';
		echo '<td>Rp. '.number_format($totalBiaya,2,",",".").'</td>';
		echo '</tr>';
		echo '</table>';
	}

	?>
</body>
</html>