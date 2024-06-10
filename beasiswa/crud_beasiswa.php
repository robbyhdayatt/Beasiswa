<?php
include '../db.php';
include '../templates/header.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action === 'create' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $batas_pendaftaran = $_POST['batas_pendaftaran'];

    $sql = "INSERT INTO Beasiswa (nama, deskripsi, jumlah, batas_pendaftaran) VALUES ('$nama', '$deskripsi', '$jumlah', '$batas_pendaftaran')";
    if ($conn->query($sql) === TRUE) {
        header('Location: beasiswa.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($action === 'edit' && $id) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $jumlah = $_POST['jumlah'];
        $batas_pendaftaran = $_POST['batas_pendaftaran'];

        $sql = "UPDATE Beasiswa SET nama='$nama', deskripsi='$deskripsi', jumlah='$jumlah', batas_pendaftaran='$batas_pendaftaran' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: beasiswa.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "SELECT * FROM Beasiswa WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
}

if ($action === 'delete' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Beasiswa WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: beasiswa.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php if ($action === 'create' || ($action === 'edit' && isset($row))): ?>
    <form method="POST" action="crud_beasiswa.php?action=<?php echo $action; ?><?php echo $id ? '&id=' . $id : ''; ?>">
        <input type="text" name="nama" placeholder="Nama" value="<?php echo isset($row) ? $row['nama'] : ''; ?>" required>
        <textarea name="deskripsi" placeholder="Deskripsi" required><?php echo isset($row) ? $row['deskripsi'] : ''; ?></textarea>
        <input type="number" name="jumlah" placeholder="Jumlah" value="<?php echo isset($row) ? $row['jumlah'] : ''; ?>" required>
        <input type="date" name="batas_pendaftaran" placeholder="Batas Pendaftaran" value="<?php echo isset($row) ? $row['batas_pendaftaran'] : ''; ?>" required>
        <button type="submit"><?php echo $action === 'create' ? 'Tambah' : 'Update'; ?> Beasiswa</button>
    </form>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
