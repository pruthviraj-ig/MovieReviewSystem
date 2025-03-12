<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie Reviews</title>
</head>
<body>
    <h1>Movie List</h1>

    <!-- Logout Button -->
    <?php if (session()->get('logged_in')): ?>
        <a href="<?= site_url('users/logout') ?>">Logout</a>
    <?php endif; ?>

    <a href="<?= site_url('movies/create') ?>">Add New Movie</a>

    <!-- Success Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><strong><?= session()->getFlashdata('success') ?></strong></p>
    <?php endif; ?>

    <ul>
        <?php foreach ($movies as $movie): ?>
            <li>
                <h3><?= $movie['title'] ?> - <?= $movie['release_date'] ?></h3>
                <a href="<?= site_url('reviews/create?movie_id=' . $movie['id']) ?>">Review</a>

                <!-- Display Reviews with Username -->
                <?php if (!empty($movie['reviews'])): ?>
                    <h4>Reviews:</h4>
                    <ul>
                        <?php foreach ($movie['reviews'] as $review): ?>
                            <li>
                                <strong>User:</strong> <?= $review['username'] ?> <br>
                                <strong>Rating:</strong> <?= $review['rating'] ?>/5 <br>
                                <strong>Comment:</strong> <?= $review['comment'] ?> 

                                <!-- Show delete button only if logged-in user is the author -->
                                <?php if (session()->get('user_id') == $review['user_id']): ?>
                                    <a href="<?= site_url('reviews/delete/' . $review['id']) ?>" onclick="return confirm('Are you sure you want to delete this review?')">Delete</a>
                                <?php endif; ?>
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
