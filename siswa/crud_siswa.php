<?php
include '../db.php';
include '../templates/header.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action === 'create' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Siswa (nama, alamat, tanggal_lahir, email) VALUES ('$nama', '$alamat', '$tanggal_lahir', '$email')";
    if ($conn->query($sql) === TRUE) {
        header('Location: siswa.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($action === 'edit' && $id) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];

        $sql = "UPDATE Siswa SET nama='$nama', alamat='$alamat', tanggal_lahir='$tanggal_lahir', email='$email' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: siswa.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "SELECT * FROM Siswa WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
}

if ($action === 'delete' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Siswa WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: siswa.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php if ($action === 'create' || ($action === 'edit' && isset($row))): ?>
    <form method="POST" action="crud_siswa.php?action=<?php echo $action; ?><?php echo $id ? '&id=' . $id : ''; ?>">
        <input type="text" name="nama" placeholder="Nama" value="<?php echo isset($row) ? $row['nama'] : ''; ?>" required>
        <input type="text" name="alamat" placeholder="Alamat" value="<?php echo isset($row) ? $row['alamat'] : ''; ?>" required>
        <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo isset($row) ? $row['tanggal_lahir'] : ''; ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo isset($row) ? $row['email'] : ''; ?>" required>
        <button type="submit"><?php echo $action === 'create' ? 'Tambah' : 'Update'; ?> Siswa</button>
    </form>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
