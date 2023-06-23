<?php
   $os = php_uname('s'); // Nama sistem operasi
   $release = php_uname('r'); // Versi sistem operasi
   $machine = php_uname('m'); // Tipe mesin
   
   echo "Sistem Operasi: " . $os . "<br>";
   echo "Versi: " . $release . "<br>";
   echo "Tipe Mesin: " . $machine . "<br>";
   $cpuModel = shell_exec('cat /proc/cpuinfo | grep "model name" | head -n1'); // Model CPU

echo "CPU Model: " . $cpuModel . "<br>";
$memoryTotal = shell_exec('cat /proc/meminfo | grep "MemTotal"'); // Total memori

echo "Total Memori: " . $memoryTotal . "<br>";
$diskTotal = disk_total_space('/'); // Total ruang penyimpanan
$diskFree = disk_free_space('/'); // Ruang penyimpanan yang tersedia

echo "Total Penyimpanan: " . formatBytes($diskTotal) . "<br>";
echo "Penyimpanan Tersedia: " . formatBytes($diskFree) . "<br>";

// Fungsi untuk mengubah ukuran dalam byte menjadi format yang lebih mudah dibaca
function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

   
   
?>