<?php
include '../db.php';
include '../templates/header.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action === 'create' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $beasiswa_id = $_POST['beasiswa_id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO Kriteria (beasiswa_id, nama, deskripsi) VALUES ('$beasiswa_id', '$nama', '$deskripsi')";
    if ($conn->query($sql) === TRUE) {
        header('Location: kriteria.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($action === 'edit' && $id) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $beasiswa_id = $_POST['beasiswa_id'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];

        $sql = "UPDATE Kriteria SET beasiswa_id='$beasiswa_id', nama='$nama', deskripsi='$deskripsi' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: kriteria.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "SELECT * FROM Kriteria WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
}

if ($action === 'delete' && $_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Kriteria WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: kriteria.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php if ($action === 'create' || ($action === 'edit' && isset($row))): ?>
    <form method="POST" action="crud_kriteria.php?action=<?php echo $action; ?><?php echo $id ? '&id=' . $id : ''; ?>">
        <select name="beasiswa_id" required>
            <?php
            $sql = "SELECT id, nama FROM Beasiswa";
            $result = $conn->query($sql);
            while($beasiswa = $result->fetch_assoc()): ?>
                <option value="<?php echo $beasiswa['id']; ?>" <?php echo isset($row) && $row['beasiswa_id'] == $beasiswa['id'] ? 'selected' : ''; ?>>
                    <?php echo $beasiswa['nama']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="text" name="nama" placeholder="Nama Kriteria" value="<?php echo isset($row) ? $row['nama'] : ''; ?>" required>
        <textarea name="deskripsi" placeholder="Deskripsi" required><?php echo isset($row) ? $row['deskripsi'] : ''; ?></textarea>
        <button type="submit"><?php echo $action === 'create' ? 'Tambah' : 'Update'; ?> Kriteria</button>
    </form>
<?php endif; ?>

<?php include '../templates/footer.php'; ?>
