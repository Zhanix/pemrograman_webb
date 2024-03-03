<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Orang</title>
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

        a {
            display: block;
            text-align: center;
            margin: 20px 0;
            text-decoration: none;
            font-weight: bold;
            color: #3498db;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }

        td a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <a href="index.php">Add Orang</a>
    <h2>Data Orang</h2>
    
    <?php
    $result = mysqli_query($conn, "SELECT * FROM users");
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['mobile'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td><img src= 'uploads/" . $row['gambar'] . "' width='100' height='100'></td>
                    <td>
                        <a href='update.php?id=" . $row['id'] . "'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                    </td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p align='center'>Tidak ada data orang.</p>";
    }
    ?>
</body>
</html>
