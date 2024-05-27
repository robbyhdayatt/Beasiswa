<?php include 'config/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Edit Produk</h2>
    <?php
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <form action="product_edit.php?id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category">
                <?php
                $sql = "SELECT * FROM categories";
                $result_cat = $conn->query($sql);
                while($row_cat = $result_cat->fetch_assoc()) {
                    echo '<option value="'.$row_cat['id'].'" '.($row_cat['id'] == $row['category_id'] ? 'selected' : '').'>'.$row_cat['name'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            <?php if($row['image']): ?>
                <img src="images/<?php echo $row['image']; ?>" width="100" alt="">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        
        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        } else {
            $image = $row['image'];
        }

        $sql = "UPDATE products SET name='$name', description='$description', price='$price', category_id='$category', image='$image' WHERE id=$product_id";

        if ($conn->query($sql) === TRUE) {
            echo '<p>Produk berhasil diperbarui.</p>';
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
