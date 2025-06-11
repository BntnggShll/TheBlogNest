<?php
session_start();
$data = require 'php/artikel/readbyiduser.php';

$articles = $data['articles'];
$profile = $data['profile'];


if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit(); // Hentikan eksekusi script
    
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Blog Nest - A Platform for Sharing Knowledge</title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="nav-overlay"></div>

    <!-- Profile Section -->
    <section class="section">
        <div class="container">
            <div class="profile-header">
                <img src="<?= htmlspecialchars($profile['foto'], ENT_QUOTES, 'UTF-8') ?>" alt="gambar"
                    style="max-width:200px;">
                <div class="profile-info">
                    <h1><?php echo $_SESSION['nama']; ?></h1>

                    <p class="profile-bio">Web Developer & Technical Writer. Passionate about teaching and sharing
                        knowledge on web development technologies.</p>
                </div>
            </div>

            <div class="profile-stats">
                <div class="stat-item">
                    <span class="stat-number"> <?= htmlspecialchars($profile['total_artikel']) ?></span>
                    <span class="stat-label">Articles</span>
                </div>

                <div class="stat-item">
                    <span class="stat-number"> <?= htmlspecialchars($profile['tanggal_bergabung']) ?></span>
                    <span class="stat-label">Joined</span>
                </div>
            </div>

            <div class="profile-actions mb-30">
                <a href="manage_artikel.php" class="btn btn-primary">Manage Articles</a>
                <a onclick="openModal()"  class="btn btn-secondary">Edit Profile</a>

            </div>

            <h2>Articles by <?php echo $_SESSION['nama']; ?></h2>

            <?php
            foreach ($articles as $article): ?>
                <a href="readartikel.php?id=<?= urlencode($article['id']) ?>"
                    style="text-decoration: none; color: inherit;">
                    <div class="card">
                        <h2><?= htmlspecialchars($article['judul']) ?></h2>
                        <?php if ($article['gambar']): ?>
                            <img src="<?= htmlspecialchars($article['gambar'], ENT_QUOTES, 'UTF-8') ?>" alt="gambar"
                                style="max-width:200px;">
                        <?php endif; ?>
                        <p><?= nl2br(htmlspecialchars($article['kutipan'])) ?></p>
                        <p><strong>Kategori:</strong> <?= htmlspecialchars($article['kategori']) ?></p>
                        <p><strong>Tanggal:</strong> <?= htmlspecialchars($article['tanggal_publikasi']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

    </section>





    <!-- Modal Edit Profile -->
    <div class="modal" id="edit-profile-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Profile</h2>
                <button class="close-modal" id="close-modal">×</button>
            </div>
            <form id="edit-profile-form" action="php/user/update_profile.php" method="POST">
                <div class="form-group">
                    <label for="profile-name" class="form-label">Name</label>
                    <input type="text" id="profile-name" name="name" class="form-control"
                        value="<?= htmlspecialchars($_SESSION['nama']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="profile-bio" class="form-label">Bio</label>
                    <textarea id="profile-bio" name="bio" class="form-control"
                        rows="4"><?= htmlspecialchars($profile['bio'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label for="profile-avatar" class="form-label">Profile Picture URL</label>
                    <input type="url" id="profile-avatar" name="avatar" class="form-control"
                        value="<?= htmlspecialchars($profile['foto']) ?>">
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Buka modal saat dibutuhkan (misalnya dengan tombol Edit)
        function openModal() {
            document.getElementById("edit-profile-modal").style.display = "block";
        }

        // Tutup modal saat tombol close diklik
        document.getElementById("close-modal").addEventListener("click", function () {
            document.getElementById("edit-profile-modal").style.display = "none";
        });

        // Tutup modal jika klik di luar modal content
        window.addEventListener("click", function (event) {
            const modal = document.getElementById("edit-profile-modal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>


</body>

</html>