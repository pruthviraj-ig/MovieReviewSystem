<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie Reviews</title>
</head>
<body>
    <h1>Movie List</h1>
    <a href="<?= site_url('movies/create') ?>">Add New Movie</a>
    <ul>
        <?php foreach ($movies as $movie): ?>
            <li>
                <?= $movie['title'] ?> - <?= $movie['release_date'] ?>
                <a href="<?= site_url('reviews/create?movie_id=' . $movie['id']) ?>">Review</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
