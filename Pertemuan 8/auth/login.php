<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php include '../includes/alert.php'; ?>
            <div class="card">
                <div class="card-header">
                    <h2>Login Form</h2>
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
                <div class="card-body">
                    <form action="login-process.php" method="post">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
