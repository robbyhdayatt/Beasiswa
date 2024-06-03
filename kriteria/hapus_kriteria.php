<?php
include '../functions.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_kriteria WHERE id=$id";
if ($conn->query($query) === TRUE) {
    header("Location: lihat_kriteria.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
