    <?php
    session_start();
    require __DIR__.'/../koneksi.php';
    $sql = "SELECT id, judul, isi, penulis_id, kategori,gambar, tanggal_publikasi FROM articles ORDER BY tanggal_publikasi DESC";

    $result = mysqli_query($koneksi,$sql);

    if (!$result) {
        http_response_code(500);
        echo json_encode(["message" => "Query failed: " . $conn->error]);
        exit;
    }

    $articles = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articles[] = [
                "id" => (int)$row["id"],
                "judul" => $row["judul"],
                "isi" => $row["isi"],
                "penulis_id" => $row["penulis_id"] !== null ? (int)$row["penulis_id"] : null,
                "kategori" => $row["kategori"],
                "gambar" => $row["gambar"] ? "http://your-domain.com/" . $row["gambar"] : null,
                "tanggal_publikasi" => $row["tanggal_publikasi"]
            ];
        }
    }

    echo json_encode($articles);
