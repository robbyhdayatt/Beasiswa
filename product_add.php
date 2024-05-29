<?php include 'config/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Tambah Produk Baru</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="category" required>
                <option value="" selected disabled>Pilih Kategori</option>
                <?php
                // Ambil kategori dari database
                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                } else {
                    echo '<option value="" disabled>Tidak ada kategori tersedia</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Gambar Produk</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $image = $_FILES['image']['name'];

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO products (name, description, price, category_id, image) VALUES ('$name', '$description', '$price', '$category', '$image')";

            if ($conn->query($sql) === TRUE) {
                echo '<p>Produk berhasil ditambahkan.</p>';
            } else {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
            }
        } else {
            echo 'Error mengupload file.';
        }
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
