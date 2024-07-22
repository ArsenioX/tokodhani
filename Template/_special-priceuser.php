<?php
    $brand = array_map(function ($pro) { return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['special_price_submit'])) {
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

    $in_cart = $Cart->getCartId($product->getData('cart'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Price User</title>
    <style>
        body {
            background-image: url('sip.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
        }
        .grid-item {
            margin-bottom: 20px;
        }
        .product {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .product:hover {
            transform: translateY(-5px);
        }
        .product img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .product h6 {
            margin: 10px 0;
            color: #333;
        }
        .rating span {
            color: #ff9800;
        }
        .price {
            font-size: 18px;
            color: #e67e22;
        }
        .btn {
            margin-top: 10px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #e67e22;
        }
        .btn.btn-success {
            background-color: #4caf50;
        }
        .btn.btn-success:hover {
            background-color: #388e3c;
        }
        .btn.btn-warning {
            background-color: #f39c12;
        }
        .btn.btn-warning:hover {
            background-color: #e67e22;
        }
        .login-notice {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <section id="special-price">
        <div class="container">
            <br>
            <h4 class="font-rubik font-size-20 login-notice">Selamat Datang</h4>
            <div class="grid">
                <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid">
                            </a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span>Rp.<?php echo $item['item_price'] ?? 0 ?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'], $in_cart ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">Di Keranjang</button>';
                                    } else {
                                        echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Masukan Keranjang</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }, $product_shuffle) ?>
            </div>
        </div>
    </section>
</body>
</html>
