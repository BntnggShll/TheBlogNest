<?php
header('Content-Type: application/json');

require __DIR__ . '/../koneksi.php';

if (!isset($_POST['id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID artikel tidak diberikan']);
    exit;
}

$id = intval($_POST['id']);

// Cek dan hapus terlebih dahulu relasi di tabel article_category
$stmtKategori = $koneksi->prepare("DELETE FROM article_category WHERE artikel_id = ?");
$stmtKategori->bind_param("i", $id);
$stmtKategori->execute();
$stmtKategori->close();

// Hapus artikel dari tabel articles
$stmt = $koneksi->prepare("DELETE FROM articles WHERE id = ?");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Gagal mempersiapkan query']);
    exit;
}

$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Artikel berhasil dihapus']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $stmt->error]);
}
$stmt->close();
