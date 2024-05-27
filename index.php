<?php include 'config/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h1 class="my-4">Produk Terbaru</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '<div class="card h-100">';
                echo '<a href="product_details.php?id='.$row['id'].'"><img class="card-img-top" src="images/'.$row['image'].'" alt=""></a>';
                echo '<div class="card-body">';
                echo '<h4 class="card-title"><a href="product_details.php?id='.$row['id'].'">'.$row['name'].'</a></h4>';
                echo '<h5>Rp. '.$row['price'].'</h5>';
                echo '<p class="card-text">'.substr($row['description'], 0, 100).'...</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<a href="product_details.php?id='.$row['id'].'" class="btn btn-primary">Detail</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Tidak ada produk tersedia.</p>';
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
