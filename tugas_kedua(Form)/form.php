<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="proses.php" method="POST">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="nim">NIM:</label>
    <input type="number" id="NIM" name="NIM">

    <input type="submit" value="Kirim">
  </form>
</body>
</html>