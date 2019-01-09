<?php
// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';
	
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';
	
	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
	// Buat query Insert
	$query = "INSERT INTO hadits VALUES";
	
	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$jenis_hadits = $row['A']; // Ambil data NIS
		$ayat = $row['B']; // Ambil data nama
		$artinya = $row['C']; // Ambil data jenis kelamin
		
		
		// Cek jika semua data tidak diisi
		if(empty($jenis_hadits) && empty($ayat) && empty($artinya))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Tambahkan value yang akan di insert ke variabel $query
			$query .= "(null,'".$jenis_hadits."','".$ayat."','".$artinya."'),";
		}
		
		$numrow++; // Tambah 1 setiap kali looping
	}
	
	// Kita hilangkan tanda koma di akhir query
	// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
	// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
	$query = substr($query, 0, strlen($query) - 1).";";
	
	// Eksekusi $query
	mysqli_query($connect, $query);
}

header('location: index.php'); // Redirect ke halaman awal
?>
