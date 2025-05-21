<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BlogHub - Search</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div id="navbar-container"></div>

    <!-- Search Section -->
    <section class="section">
        <div class="container">
            <h1 class="text-center">Search Articles</h1>

            <form class="search-bar search-form mb-30" id="search-form">
                <input type="text" id="search-input" class="form-control search-input"
                    placeholder="Search articles..." />
                <button type="submit" class="search-button">🔍</button>
            </form>

            <div class="search-results">
                <h2>Results for: <span class="search-query">All Articles</span></h2>
                <div class="row search-results-container">
                    <!-- Articles will be rendered here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-column">
                    <h3 class="footer-heading">BlogHub</h3>
                    <p>A platform for sharing knowledge and discovering new ideas.</p>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="search.html">Search</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Connect</h3>
                    <ul class="footer-links">
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">GitHub</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 BlogHub. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const searchForm = document.getElementById("search-form");
        const searchInput = document.getElementById("search-input");
        const resultContainer = document.querySelector(".search-results-container");
        const querySpan = document.querySelector(".search-query");

        function renderArticles(articles) {
            resultContainer.innerHTML = "";
            if (articles.length === 0) {
                resultContainer.innerHTML = "<p>No articles found.</p>";
                return;
            }

            articles.forEach((article) => {
                const card = document.createElement("div");
                card.className = "col col-4";
                card.innerHTML = `
          <div class="card">
            <img src="${article.gambar || 'default.jpg'}" alt="${article.judul}" class="card-img" />
            <div class="card-body">
              <h3>${article.judul}</h3>
              <p>${article.isi.substring(0, 100)}...</p>
              <p><small>${article.tanggal_publikasi}</small></p>
            </div>
          </div>
        `;
                resultContainer.appendChild(card);
            });
        }

        function loadArticles(keyword = "") {
            fetch(`api/read.php`)
                .then((res) => res.json())
                .then((data) => {
                    const filtered = keyword
                        ? data.filter((item) =>
                            item.judul.toLowerCase().includes(keyword.toLowerCase())
                        )
                        : data;
                    renderArticles(filtered);
                })
                .catch((err) => {
                    resultContainer.innerHTML = "<p>Failed to load articles.</p>";
                    console.error(err);
                });
        }

        searchForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const keyword = searchInput.value.trim();
            querySpan.textContent = keyword || "All Articles";
            loadArticles(keyword);
        });

        // Load all articles on first load
        window.addEventListener("DOMContentLoaded", () => {
            loadArticles();
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>