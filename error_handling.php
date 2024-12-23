<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Handling</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="error-message">
        <?php if (isset($_GET['error'])): ?>
            <p class="error">
                <?php
                switch ($_GET['error']) {
                    case 'empty':
                        echo 'Semua kolom harus diisi.';
                        break;
                    case 'invalid':
                        echo 'Username atau password salah.';
                        break;
                    case 'server':
                        echo 'Terjadi kesalahan server. Coba lagi nanti.';
                        break;
                    case 'mismatch':
                        echo 'Password dan konfirmasi password tidak cocok.';
                        break;
                    case 'exists':
                        echo 'Username sudah digunakan. Pilih username lain.';
                        break;
                    default:
                        echo 'Terjadi kesalahan. Coba lagi.';
                        break;
                }
                ?>
            </p>
        <?php elseif (isset($_GET['success'])): ?>
            <p class="success">
                <?php
                switch ($_GET['success']) {
                    case 'registered':
                        echo 'Registrasi berhasil! Silakan login.';
                        break;
                    default:
                        echo 'Operasi berhasil.';
                        break;
                }
                ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
