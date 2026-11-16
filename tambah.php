<?php
include 'koneksi.php';

$error = '';
$nim = '';
$nama = '';
$program_studi = '';
$alamat = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim           = trim($_POST['nim']);
    $nama          = trim($_POST['nama']);
    $program_studi = trim($_POST['program_studi']);
    $alamat        = trim($_POST['alamat']);

    if (empty($nim) || empty($nama) || empty($program_studi) || empty($alamat)) {
        $error = "Semua kolom wajib diisi!";
    } else {
        // Cek apakah NIM sudah terdaftar
        $cek_nim = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
        if (mysqli_num_rows($cek_nim) > 0) {
            $error = "NIM $nim sudah terdaftar dalam sistem!";
        } else {
            $insert = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, program_studi, alamat) VALUES ('$nim', '$nama', '$program_studi', '$alamat')");
            if ($insert) {
                header("Location: index.php?pesan=tambah_sukses");
                exit;
            } else {
                $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-header { background-color: #198754; color: white; }
    </style>
</head>
<body>
    <div class="container my-5" style="max-width: 650px;">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h4 class="mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2"></i>Tambah Data Mahasiswa</h4>
            </div>
            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($error); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="tambah.php" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label fw-semibold">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($nim); ?>" placeholder="Contoh: 24781085" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($nama); ?>" placeholder="Masukkan nama mahasiswa" required>
                    </div>

                    <div class="mb-3">
                        <label for="program_studi" class="form-label fw-semibold">Program Studi</label>
                        <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?= htmlspecialchars($program_studi); ?>" placeholder="Contoh: Manajemen Informatika" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat tempat tinggal" required><?= htmlspecialchars($alamat); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save me-1"></i>Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

