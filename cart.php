<?php
session_start();
$products = [
  1 => ['id'=>1,'name'=>'Hydrating Serum 30ml','price'=>15000],
  2 => ['id'=>2,'name'=>'Rejuvenating Cream 50ml','price'=>22000],
  3 => ['id'=>3,'name'=>'Facial Cleanser','price'=>9000]
];
$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach($cart as $pid){ $total += $products[$pid]['price']; }

// proceed to checkout
?>
<!doctype html><html><head><meta charset="utf-8"><title>Cart</title>
<link rel="stylesheet" href="styles.css"></head><body>
<a href="index.php">← Continue shopping</a>
<h2>Your cart</h2>
<?php if(empty($cart)): ?>
  <p>Your cart is empty.</p>
<?php else: ?>
  <ul>
  <?php foreach($cart as $pid): ?>
    <li><?=htmlspecialchars($products[$pid]['name'])?> — <?=number_format($products[$pid]['price'])?> XAF</li>
  <?php endforeach; ?>
  </ul>
  <p>Total: <?= number_format($total) ?> XAF</p>
  <a href="checkout.php" class="btn">Checkout</a>
<?php endif; ?>
</body></html>
