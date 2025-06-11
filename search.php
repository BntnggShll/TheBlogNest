
<?php 
session_start();?>
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
    <?php include 'navbar.php'?>
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

    <?php include 'footer.php'; ?>

    
</body>

</html>