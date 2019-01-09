<!DOCTYPE html>
<html>
<head>
<title>Search Engine</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<center>
<form action="" method="post">
<input type="text" id="searchquery" size="60" name="keyword" placeholder="Search..." />
<input type="submit" id="searchbutton" value="Search" name="Search" class="formbutton" />
</form>

<?php
include 'koneksi.php';

if (isset($_POST['Search'])){
    //variable
    $keyword = $_POST['keyword'];
	
    $query =mysql_query("SELECT * FROM data WHERE nama_barang LIKE '%$keyword%' OR merek_barang LIKE '%$keyword%'");
    $row = mysql_num_rows($query);
    //cek apakah ada satu  
    if ($row==0){
        ?>
        <center><h3>404 NOT FOUND</h3></center>
        <?php  
    }
    else{
        ?>
        <center><h3>menampilkan <?php echo $row;?> data.</h3></center>

        <table>
        <tr class="nol">
                <td class="main">NO</td>
                <td class="main">Nama Barang</td>
                <th class="main">Merek Barang</td>

        </tr>

							<?php
                   $name_char=5;
                    while($data=mysql_fetch_array($query))
                    {
					$text=$data['merek_barang'];
					echo'
							<tr>
					<td>'; echo $data['kode_barang']; echo'</br>
					
					<a href="detail.php?idd='; echo $data['kode_barang'];echo'">'; echo $data['nama_barang']; echo'</a></br>
                    '; echo substr($text, 0, $name_char). '...';
					echo'</br></tr>';
		
                    $data++;
                    }?>
        </table>
<?php
}}
?>
</center>
</body>
</html>