<?php
include 'src/config/session.php';
include 'src/config/db_connect.php';
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

$sql = "SELECT * FROM listing WHERE id = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="src/css/output.css" />
  <title>Product Detail</title>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
   <header class="bg-green-600">
    <nav class="text-white px-6 py-4 flex justify-between items-center container mx-auto">
      <div class="flex items-center space-x-2">
        <div class="bg-white p-2 rounded-md">
          <img alt="Logo" class="h-6 w-6" src="../../uploads/logo.png">
        </div>
        <span class="text-xl font-bold">ReWear</span>
      </div>
      <ul class="flex space-x-6 text-sm font-medium">
        <li><a class="hover:text-gray-300" href="/">Home</a></li>
        <li><a class="hover:text-gray-300" href="#">Browse</a></li>
        <li><a class="hover:text-gray-300" href="/login">Login</a></li>
        <li><a class="hover:text-gray-300" href="/signup">Sign Up</a></li>
      </ul>
    </nav>
  </header>

  <!-- Product Content -->
  <main class="container mx-auto my-20 px-4">
    <?php if ($product): ?>
      <div class="">
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="col-span-1">
                <?php
                    $images = json_decode($product['listing_img'], true);
                    foreach ($images as $image) {
                    echo '<img src="' . htmlspecialchars($image) . '" alt="Product Image" class="rounded-lg w-full object-cover h-48">';
                    }
                ?>

            </div>
            <div class="col-span-2 flex flex-col justify-between">
                <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($product['listing_name']) ?></h1>
                <p class="text-gray-700 mb-6"><?= nl2br(htmlspecialchars($product['listing_desc'])) ?></p>
                <div class="flex items-center space-x-4 mb-6">
                    <button class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 w-fit">Start Swap</button>
                    <button class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 w-fit">Redeem with points</button>

                </div>

            </div>

        </div>
        

       
      </div>
    <?php else: ?>
      <p class="text-center text-gray-500">Product not found.</p>
    <?php endif;

    // Fetch latest 5 listings
        $sql = "SELECT * FROM listing ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);
        ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 py-6">
        <?php while ($row = $result->fetch_assoc()): ?>
            <?php $images = json_decode($row['listing_img'], true); ?>
            <div class="bg-white shadow rounded p-4">
            <img src="<?= htmlspecialchars($images[0] ?? 'https://placehold.co/300x300') ?>" alt="Product Image" class="h-40 w-full object-cover rounded mb-3">
            <h2 class="text-lg font-bold mb-1"><?= htmlspecialchars($row['listing_name']) ?></h2>
            <p class="text-sm text-gray-600"><?= htmlspecialchars(mb_strimwidth($row['listing_desc'], 0, 80, '...')) ?></p>
            <div class="mt-3 flex justify-between items-center">

                <a href="product_detail.php?product_id=<?= htmlspecialchars($row['id']) ?>" class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 w-fit">View</a>
            </div>
            </div>
        <?php endwhile; ?>
        </div>
  </main>

</body>
</html>
