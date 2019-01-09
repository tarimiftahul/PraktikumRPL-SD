
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data Hadist Melalui Excel</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
	</head>
	<body>
		<!-- Membuat Menu Header / Navbar -->
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#" style="color: white;"><b>Import Data Hadist Melalui Excel</b></a>
				</div>
				<p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
					
				</p>
			</div>
		</nav>
		
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- 
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
			<a href="form.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>
			
			<h3>Data Hasil Import</h3>
			
			<hr>
			
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Jenis Hadits</th>
						<th>Ayat</th>
						<th>Artinya</th>

					</tr>
					<?php
					// Load file koneksi.php
					include "koneksi.php";
					
					// Buat query untuk menampilkan semua data siswa
					$sql = mysqli_query($connect, "SELECT * FROM hadits");
					
					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['jenis_hadits']."</td>";
						echo "<td>".$data['ayat']."</td>";
						echo "<td>".$data['artinya']."</td>";
						
						echo "</tr>";
						
						$no++; // Tambah 1 setiap kali looping
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
