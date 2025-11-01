<?php
session_start();
// Simple product array fallback (you can move to DB later)
$products = [
  1 => ['id'=>1,'name'=>'Hydrating Serum 30ml','price'=>15000,'desc'=>'For glowing skin','image'=>'assets/serum.jpg'],
  2 => ['id'=>2,'name'=>'Rejuvenating Cream 50ml','price'=>22000,'desc'=>'Anti-aging cream','image'=>'assets/cream.jpg'],
  3 => ['id'=>3,'name'=>'Facial Cleanser','price'=>9000,'desc'=>'Gentle daily cleanser','image'=>'assets/cleanser.jpg']
];

// render
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>BodyCareBySasha — Shop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="site-header">
  <h1>BodyCareBySasha</h1>
  <nav>
    <?php if(isset($_SESSION['user'])): ?>
      <span>Welcome, <?=htmlspecialchars($_SESSION['user'])?></span>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
    <a href="cart.php">Cart (<?= isset($_SESSION['cart'])?count($_SESSION['cart']):0 ?>)</a>
  </nav>
</header>

<section class="hero">
  <h2>Natural cosmetics & professional treatments</h2>
  <p>Browse products and book services</p>
</section>

<section class="product-list">
  <?php foreach($products as $p): ?>
    <article class="product-card">
      <img src="<?= $p['image'] ?>" alt="<?=htmlspecialchars($p['name'])?>">
      <h3><?=htmlspecialchars($p['name'])?></h3>
      <p><?=htmlspecialchars($p['desc'])?></p>
      <p class="price"><?= number_format($p['price']) ?> XAF</p>
      <a href="product.php?id=<?= $p['id'] ?>" class="btn">View</a>
    </article>
  <?php endforeach; ?>
</section>

<footer>© <?=date('Y')?> BodyCareBySasha</footer>
</body>
</html>
