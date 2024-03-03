<?php
include 'config.php';

    $id=$_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $query=mysqli_query($conn,$sql);
    if($query)
        echo "<script language='JavaScript'>
                    (window.alert('Data Orang sudah dihapus'))
                    location.href='view_data.php'
              </script>";

    else
    echo "<script language='JavaScript'>
                    (window.alert('Data Orang Tidak Dapat dihapus'))
                    location.href='view_data.php'
          </script>";
?>