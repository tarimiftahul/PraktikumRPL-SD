<?php
include 'koneksi.php';
$idd=$_GET['idd'];
$q=mysql_query("SELECT * FROM hadits WHERE id_hadits='$idd'");
$data=mysql_fetch_array($q);

?>

<html>
<head>
<title>Detail</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body style= "font-family: 'Vidaloka', sans-serif; ";>
<center>
	<h3 style= "text-align: center; width:60%;  border-bottom: 6px solid green; background-color: lightgrey;"; ><?php echo $data['jenis_hadits'];?></h3></br>
	<h3 style= "text-align: right; width:60%"><?php echo $data['ayat'];?></h3></br>
	<h3 style= "text-align: left; width:60%"><?php echo $data['artinya'];?></h3></br>

</center>
</body>
</html>