<?php
// require 'php/artikel/read.php';
$featuredArticles = [
    [
        'id' => 1,
        'title' => 'Getting Started with HTML & CSS',
        'excerpt' => 'Learn the fundamentals of HTML and CSS to build modern, responsive websites from scratch.',
        'date' => 'June 15, 2023',
        'category' => 'Web Development',
        'image' => 'https://via.placeholder.com/600x400'
    ],
    [
        'id' => 2,
        'title' => 'React Hooks Explained',
        'excerpt' => 'A comprehensive guide to understanding and using React Hooks effectively in your projects.',
        'date' => 'June 10, 2023',
        'category' => 'React',
        'image' => 'https://via.placeholder.com/600x400'
    ],
    [
        'id' => 3,
        'title' => 'Python for Data Science',
        'excerpt' => 'Discover how Python is revolutionizing data analysis and machine learning applications.',
        'date' => 'June 5, 2023',
        'category' => 'Python',
        'image' => 'https://via.placeholder.com/600x400'
    ],
    [
        'id' => 4,
        'title' => 'Building APIs with Node.js',
        'excerpt' => 'Learn how to create robust and scalable RESTful APIs using Node.js and Express.',
        'date' => 'May 30, 2023',
        'category' => 'Node.js',
        'image' => 'https://via.placeholder.com/600x400'
    ]
];

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
    <style>
        /* CSS dasar agar rapi dan simple */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        header.site-header {
            background: #222;
            color: #fff;
            padding: 15px 0;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo a {
            font-size: 1.8rem;
            color: #fff;
            font-weight: bold;
        }

        nav.main-nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav.main-nav ul li a {
            color: #ddd;
            font-weight: 600;
        }

        nav.main-nav ul li a:hover {
            color: #fff;
        }

        .auth-buttons a {
            margin-left: 15px;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
            color: #222;
        }

        .btn-primary {
            background-color: #007BFF;
            color: white !important;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #e2e6ea;
        }

        .btn-secondary:hover {
            background-color: #b8c0ca;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1600x600?text=The Blog Nest+Hero') center/cover no-repeat;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 30px;
        }

        .hero-buttons a {
            display: inline-block;
            margin: 0 10px;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 700;
        }

        /* Sections */
        .section {
            padding: 60px 0;
        }

        .bg-light {
            background-color: #f9f9f9;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 40px;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 8px;
        }

        .section-header h2 {
            font-size: 2rem;
            color: #007BFF;
        }

        .view-all-link {
            font-weight: 600;
            font-size: 0.9rem;
            color: #007BFF;
        }

        /* Grid system */
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-3 {
            flex: 1 1 calc(25% - 20px);
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        @media(max-width: 900px) {
            .col-3 {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media(max-width: 600px) {
            .col-3 {
                flex: 1 1 100%;
            }
        }

        /* Article Card */
        .article-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .article-content {
            padding: 15px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .article-meta {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 10px;
            display: flex;
            gap: 15px;
        }

        .article-title {
            font-size: 1.2rem;
            margin: 0 0 10px 0;
            flex-grow: 1;
        }

        .article-excerpt {
            font-size: 0.95rem;
            margin-bottom: 15px;
            color: #444;
            flex-grow: 2;
        }

        .article-link {
            font-weight: 600;
            align-self: flex-start;
            color: #007BFF;
        }

        .article-link:hover {
            text-decoration: underline;
        }

        /* Categories grid */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 25px;
        }

        .category-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 8px rgb(0 0 0 / 0.1);
            text-align: center;
            padding: 25px 15px;
            color: #333;
            transition: box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .category-card:hover {
            box-shadow: 0 0 12px #007BFF;
        }

        .category-icon {
            font-size: 2.5rem;
        }

        .category-card h3 {
            margin: 0;
            font-size: 1.1rem;
        }

        .category-card p {
            margin: 0;
            color: #777;
            font-size: 0.9rem;
        }

        /* Footer */
        footer.site-footer {
            background: #222;
            color: #bbb;
            padding: 40px 0;
            font-size: 0.9rem;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
        }

        .footer-col {
            flex: 1 1 250px;
        }

        .footer-col h4 {
            color: white;
            margin-bottom: 15px;
        }

        .footer-col p,
        .footer-col ul {
            margin: 0;
            line-height: 1.6;
        }

        .footer-col ul {
            list-style: none;
            padding: 0;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #bbb;
        }

        .footer-col ul li a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            border-top: 1px solid #444;
            padding-top: 15px;
            font-size: 0.85rem;
            color: #777;
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="container header-container">
            <div class="logo"><a href="index.php">The Blog Nest</a></div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="login.html" class="btn btn-secondary">Login</a>
                <a href="register.php" class="btn btn-primary">Register</a>
            </div>
        </div>
    </header>

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
                    <div class="artikel">
                        <h2><?= htmlspecialchars($article['judul']) ?></h2>
                        <?php if ($article['gambar']): ?>
                            <img src="<?= htmlspecialchars($article['gambar']) ?>" alt="gambar" style="max-width:200px;">
                        <?php endif; ?>
                        <p><?= nl2br(htmlspecialchars($article['isi'])) ?></p>
                        <p><strong>Kategori:</strong> <?= htmlspecialchars($article['kategori']) ?></p>
                        <p><strong>Tanggal:</strong> <?= htmlspecialchars($article['tanggal_publikasi']) ?></p>
                    </div>
                    <hr>
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
                <p>The Blog Nest is a community-driven platform dedicated to sharing knowledge and empowering writers and
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
</body>

</html>