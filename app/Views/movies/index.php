<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .review-box {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4"><span>🎥</span> Movie List</h1>

    <!-- Logout & Login Buttons -->
    <div class="d-flex justify-content-between mb-4">
        <?php if (session()->get('logged_in')): ?>
            <a href="<?= site_url('users/logout') ?>" class="btn btn-danger">Logout</a>
        <?php else: ?>
            <a href="<?= site_url('users/login') ?>" class="btn btn-primary">Login</a>
        <?php endif; ?>
    </div>

    <!-- Movie Grid (Fully Responsive) -->
    <div class="row">
        <?php foreach ($movies as $movie): ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4 shadow-sm">
                    <img src="<?= $movie['poster_url'] ?>" class="card-img-top" alt="<?= $movie['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $movie['title'] ?> (<?= $movie['release_date'] ?>)</h5>
                        <p class="card-text"><?= substr($movie['synopsis'], 0, 100) ?>...</p>

                        <a href="<?= site_url('reviews/create/' . $movie['id']) ?>" class="btn btn-warning w-100">Review</a>

                        <!-- Reviews Section -->
                        <?php if (!empty($movie['reviews'])): ?>
                            <h6 class="mt-3">Reviews:</h6>
                            <?php foreach ($movie['reviews'] as $review): ?>
                                <div class="review-box mt-2">
                                    <strong>User:</strong> <?= $review['username'] ?><br>
                                    <strong>Rating:</strong> <?= $review['rating'] ?>/5 <br>
                                    <strong>Comment:</strong> <?= $review['comment'] ?>
                                    <?php if (session()->get('user_id') == $review['user_id']): ?>
                                        <a href="<?= site_url('reviews/delete/' . $review['id']) ?>" class="btn btn-danger btn-sm float-end">Delete</a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted mt-2">No reviews yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
