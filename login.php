<?php
session_start();
$err = '';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $user = $_POST['user'] ?? '';
  $pass = $_POST['pass'] ?? '';

  // Admin credential requested by you:
  if($user === 'Natasha' && $pass === 'Puissance7'){
    $_SESSION['user'] = $user;
    $_SESSION['is_admin'] = true; // admin flag
    header('Location: admin.php'); exit;
  }

  // else: simple regular user login (demo: any non-empty combination becomes a user)
  if($user !== '' && $pass !== ''){
    $_SESSION['user'] = $user;
    $_SESSION['is_admin'] = false;
    header('Location: index.php'); exit;
  }

  $err = 'Invalid credentials';
}
?>
<!doctype html><html><head><meta charset="utf-8"><title>Login</title>
<link rel="stylesheet" href="styles.css"></head><body>
<h2>Login to BodyCareBySasha</h2>
<?php if($err): ?><p class="error"><?=htmlspecialchars($err)?></p><?php endif;?>
<form method="post">
  <label>Username <input name="user" required></label><br>
  <label>Password <input name="pass" type="password" required></label><br>
  <button type="submit" class="btn">Login</button>
</form>
<p>Admin account: username <strong>Natasha</strong> / password <strong>Puissance7</strong> (this is how admin access works).</p>
</body></html>
