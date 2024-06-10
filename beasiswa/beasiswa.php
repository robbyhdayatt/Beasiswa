<?php
include '../db.php';
include '../templates/header.php';

// Query untuk mendapatkan data beasiswa
$sql = "SELECT * FROM Beasiswa";
$result = $conn->query($sql);

?>

<div class="container">
    <h2>Daftar Beasiswa</h2>
    <a href="crud_beasiswa.php?action=create" class="btn btn-success">Tambah Beasiswa</a>
    <div class="table-wrapper">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Batas Pendaftaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['deskripsi']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td><?php echo $row['batas_pendaftaran']; ?></td>
                        <td class="actions">
                            <a href="crud_beasiswa.php?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="crud_beasiswa.php?action=delete" method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
include '../templates/footer.php';
?>
