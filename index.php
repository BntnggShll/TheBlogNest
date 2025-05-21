<?php
$articles = require 'php/artikel/read.php';
$categories = [
    ['slug' => 'webdev', 'name' => 'Web Development', 'icon' => '🌐', 'count' => 125],
    ['slug' => 'javascript', 'name' => 'JavaScript', 'icon' => '📜', 'count' => 98],
    ['slug' => 'python', 'name' => 'Python', 'icon' => '🐍', 'count' => 87],
    ['slug' => 'react', 'name' => 'React', 'icon' => '⚛️', 'count' => 76],
    ['slug' => 'database', 'name' => 'Databases', 'icon' => '💾', 'count' => 65],
    ['slug' => 'design', 'name' => 'UI/UX Design', 'icon' => '🎨', 'count' => 54]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>The Blog Nest - A Platform for Sharing Knowledge</title>
    <link rel="stylesheet" href="css/gaya.css">

</head>

<body>

    <div id="navbar-container"></div>

    <section class="hero">
        <div class="container">
            <h1>Welcome to The Blog Nest</h1>
            <p>A Platform for Sharing Knowledge and Insights with the World</p>
            <div class="hero-buttons">
                <a href="register.php" class="btn btn-primary">Join Now</a>
                <a href="login.php" class="btn btn-secondary">Login</a>
            </div>
        </div>
    </section>

    <section class="section featured-articles">
        <div class="container">
            <div class="section-header">
                <h2>Featured Articles</h2>
                <a href="articles.php" class="view-all-link">View All Articles</a>
            </div>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                    <div class="card">
                        <h2><?= htmlspecialchars($article['judul']) ?></h2>
                        <?php if ($article['gambar']): ?>
                            <img src="<?= htmlspecialchars($article['gambar']) ?>" alt="gambar" style="max-width:200px;">
                        <?php endif; ?>
                        <p><?= nl2br(htmlspecialchars($article['isi'])) ?></p>
                        <p><strong>Kategori:</strong> <?= htmlspecialchars($article['kategori']) ?></p>
                        <p><strong>Tanggal:</strong> <?= htmlspecialchars($article['tanggal_publikasi']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section bg-light categories-section">
        <div class="container">
            <div class="section-header">
                <h2>Categories</h2>
                <a href="categories.php" class="view-all-link">View All Categories</a>
            </div>
            <div class="categories-grid">
                <?php foreach ($categories as $category): ?>
                    <div class="category-card">
                        <div class="category-icon"><?= htmlspecialchars($category['icon']) ?></div>
                        <h3><?= htmlspecialchars($category['name']) ?></h3>
                        <p><?= htmlspecialchars($category['count']) ?> Articles</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container footer-container">
            <div class="footer-col">
                <h4>About The Blog Nest</h4>
                <p>The Blog Nest is a community-driven platform dedicated to sharing knowledge and empowering writers
                    and
                    readers worldwide.</p>
            </div>

            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Contact Us</h4>
                <p>Email: support@The Blog Nest.com</p>
                <p>Phone: +1 234 567 8901</p>
                <p>Address: 123 Knowledge Rd, Learning City</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 The Blog Nest. All rights reserved.</p>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>