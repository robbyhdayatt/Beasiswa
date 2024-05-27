<?php
include 'config/config.php';

$product_id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$product_id";

if ($conn->query($sql) === TRUE) {
    echo '<p>Produk berhasil dihapus.</p>';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

header('Location: index.php'); // Redirect kembali ke halaman utama setelah penghapusan
?>

<?php include 'includes/footer.php'; ?>
