<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Review</title>
</head>
<body>
    <h1>Add Review</h1>
    
    <!-- Form to submit a review -->
    <form action="<?= site_url('reviews/store') ?>" method="post">
        <input type="hidden" name="movie_id" value="<?= esc($movie_id) ?>">

        <label>Rating (1-5)</label>
        <input type="number" name="rating" min="1" max="5" required>

        <label>Comment</label>
        <textarea name="comment" required></textarea>

        <button type="submit">Submit Review</button>
    </form>
</body>
</html>
