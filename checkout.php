<?php
session_start();
if(!isset($_SESSION['user'])){
  // must login before checkout — preserve location
  header('Location: login.php'); exit;
}
// finalize order (demo)
$_SESSION['orders'][] = [
  'user' => $_SESSION['user'],
  'cart' => $_SESSION['cart'] ?? [],
  'time' => time()
];
// clear cart
unset($_SESSION['cart']);
?>
<!doctype html><html><head><meta charset="utf-8"><title>Order complete</title>
<link rel="stylesheet" href="styles.css"></head><body>
<h2>Order complete</h2>
<p>Thanks <?=htmlspecialchars($_SESSION['user'])?> — your order was recorded (demo).</p>
<p><a href="index.php">Return to shop</a></p>
</body></html>
