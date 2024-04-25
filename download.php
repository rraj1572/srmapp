<?php
// Function to increment download count
function incrementDownloadCount() {
    $downloadFile = 'download_count.txt';
    $count = (int)file_get_contents($downloadFile);
    $count++;
    file_put_contents($downloadFile, $count);
}

// Increment download count
incrementDownloadCount();

header('Content-Type: text/html; charset=utf-8');

// Function to start download after 2 seconds delay
function startDownload() {
    $filePath = 'SRMTracker.apk';
    header('Content-Description: File Transfer');
    header('Content-Type: application/vnd.android.package-archive');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));
    readfile($filePath);
    exit;
}

startDownload();
?>
