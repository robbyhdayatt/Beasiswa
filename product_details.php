<?php include '../config/config.php'; ?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <?php
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="row">';
        echo '<div class="col-md-6">';
        echo '<img class="img-fluid" src="../images/'.$row['image'].'" alt="">';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<h2>'.$row['name'].'</h2>';
        echo '<h4>Rp. '.$row['price'].'</h4>';
        echo '<p>'.$row['description'].'</p>';
        echo '<form action="cart.php" method="post">';
        echo '<input type="hidden" name="product_id" value="'.$row['id'].'">';
        echo '<input type="number" name="quantity" value="1" min="1" class="form-control mb-2">';
        echo '<button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>Produk tidak ditemukan.</p>';
    }
    ?>
</div>

<?php include '../includes/footer.php'; ?>
