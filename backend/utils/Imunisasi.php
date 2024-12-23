<?php

class Imunisasi {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Method to save immunization data
    public function save($namaAnak, $usia, $jenisImunisasi, $statusImunisasi, $ipAddress, $browser) {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO imunisasi (nama_anak, usia, jenis_imunisasi, status_imunisasi, ip_address, browser) VALUES (:namaAnak, :usia, :jenisImunisasi, :statusImunisasi, :ipAddress, :browser)"
            );

            $stmt->bindParam(':namaAnak', $namaAnak);
            $stmt->bindParam(':usia', $usia);
            $stmt->bindParam(':jenisImunisasi', $jenisImunisasi);
            $stmt->bindParam(':statusImunisasi', $statusImunisasi);
            $stmt->bindParam(':ipAddress', $ipAddress);
            $stmt->bindParam(':browser', $browser);

            $stmt->execute();

            return ["success" => true, "message" => "Data berhasil disimpan."];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Gagal menyimpan data: " . $e->getMessage()];
        }
    }

    // Method to fetch all immunization records
    public function fetchAll() {
        try {
            $stmt = $this->conn->prepare("SELECT nama_anak, usia, jenis_imunisasi, status_imunisasi FROM imunisasi");
            $stmt->execute();

            return ["success" => true, "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Gagal mengambil data: " . $e->getMessage()];
        }
    }
}

?>
