<!DOCTYPE html>
<html>
<head>
    <title>Form Belanja</title>
</head>
<body>
    <h2>Form Belanja</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama Pelanggan: <input type="text" name="nama"><br><br>
        Produk: 
        <select name="produk">
            <option value="Tv">TV</option>
            <option value="Kulkas">KULKAS</option>
            <option value="Mesin Cuci">MESIN CUCI</option>
            <option value="Ac">AC</option>
        </select><br><br>
        Jumlah Beli: <input type="number" name="jumlah" min="1"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $produk = $_POST['produk'];
        $jumlah = $_POST['jumlah'];

        // Harga satuan produk
        switch ($produk) {
            case 'Tv':
                $harga_satuan = 1000000;
                break;
            case 'Kulkas':
                $harga_satuan = 2500000;
                break;
            case 'Mesin Cuci':
                $harga_satuan = 2000000;
                break;
            case 'Ac':
                $harga_satuan = 1500000;
                break;
            default:
                $harga_satuan = 0;
                break;
        }

        // Total belanja
        $total_belanja = $harga_satuan * $jumlah;

        // Diskon
            $diskon = 0.2 * $total_belanja;

        // PPN (10% dari total belanja setelah diskon)
        $ppn = 0.1 * ($total_belanja - $diskon);

        // Harga bersih
        $harga_bersih = $total_belanja - $diskon + $ppn;

        // Output
        echo "<h2>Output:</h2>";
        echo "Nama Pelanggan: " . $nama . "<br>";
        echo "Produk: " . $produk . "<br>";
        echo "Jumlah Beli: " . $jumlah . "<br>";
        echo "Harga Satuan: Rp " . number_format($harga_satuan) . "<br>";
        echo "Total Belanja: Rp " . number_format($total_belanja) . "<br>";
        echo "Diskon: Rp " . number_format($diskon) . "<br>";
        echo "PPN: Rp " . number_format($ppn) . "<br>";
        echo "Harga Bersih: Rp " . number_format($harga_bersih) . "<br>";
    }
    ?>
</body>
</html>