<?php

require_once 'config.php';

header('Content-Type: application/json');

try {
    // Prepare SQL statement to fetch all data
    $stmt = $conn->prepare("SELECT nama_anak, usia, jenis_imunisasi, status_imunisasi FROM imunisasi");

    // Execute statement
    $stmt->execute();

    // Fetch data as associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON
    echo json_encode(["success" => true, "data" => $data]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Gagal mengambil data: " . $e->getMessage()]);
}

?>
