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
//koneksi
$koneksi = new mysqli('localhost','root','','pencarian_data');
if (isset($_POST['Search'])){
    //variable
    $keyword = $_POST['keyword'];
    $query = $koneksi->query("SELECT * FROM data WHERE nama_barang LIKE '%$keyword%' OR merek_barang LIKE '%$keyword%'");
    $row = mysqli_num_rows($query);
    //cek apakah ada satu  
    if ($row==0){
        ?>
        <center><h3>404 NOT FOUND</h3></center>
        <?php  
    }
    else{
        ?>
        <center><h3>menampilkan <?php echo $row;?> data.</h3></center>
        <?php
        ?>
        <table>
        <tr class="nol">
                <td class="main">NO</td>
                <td class="main">Nama Barang</td>
                <th class="main">Merek Barang</td>
                <td class="main">Tanggal Pengiriman</td>
        </tr>
        <?php
        foreach ($query as $rows){
        @$no++;
        $nama_barang = $rows['nama_barang'];
        $merek_barang = $rows['merek_barang'];
        $tgl_barang = date('d M Y', strtotime($rows['tgl_pengiriman']));
        ?>
        <tr class="nol1">
        <td class="main2"><?php echo $no;?></td>
        <td class="main2"><a href="detail.php"><?php echo $nama_barang;?></a></td>
        <td class="main2"><?php echo $merek_barang;?></td>
        <td class="main2"><?php echo $tgl_barang;?></td>
        </tr>
        <?php
        }
        ?>
        </table>
        <?php
    }
}
?>
</center>
</body>
</html>