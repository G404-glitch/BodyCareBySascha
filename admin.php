<?php
session_start();
if(!isset($_SESSION['user']) || !($_SESSION['is_admin'] ?? false)){
  // not admin — hide location, send not-found or redirect
  header('HTTP/1.0 403 Forbidden');
  echo 'Forbidden';
  exit;
}
// Admin actions: quick product list and fake order list
$orders = $_SESSION['orders'] ?? [];
?>
<!doctype html><html><head><meta charset="utf-8"><title>Admin - BodyCareBySasha</title>
<link rel="stylesheet" href="styles.css"></head><body>
<h1>Admin Dashboard</h1>
<p>Welcome, <?=htmlspecialchars($_SESSION['user'])?></p>
<section>
  <h2>Quick site options</h2>
  <ul>
    <li>View orders (demo): <?=count($orders)?></li>
    <li>Manage products: (use FTP to replace assets / update index.php product array)</li>
  </ul>
</section>
<p><a href="index.php">Go to site</a> — <a href="logout.php">Logout</a></p>
</body></html>
