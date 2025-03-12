<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center">Add Movie</h1>

        <div class="card p-4 shadow">
            <form action="<?= site_url('movies/store') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">OMDB ID</label>
                    <input type="text" name="omdb_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Synopsis</label>
                    <textarea name="synopsis" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Poster URL</label>
                    <input type="text" name="poster_url" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Release Date</label>
                    <input type="date" name="release_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</body>
</html>
