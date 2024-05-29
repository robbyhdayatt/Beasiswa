<?php include 'config/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Keranjang Belanja</h2>
    <?php
    session_start();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }

    if (empty($_SESSION['cart'])) {
        echo '<p>Keranjang Anda kosong.</p>';
    } else {
        echo '<table class="table">';
        echo '<thead><tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th><th>Aksi</th></tr></thead><tbody>';

        $total = 0;

        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $sql = "SELECT * FROM products WHERE id = $product_id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $subtotal = $row['price'] * $quantity;
            $total += $subtotal;

            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>Rp. ' . $row['price'] . '</td>';
            echo '<td>' . $quantity . '</td>';
            echo '<td>Rp. ' . $subtotal . '</td>';
            echo '<td><a href="cart.php?action=remove&id=' . $product_id . '" class="btn btn-danger">Hapus</a></td>';
            echo '</tr>';
        }

        echo '<tr><td colspan="3">Total</td><td>Rp. ' . $total . '</td><td></td></tr>';
        echo '</tbody></table>';
        echo '<a href="checkout.php" class="btn btn-success">Checkout</a>';
    }

    if (isset($_GET['action']) && $_GET['action'] == 'remove') {
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        header('Location: cart.php');
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
