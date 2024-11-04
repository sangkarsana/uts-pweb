<?php
require_once 'Database.php';

class Produk {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function tambahProduk($nama, $deskripsi, $harga, $jumlah_stok, $id_kategori, $gambar) {
        $sql = "INSERT INTO produk (nama, deskripsi, harga, jumlah_stok, id_kategori, gambar) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute([$nama, $deskripsi, $harga, $jumlah_stok, $id_kategori, $gambar]);
    }

    public function ambilSemuaProduk() {
        $stmt = $this->db->pdo->query("SELECT * FROM produk");
        return $stmt->fetchAll();
    }

    // Tambahkan method untuk update dan delete di sini
}