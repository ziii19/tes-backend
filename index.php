<?php
function hitungGaji($jamKerja, $tarifPerJam) {
    if ($jamKerja <= 40) {
        $gaji = $jamKerja * $tarifPerJam;
    } else {
        $jamLembur = $jamKerja - 40;
        $gaji = (40 * $tarifPerJam) + ($jamLembur * $tarifPerJam * 1.5);
    }
    return $gaji;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jamKerja = (float) $_POST['jam_kerja'];
    $tarifPerJam = (float) $_POST['tarif_per_jam'];

    if ($jamKerja >= 0 && $tarifPerJam > 0) {
        $gaji = hitungGaji($jamKerja, $tarifPerJam);
        echo "Gaji karyawan: " . number_format($gaji, 2, ',', '.') . " IDR";
    } else {
        echo "Masukkan jumlah jam kerja dan tarif per jam yang valid!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Gaji Karyawan</title>
</head>
<body>
    <h1>Hitung Gaji Karyawan</h1>
    <form method="POST" action="">
        <label for="jam_kerja">Jumlah Jam Kerja:</label>
        <input type="number" id="jam_kerja" name="jam_kerja" step="0.01" required><br><br>

        <label for="tarif_per_jam">Tarif Per Jam (IDR):</label>
        <input type="number" id="tarif_per_jam" name="tarif_per_jam" step="0.01" required><br><br>

        <button type="submit">Hitung Gaji</button>
    </form>
</body>
</html>
