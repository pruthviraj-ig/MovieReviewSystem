<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Movie</title>
</head>
<body>
    <h1>Add Movie</h1>
    <form action="<?= site_url('movies/store') ?>" method="post">
        <label>Title</label>
        <input type="text" name="title" required>
        <label>Synopsis</label>
        <textarea name="synopsis"></textarea>
        <label>Poster URL</label>
        <input type="text" name="poster_url">
        <label>Release Date</label>
        <input type="date" name="release_date" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
