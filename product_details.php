<?php 
include 'config/config.php'; // Mengubah jalur menjadi relatif terhadap root proyek
include 'includes/header.php'; // Mengubah jalur menjadi relatif terhadap root proyek
?>

<div class="container">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card mt-4">';
                echo '<img class="card-img-top" src="images/'.$row['image'].'" alt="">';
                echo '<div class="card-body">';
                echo '<h3 class="card-title">'.$row['name'].'</h3>';
                echo '<h4>Rp. '.$row['price'].'</h4>';
                echo '<p class="card-text">'.$row['description'].'</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Produk tidak ditemukan.</p>';
        }
    } else {
        echo '<p>ID produk tidak diberikan.</p>';
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
