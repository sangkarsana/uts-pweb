<?php
require_once 'Produk.php';

$produk = new Produk();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $id_kategori = $_POST['id_kategori'];
    $gambar = $_POST['gambar'];

    if ($produk->tambahProduk($nama, $deskripsi, $harga, $jumlah_stok, $id_kategori, $gambar)) {
        $message = "Produk berhasil ditambahkan!";
    } else {
        $message = "Gagal menambahkan produk.";
    }
}

$products = $produk->ambilSemuaProduk();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk Gula Aren</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        input, textarea, select { width: 100%; padding: 8px; margin: 5px 0 15px; }
        button { background: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h1>Manajemen Produk Gula Aren</h1>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <h2>Tambah Produk Baru</h2>
    <form method="post">
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="jumlah_stok">Jumlah Stok:</label>
        <input type="number" id="jumlah_stok" name="jumlah_stok" required>

        <label for="id_kategori">Kategori:</label>
        <select id="id_kategori" name="id_kategori" required>
            <option value="1">Gula Aren Original</option>
            <option value="2">Gula Aren Cair</option>
            <option value="3">Gula Semut</option>
        </select>

        <label for="gambar">URL Gambar:</label>
        <input type="text" id="gambar" name="gambar">

        <button type="submit">Tambah Produk</button>
    </form>

    <h2>Daftar Produk</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Gambar</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['nama']); ?></td>
            <td>Rp <?php echo number_format($product['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $product['jumlah_stok']; ?></td>
            <td><?php echo $product['id_kategori']; ?></td>
            <td><img src="<?php echo $product['gambar']; ?>" width="100"></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>