<?php
include 'koneksi.php';

$error = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

// Ambil data mahasiswa berdasarkan id
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim           = trim($_POST['nim']);
    $nama          = trim($_POST['nama']);
    $program_studi = trim($_POST['program_studi']);
    $alamat        = trim($_POST['alamat']);

    if (empty($nim) || empty($nama) || empty($program_studi) || empty($alamat)) {
        $error = "Semua kolom wajib diisi!";
    } else {
        // Cek apakah NIM baru sudah dipakai oleh mahasiswa lain
        $cek_nim = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim' AND id != $id");
        if (mysqli_num_rows($cek_nim) > 0) {
            $error = "NIM $nim sudah digunakan oleh mahasiswa lain!";
        } else {
            $update = mysqli_query($koneksi, "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', program_studi = '$program_studi', alamat = '$alamat' WHERE id = $id");
            if ($update) {
                header("Location: index.php?pesan=edit_sukses");
                exit;
            } else {
                $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
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
    <title>Edit Data Mahasiswa</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-header { background-color: #ffc107; color: #000; }
    </style>
</head>
<body>
    <div class="container my-5" style="max-width: 650px;">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h4 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Ubah Data Mahasiswa</h4>
            </div>
            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($error); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="edit.php?id=<?= $id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label fw-semibold">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($_SERVER['REQUEST_METHOD'] == 'POST' ? $nim : $data['nim']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($_SERVER['REQUEST_METHOD'] == 'POST' ? $nama : $data['nama']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="program_studi" class="form-label fw-semibold">Program Studi</label>
                        <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?= htmlspecialchars($_SERVER['REQUEST_METHOD'] == 'POST' ? $program_studi : $data['program_studi']); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($_SERVER['REQUEST_METHOD'] == 'POST' ? $alamat : $data['alamat']); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-warning fw-semibold">
                            <i class="bi bi-check-lg me-1"></i>Simpan Perubahan
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

