<?php
include 'db.php';
include 'templates/header.php';

// Query untuk mendapatkan data
$totalSiswa = $conn->query("SELECT COUNT(*) AS total FROM Siswa")->fetch_assoc()['total'];
$totalBeasiswa = $conn->query("SELECT COUNT(*) AS total FROM Beasiswa")->fetch_assoc()['total'];
$totalPendaftaran = $conn->query("SELECT COUNT(*) AS total FROM Pendaftaran")->fetch_assoc()['total'];
$totalKriteria = $conn->query("SELECT COUNT(*) AS total FROM Kriteria")->fetch_assoc()['total'];

?>

<div class="container">
    <h2>Selamat Datang di Sistem Manajemen Beasiswa</h2>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Siswa</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $totalSiswa; ?></h5>
                    <p class="card-text">Jumlah seluruh siswa yang terdaftar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Beasiswa</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $totalBeasiswa; ?></h5>
                    <p class="card-text">Jumlah seluruh beasiswa yang tersedia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Total Pendaftaran</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $totalPendaftaran; ?></h5>
                    <p class="card-text">Jumlah seluruh pendaftaran yang masuk.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Kriteria</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $totalKriteria; ?></h5>
                    <p class="card-text">Jumlah seluruh kriteria beasiswa.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
include 'templates/footer.php';
?>
