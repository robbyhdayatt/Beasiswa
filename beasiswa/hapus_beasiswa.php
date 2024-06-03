<?php
include '../functions.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_beasiswa WHERE id=$id";
if ($conn->query($query) === TRUE) {
    header("Location: lihat_beasiswa.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>
