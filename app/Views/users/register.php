<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Register</h2>
        <form action="<?= site_url('users/store') ?>" method="post">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="<?= site_url('users/login') ?>">Login</a></p>
    </div>
</body>
</html>
