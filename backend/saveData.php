<?php

require_once 'auth.php';
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST request
    $namaAnak = $_POST['namaAnak'] ?? '';
    $usia = $_POST['usia'] ?? '';
    $jenisImunisasi = $_POST['jenisImunisasi'] ?? '';
    $statusImunisasi = $_POST['statusImunisasi'] ?? '0'; // Default to 0 if not checked

    // Get client info
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];

    // Validate data
    if (empty($namaAnak) || empty($usia) || empty($jenisImunisasi)) {
        header('Location: ../index.php?error=empty');
        exit;
    }

    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO imunisasi (nama_anak, usia, jenis_imunisasi, status_imunisasi, ip_address, browser) VALUES (:namaAnak, :usia, :jenisImunisasi, :statusImunisasi, :ipAddress, :browser)");

        // Bind parameters
        $stmt->bindParam(':namaAnak', $namaAnak);
        $stmt->bindParam(':usia', $usia);
        $stmt->bindParam(':jenisImunisasi', $jenisImunisasi);
        $stmt->bindParam(':statusImunisasi', $statusImunisasi);
        $stmt->bindParam(':ipAddress', $ipAddress);
        $stmt->bindParam(':browser', $browser);

        // Execute statement
        $stmt->execute();

        header('Location: ../index.php?success=saved');
        exit;
    } catch (PDOException $e) {
        header('Location: ../index.php?error=server');
        exit;
    }
} else {
    header('Location: ../index.php?error=method');
    exit;
}

?>
