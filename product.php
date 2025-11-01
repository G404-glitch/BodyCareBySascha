<?php
session_start();
$products = [
  1 => ['id'=>1,'name'=>'Hydrating Serum 30ml','price'=>15000,'desc'=>'For glowing skin','image'=>'assets/serum.jpg'],
  2 => ['id'=>2,'name'=>'Rejuvenating Cream 50ml','price'=>22000,'desc'=>'Anti-aging cream','image'=>'assets/cream.jpg'],
  3 => ['id'=>3,'name'=>'Facial Cleanser','price'=>9000,'desc'=>'Gentle daily cleanser','image'=>'assets/cleanser.jpg']
];
$id = (int)($_GET['id'] ?? 0);
if(!isset($products[$id])){
  header('Location: index.php'); exit;
}
$p = $products[$id];

// add-to-cart action
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['add'])){
  $_SESSION['cart'][] = $id;
  header('Location: cart.php'); exit;
}
?>
<!doctype html>
<html><head><meta charset="utf-8"><title><?=htmlspecialchars($p['name'])?></title>
<link rel="stylesheet" href="styles.css"></head><body>
<a href="index.php">← Back</a>
<main class="product-single">
  <img src="<?= $p['image'] ?>" alt="<?=htmlspecialchars($p['name'])?>">
  <h1><?=htmlspecialchars($p['name'])?></h1>
  <p><?=htmlspecialchars($p['desc'])?></p>
  <p class="price"><?= number_format($p['price']) ?> XAF</p>

  <form method="post">
    <button name="add" class="btn">Buy</button>
  </form>

  <p>To complete orders, you will be asked to login at checkout.</p>
</main>
</body></html>
