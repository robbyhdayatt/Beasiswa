<?php
include '../functions.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_pengumuman WHERE id=$id";
if ($conn->query($query) === TRUE) {
    header("Location: lihat_pengumuman.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
