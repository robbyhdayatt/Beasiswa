<?php include 'config/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Checkout</h2>
    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO customers (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            $customer_id = $conn->insert_id;
            $total = 0;

            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $sql = "SELECT price FROM products WHERE id = $product_id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $subtotal = $row['price'] * $quantity;
                $total += $subtotal;
            }

            $sql = "INSERT INTO orders (customer_id, total) VALUES ('$customer_id', '$total')";
            if ($conn->query($sql) === TRUE) {
                $order_id = $conn->insert_id;

                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    $sql = "SELECT price FROM products WHERE id = $product_id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $price = $row['price'];

                    $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
                    $conn->query($sql);
                }

                unset($_SESSION['cart']);
                echo '<p>Checkout berhasil. Terima kasih atas pesanan Anda.</p>';
            } else {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
            }
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        echo '<form action="checkout.php" method="post">';
        echo '<div class="form-group">';
        echo '<label for="name">Nama Lengkap</label>';
        echo '<input type="text" class="form-control" id="name" name="name" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="email">Email</label>';
        echo '<input type="email" class="form-control" id="email" name="email" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="password">Password</label>';
        echo '<input type="password" class="form-control" id="password" name="password" required>';
        echo '</div>';
        echo '<button type="submit" class="btn btn-primary">Submit</button>';
        echo '</form>';
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
