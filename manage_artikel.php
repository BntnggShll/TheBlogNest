<?php
session_start();
$articles = require 'php/artikel/read.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogHub - Manage Articles</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section class="section">
        <div class="container">
            <section class="section featured-articles">
                <div class="container">
                    <div class="section-header">
                        <h2>Featured Articles</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($articles as $article): ?>
                            <div class="card">
                                <a href="readartikel.php?id=<?= urlencode($article['id']) ?>"
                                    style="text-decoration: none; color: inherit;">
                                    <h2><?= htmlspecialchars($article['judul']) ?></h2>
                                    <?php if ($article['gambar']): ?>
                                        <img src="<?= htmlspecialchars($article['gambar'], ENT_QUOTES, 'UTF-8') ?>" alt="gambar"
                                            style="max-width:200px;">
                                    <?php endif; ?>
                                    <p><?= nl2br(htmlspecialchars($article['kutipan'])) ?></p>
                                    <p><strong>Kategori:</strong> <?= htmlspecialchars($article['kategori']) ?></p>
                                    <p><strong>Tanggal:</strong> <?= htmlspecialchars($article['tanggal_publikasi']) ?></p>
                                </a>
                                <div class="article-actions">
                                    <a href="createarticle.php?id=<?= urlencode($article['id']) ?>"
                                        class="btn edit-btn">Edit</a>
                                    <button class="btn delete-btn" data-id="<?= $article['id'] ?>">Delete</button>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const deleteButtons = document.querySelectorAll(".delete-btn");

            deleteButtons.forEach(button => {
                button.addEventListener("click", (e) => {
                    e.preventDefault();

                    const articleId = button.dataset.id;

                    if (confirm("Yakin ingin menghapus artikel ini?")) {
                        fetch("php/artikel/delete.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: `id=${encodeURIComponent(articleId)}`
                        })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    alert("Artikel berhasil dihapus.");
                                    window.location.reload();
                                } else {
                                    alert("Gagal menghapus: " + (data.message || "Terjadi kesalahan"));
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert("Terjadi kesalahan saat menghapus.");
                            });
                    }
                });
            });
        });
    </script>



</body>

</html>