<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penduduk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 60%;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h2>Tambah Data</h2>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td align="right">Nama :</td>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td align="right">Nomor Telepon :</td>
                <td>
                    <input type="text" name="tel" required>
                </td>
            </tr>
            <tr>
                <td align="right">Email :</td>
                <td>
                    <input type="email" name="email" required>
                </td>
            </tr>
            <tr>
                <td align="right">Gambar :</td>
                <td>
                    <input type="file" name="gambar" accept="image/*" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="save" value="Simpan">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['save'])) {
        $nama = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        // Menangani pengunggahan gambar
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = "uploads/";

        move_uploaded_file($gambar_tmp, $gambar_path . $gambar_name);

        // Selanjutnya, sertakan path gambar ini dalam query SQL
        $qry = "INSERT INTO users (name, mobile, email, gambar) VALUES ('$nama', '$tel', '$email', '$gambar_name');";
        $hasil = mysqli_query($conn, $qry);

        if ($hasil) {
            echo "<script language='JavaScript'>
                    (window.alert('Data Penduduk Sudah Di Simpan'))
                    location.href='view_data.php'
                  </script>";
        } else {
            echo "<script language='JavaScript'>
                    (window.alert('Data Penduduk Tidak dapat di simpan'))
                    location.href='view_data.php'
                  </script>";
        }
    }
    ?>
</body>
</html>
