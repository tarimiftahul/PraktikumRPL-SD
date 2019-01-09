<!DOCTYPE html>
<html>
<head>
<title>Search Engine</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<center>
<form action="" method="post">
<img width=100 height=150 src='gambar1.png'>
<img width=50 height=100 src='gambar2.png'>
<img width=70 height=100 src='gambar5.png'>
<img width=90 height=100 src='gambar6.png'>
<img width=90 height=100 src='gambar7.png'>
<img width=90 height=100 src='gambar8.png'>
<p></p>
<input type="text" id="searchquery" size="60" name="keyword" placeholder="Search..." />
<input type="submit" id="searchbutton" value="Search" name="Search" class="formbutton" />
</form>

<?php
include 'koneksi.php';
echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" />";

if (isset($_POST['keyword'])){
    //variable
    $keyword = $_POST['keyword'];
	$keyword_new = strtolower(str_replace(" ", "%",$keyword));
	
    $query =mysql_query("SELECT * FROM hadits WHERE lower(ayat) LIKE '%$keyword_new%' OR lower(artinya) LIKE '%$keyword_new%'");
    $row = mysql_num_rows($query);
    //cek apakah ada satu  
    if ($row==0){
        ?>
        <center><h3>404 NOT FOUND</h3></center>
        <?php  
    }
    else{
        ?>
        <center><h2>Menampilkan <?php echo $row;?> Data</h2></center>

        <table>
        <tr class="nol">
				<th class="main">NO</th>
                <th class="main">Jenis Hadits</th>
                <th class="main">Ayat</th>
                <th class="main">Artinya</th>

        </tr>

							<?php
                   $name_char=75;
                    while($data=mysql_fetch_array($query))
                    {
					$text=$data['artinya'];
                    $teks=$data['ayat'];
					echo'
							<tr>
					<td>'; echo $data['id_hadits']; echo'</td>
					<td>'; echo $data['jenis_hadits']; echo'</td>
					<td><a href="detail.php?idd='; echo $data['id_hadits'];echo'">'; echo substr($teks, 0, $name_char). '...';
                    echo'</a></td>
                    <td><a href="detail.php?idd='; echo $data['id_hadits'];echo'">';echo substr($text, 0, $name_char). '...';
					echo'</td></tr>';
		
                    $data++;
                    }?>
        </table>
		
<?php
}}
?>
</center>
</body>
<p style= "text-align: center;";>&copy; 1157050042 Dewi Pardah Ningrum || 1157050158 Siti Aisyah || 1157050166 Tari Miftahul Jannah || 1157050182 Yuliyanti</p>
</html>