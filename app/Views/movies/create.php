<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Review</title>
</head>
<body>
    <h1>Add Review</h1>

    <form action="<?= site_url('reviews/store') ?>" method="post">
        <input type="hidden" name="movie_id" value="<?= esc($movie_id) ?>"> <!-- ✅ Fixed -->
        <label>Rating</label>
        <select name="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>

        <label>Comment</label>
        <textarea name="comment" required></textarea>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
