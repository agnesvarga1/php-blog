<?php
$title = "Login";
include '../app/views/partials/head.php';  // Include il partial della head
?>


<div class="container py-4">
    <h2>Login</h2>
    <form action="http://localhost:8888/php-blog/public/login" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Login</button>
    </form>
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>