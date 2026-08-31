<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Rumah Lebah</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <style>
    body{background:#f8f9fa;display:flex;align-items:center;justify-content:center;height:100vh;}
    .login-box{background:#fff;padding:30px;border-radius:8px;box-shadow:0 0 20px rgba(0,0,0,.1);width:350px;}
  </style>
</head>
<body>
<div class="login-box">
  <h2 class="mb-4 text-center">Login Admin</h2>
  <?php
    session_start();
    require_once __DIR__ . '/../includes/config.php';
    $error = '';
    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
        $stmt->execute([$username]);
        $admin = $stmt->fetch();
        if($admin && password_verify($password, $admin['password'])){
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['nama'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
    }
  <?php if($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>
  <form method="POST" action="" class="mt-3">
    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>
</div>
</script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
