<?php
include 'src/config/session.php';
include 'src/config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume you're storing logged-in user ID in session
    $user_id = $_SESSION['user_id'] ?? 1; // Fallback to user ID 1 for testing

    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $imagePaths = [];

    if (empty($name) || empty($description)) {
        die("Product name and description are required.");
    }

    // Ensure the uploads folder exists
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Process uploaded files
    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $originalName = basename($_FILES['images']['name'][$key]);
        $targetPath = $uploadDir . time() . '_' . preg_replace("/[^a-zA-Z0-9._-]/", "_", $originalName);

        if (move_uploaded_file($tmpName, $targetPath)) {
            $imagePaths[] = $targetPath;
        }
    }

    // Save to database
    $imagesJson = json_encode($imagePaths);

    $stmt = $conn->prepare("INSERT INTO listing (listing_user, listing_name, listing_desc, listing_img) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $name, $description, $imagesJson);

    if ($stmt->execute()) {
        echo "Product added successfully!";
        // You can also redirect to another page:
        // header("Location: dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/output.css">
    <title>Document</title>
</head>
<body class="bg-gray-50">

  <!-- Navbar -->
  <header class="bg-blue-600">
    <nav class="text-white px-6 py-4 flex justify-between items-center container mx-auto">
      <div class="flex items-center space-x-2">
        <div class="bg-white p-2 rounded-md">
          <img alt="Logo" class="h-6 w-6" src="https://placehold.co/600x400">
        </div>
        <span class="text-xl font-bold">Logo</span>
      </div>
      <ul class="flex space-x-6 text-sm font-medium">
        <li><a class="hover:text-gray-300" href="/">Home</a></li>
        <li><a class="hover:text-gray-300" href="#">Browse</a></li>
        <li><a class="hover:text-gray-300" href="/login">Login</a></li>
        <li><a class="hover:text-gray-300" href="/signup">Sign Up</a></li>
      </ul>
    </nav>
  </header>

  <!-- Profile & Form Section -->
  <div class="container mx-auto py-6">
    <div class="grid grid-cols-3 gap-4 p-6">
      <!-- Left Image -->
      <div class="col-span-1">
        <img alt="User" class="rounded-full shadow-md" src="https://placehold.co/400x400" />
      </div>

      <!-- Form -->
      <div class="col-span-2">
        <form>
          <div class="grid grid-cols-2 gap-5">
            <div class="col-span-1 mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
              <input id="name" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
            </div>

            <div class="col-span-1 mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
              <input id="email" type="email" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
            </div>

            <div class="col-span-1 mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
              <input id="phone" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
            </div>

            <div class="col-span-1 mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Random Data</label>
              <input id="randomData" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
            </div>

            <div class="col-span-2 mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-2">Information</label>
              <textarea id="info" class="w-full h-32 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm resize-none"></textarea>
            </div>

            <div class="col-span-2 flex gap-3">
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Info</button>
              <button type="button" onclick="openModal()" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container mx-auto">
    <h1 class="text-lg font-semibold text-gray-800 mb-5 mt-2">My Listing</h1>
    <div class="grid grid-cols-3 gap-4">
      <!-- Example Product Card -->
   <?php
        $user_id = $_SESSION['user_id'] ?? 1;

        $sql = "
            SELECT * 
            FROM `listing`
            WHERE `listing_user` = $user_id
        ";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $images = json_decode($row['listing_img'], true);
            $firstImg = !empty($images[0]) ? $images[0] : 'https://placehold.co/200x200';

            echo '
            <div class="col-span-1 bg-white rounded-lg shadow-md p-4">
                <img src="' . htmlspecialchars($firstImg) . '" class="w-full h-32 object-cover rounded mb-4">
                <h2 class="text-lg font-semibold mb-2">' . htmlspecialchars($row['listing_name']) . '</h2>
                <p class="text-gray-600 mb-4">' . htmlspecialchars($row['listing_desc']) . '</p>
                <a href="product_detail.php?product_id='. htmlspecialchars($row['id']) .'" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">View Details</a>
            </div>';
        }
        ?>


  </div>

  <!-- Modal -->
  <div id="productModal" class="fixed inset-0 hidden items-center justify-center z-50 bg-[#00000031] bg-opacity-40 backdrop-blur-sm">
  <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-lg">
    <!-- Modal Header -->
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-gray-800">Add New Product</h2>
      <button onclick="closeModal()" class="text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
    </div>

    <!-- Product Form -->
    <form id="productForm" method="POST" enctype="multipart/form-data">
      
      <!-- Image Upload + Preview -->
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Product Images</label>
        <input id="images" name="images[]" type="file" accept="image/*" multiple onchange="previewImages()" class="w-full border border-gray-300 rounded px-3 py-2" required />
        <div id="imagePreview" class="mt-2 grid grid-cols-3 gap-2"></div>
      </div>

      <!-- Product Name -->
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
        <input name="name" type="text" placeholder="Enter product name" class="w-full border border-gray-300 rounded px-3 py-2" required />
      </div>

      <!-- Product Description -->
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Product Description</label>
        <textarea name="description" placeholder="Enter product description" class="w-full border border-gray-300 rounded px-3 py-2 h-32 resize-none" required></textarea>
      </div>

      <!-- Submit Buttons -->
      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Submit</button>
      </div>
    </form>
  </div>
</div>

  <!-- Modal JS -->
  <script>
    function openModal() {
  const modal = document.getElementById('productModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeModal() {
  const modal = document.getElementById('productModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

function previewImages() {
  const preview = document.getElementById('imagePreview');
  const files = document.getElementById('images').files;
  preview.innerHTML = '';

  Array.from(files).forEach(file => {
    const reader = new FileReader();
    reader.onload = e => {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.className = "w-full h-24 object-cover rounded border";
      preview.appendChild(img);
    };
    reader.readAsDataURL(file);
  });
}
  </script>
</body>
</html>