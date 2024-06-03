<?php
include '../functions.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_kriteria WHERE id=$id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $beasiswa_id = $_POST['beasiswa_id'];
    $kriteria = $_POST['kriteria'];

    $query = "UPDATE tb_kriteria SET beasiswa_id='$beasiswa_id', kriteria='$kriteria' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        header("Location: lihat_kriteria.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kriteria</title>
</head>
<body>
    <form method="POST" action="">
        Beasiswa: <input type="number" name="beasiswa_id" value="<?= $row['beasiswa_id'] ?>"><br>
        Kriteria: <input type="text" name="kriteria" value="<?= $row['kriteria'] ?>"><br>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>
