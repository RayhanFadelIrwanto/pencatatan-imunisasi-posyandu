<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pencatatan Imunisasi</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
    ?>

    <header>
      <h1>Pencatatan Imunisasi Posyandu</h1>
      <nav>
        <ul>
          <?php if ($isLoggedIn): ?>
          <li><a href="backend/logout.php">Logout</a></li>
          <?php else: ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <main>
      <?php if ($isLoggedIn): ?>
      <section id="form-section">
        <h2>Form Tambah Data Imunisasi</h2>
        <form id="imunisasiForm" action="backend/saveData.php" method="POST">
          <label for="namaAnak">Nama Anak:</label>
          <input type="text" id="namaAnak" name="namaAnak" required />

          <label for="usia">Usia:</label>
          <input type="number" id="usia" name="usia" required />

          <label>Jenis Imunisasi:</label>
          <label
            ><input type="radio" name="jenisImunisasi" value="BCG" required />
            BCG</label
          >
          <label
            ><input type="radio" name="jenisImunisasi" value="DPT" required />
            DPT</label
          >
          <label
            ><input type="radio" name="jenisImunisasi" value="Polio" required />
            Polio</label
          >

          <label>Status Imunisasi:</label>
          <label
            ><input
              type="checkbox"
              id="statusImunisasi"
              name="statusImunisasi"
              value="1"
            />
            Sudah</label
          >

          <button type="submit">Simpan</button>
        </form>
      </section>
      <?php endif; ?>

      <section>
        <h2>Daftar Imunisasi</h2>
        <table id="imunisasiTable">
          <thead>
            <tr>
              <th>Nama Anak</th>
              <th>Usia</th>
              <th>Jenis Imunisasi</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once 'backend/config.php';
            $stmt = $conn->prepare("SELECT nama_anak, usia, jenis_imunisasi,
            status_imunisasi FROM imunisasi"); $stmt->execute(); $data =
            $stmt->fetchAll(PDO::FETCH_ASSOC); foreach ($data as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['nama_anak']); ?></td>
              <td><?= htmlspecialchars($item['usia']); ?></td>
              <td><?= htmlspecialchars($item['jenis_imunisasi']); ?></td>
              <td><?= $item['status_imunisasi'] ? 'Sudah' : 'Belum'; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </main>
  </body>
</html>
