<?php 

/******************************************
PRAKTIKUM RPL
******************************************/

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke data_mobil
		$query = "SELECT * FROM data_mobil";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	// memasukan data ke data_mobil
	function insertTask($icode_produksi, $imerk, $iwarna, $ijenis_mobil, $idealer_mobil, $iuji_layak_pakai){
		// query insert
		$sql_add = "INSERT INTO data_mobil  
				(code_produksi, merk, warna, jenis_mobil, dealer_mobil, uji_layak_pakai) VALUES  
				('$icode_produksi', '$imerk', '$iwarna', '$ijenis_mobil', '$idealer_mobil', '$iuji_layak_pakai')";

		return $this->execute($sql_add);
		
	}

	// hapus data dari data_mobil
	function delete($data){
		// query delete dari code_produksi yang dipilih
        $sql = "DELETE FROM data_mobil WHERE code_produksi=$data";

		return $this->execute($sql);
    }

	// update status 
	function update($data){

		$sql = "UPDATE data_mobil SET uji_layak_pakai='Sudah Layak' WHERE code_produksi=$data";

		return $this->execute($sql);
	}

}



?>
