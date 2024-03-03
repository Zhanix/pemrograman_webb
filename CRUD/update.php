<?php
include 'config.php';
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$brs= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Jurusan</title>
	<style>
		body {
    font-family: Arial, sans-serif;
    background-color: aquamarine;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: 20px auto;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #b38c00;
    color: white;
}
.gambar:hover {
	color: white;
    text-decoration: underline;
    
}
.gambar{
    background-color: #b50526;
	color:white;
}


.submit:hover {
    color: white;
    text-decoration: underline;
    
}
.submit{
    background-color: #048230;
	color:white;
}

	</style>
</head>
<body>
<h2 align="center">Edit Users
</h2>
<form method="POST" enctype="multipart/form-data">
<table border="1" width="60%" align="center">
<tr>
		<td width="25%">Nama: </td>
		<td width="75%">
			<input type="text" name="nama" size="60%" required>
		</td>
	</tr>
    <tr>
		<td width="25%">Email: </td>
		<td width="75%">
			<input type="email" name="email" size="60%" required>
		</td>
	</tr>
    <tr>
		<td width="25%">No hp: </td>
		<td width="75%">
			<input type="number" name="mobile" size="60%" required>
		</td>
	</tr>
	<tr>
    <tr>
		<td width="25%">Gambar</td>
		<td width="75%">
            <input type="file" name="gambar" required  accept="image/*">
		</td>
	</tr>
	<tr>
		<td width="25%"></td>
		<td width="75%">
			<input type="submit" name="save" value="Simpan" class="submit">
		</td>
	</tr>
</table>
</form>
<?php 
if(isset($_POST['save'])){
	$nama= $_POST['nama'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
	$filename = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    unlink($folder . $gambar_name);

    $gambar_name = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "uploads/";
	
    move_uploaded_file($gambar_tmp, $gambar_path . $gambar_name);

	$qry="UPDATE users SET name= '$nama',email='$email',mobile='$mobile',gambar='$gambar_name'
		  WHERE id=$id";
	$hasil = mysqli_query($conn,$qry);
	if($hasil){
	echo "<script language='JavaScript'>
  	  			(window.alert('Data USERS sudah diUpdate'))
  	  			location.href='index.php'
  	  			</script>";

	}else{
		echo "<script language='JavaScript'>
  	  			(window.alert('Data users tidak dapat diUpdate'))
  	  			location.href='index.php'
  	  			</script>";
	}
}
?>
</body>
</html>