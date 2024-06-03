<?php
include '../functions.php';

if (isset($_POST['submit'])) {
    $beasiswa_id = $_POST['beasiswa_id'];
    $kriteria = $_POST['kriteria'];

    $query = "INSERT INTO tb_kriteria (beasiswa_id, kriteria) VALUES ('$beasiswa_id', '$kriteria')";
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
    <title>Tambah Kriteria</title>
</head>
<body>
    <form method="POST" action="">
        Beasiswa: <input type="number" name="beasiswa_id"><br>
        Kriteria: <input type="text" name="kriteria"><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>
