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
                <h3><?= $movie['title'] ?> - <?= $movie['release_date'] ?></h3>
                <a href="<?= site_url('reviews/create?movie_id=' . $movie['id']) ?>">Review</a>

                <?php if (!empty($movie['reviews'])): ?>
                    <h4>Reviews:</h4>
                    <ul>
                        <?php foreach ($movie['reviews'] as $review): ?>
                            <li>
                                <strong>Rating:</strong> <?= $review['rating'] ?>/5 <br>
                                <strong>Comment:</strong> <?= $review['comment'] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No reviews yet.</p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
