<?php
include '../db.php';
include '../templates/header.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action === 'create' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $siswa_id = $_POST['siswa_id'];
    $beasiswa_id = $_POST['beasiswa_id'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $status = $_POST['status'];

    $sql = "INSERT INTO Pendaftaran (siswa_id, beasiswa_id, tanggal_daftar, status) VALUES ('$siswa_id', '$beasiswa_id', '$tanggal_daftar', '$status')";
    if ($conn->query($sql) === TRUE) {
        header('Location: pendaftaran.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($action === 'edit' && $id) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $siswa_id = $_POST['siswa_id'];
        $beasiswa_id = $_POST['beasiswa_id'];
        $tanggal_daftar = $_POST['tanggal_daftar'];
        $status = $_POST['status'];

        $sql = "UPDATE Pendaftaran SET siswa_id='$siswa_id', beasiswa_id='$beasiswa_id', tanggal_daftar='$tanggal_daftar', status='$status' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: pendaftaran.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "SELECT * FROM Pendaftaran WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
}

if ($action === 'delete' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Pendaftaran WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: pendaftaran.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php if ($action === 'create' || ($action === 'edit' && isset($row))): ?>
    <form method="POST" action="crud_pendaftaran.php?action=<?php echo $action; ?><?php echo $id ? '&id=' . $id : ''; ?>">
        <input type="text" name="siswa_id" placeholder="Siswa ID" value="<?php echo isset($row) ? $row['siswa_id'] : ''; ?>" required>
        <input type="text" name="beasiswa_id" placeholder="Beasiswa ID" value="<?php echo isset($row) ? $row['beasiswa_id'] : ''; ?>" required>
        <input type="date" name="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo isset($row) ? $row['tanggal_daftar'] : ''; ?>" required>
        <input type="text" name="status" placeholder="Status" value="<?php echo isset($row) ? $row['status'] : ''; ?>" required>
        <button type="submit"><?php echo $action === 'create' ? 'Tambah' : 'Update'; ?> Pendaftaran</button>
    </form>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
