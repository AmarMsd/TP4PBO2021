<?php

/******************************************
PRAKTIKUM RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// masukkan data
if(isset($_POST['add'])){
	$merk = $_POST['merk'];
	$kode_produksi = $_POST['kode_produksi'];
	$warna = $_POST['warna'];
	$dealer_mobil = $_POST['dealer_mobil'];
	$jenis_mobil = $_POST['jenis'];
	$uji_layak = "Belum Layak";

	$otask->insertTask($kode_produksi, $merk, $warna, $dealer_mobil, $jenis_mobil, $uji_layak);

	
	header('Location: index.php');
}

if(isset($_GET['code_produksi_hapus'])){
	$code_produksi = $_GET['code_produksi_hapus'];
	$otask->delete($code_produksi);

        header('Location: index.php');
}

// update status data mobil
if(isset($_GET['code_produksi_status'])){
	$code_produksi = $_GET['code_produksi_status'];
	$otask->update($code_produksi);

	header('Location: index.php');
}

$otask->getTask();

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($code_produksi, $merk, $warna, $jenis_mobil, $dealer_mobil, $uji_layak) = $otask->getResult()) {
	// Tampilan jika status nya sudah lulus
	if($uji_layak == "Sudah Layak"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $code_produksi . "</td>
		<td>" . $merk . "</td>
		<td>" . $warna . "</td>
		<td>" . $dealer_mobil . "</td>
		<td>" . $jenis_mobil . "</td>
		<td>" . $uji_layak . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?code_produksi_hapus=" . $code_produksi . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status nya belum lulus
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $code_produksi . "</td>
		<td>" . $merk . "</td>
		<td>" . $warna . "</td>
		<td>" . $dealer_mobil . "</td>
		<td>" . $jenis_mobil . "</td>
		<td>" . $uji_layak . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?code_produksi_hapus=" . $code_produksi . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?code_produksi_status=" . $code_produksi .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}


// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Menutup koneksi database
$otask->close();


// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();
