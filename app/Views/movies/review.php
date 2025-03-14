<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit Review</title>
</head>
<body>
    <h1>Submit Review</h1>

    <?php if (session()->get('logged_in')): ?>
        <form action="<?= site_url('reviews/store') ?>" method="post">
            <input type="hidden" name="movie_id" value="<?= $_GET['movie_id'] ?>">
            <label>Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" required>
            <label>Comment</label>
            <textarea name="comment" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    <?php else: ?>
        <p><strong>You must <a href="<?= site_url('users/login') ?>">log in</a> to post a review.</strong></p>
    <?php endif; ?>
</body>
</html>
