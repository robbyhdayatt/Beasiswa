<?php
include '../functions.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_pendaftar WHERE id=$id";
if ($conn->query($query) === TRUE) {
    header("Location: lihat_pendaftar.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
