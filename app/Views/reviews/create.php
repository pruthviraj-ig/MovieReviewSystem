<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Submit Your Review</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('reviews/store') ?>" method="post">
                        <input type="hidden" name="movie_id" value="<?= $movie_id ?>">

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating (1-5)</label>
                            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                        </div>

                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Submit Review</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= site_url('movies') ?>" class="btn btn-secondary">Back to Movies</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
