<?php
include '../config/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/output.css">
    <title>Admin Dashboard</title>
</head>
<body>
     <!-- Navbar -->
  <header class="bg-green-600">
    <nav class="text-white px-6 py-4 flex justify-between items-center container mx-auto">
      <div class="flex items-center space-x-2">
        <div class="bg-white p-2 rounded-md">
          <img alt="Logo" class="h-6 w-6" src="../../uploads/logo.png">
        </div>
        <span class="text-xl font-bold">ReEear</span>
      </div>
      <ul class="flex space-x-6 text-sm font-medium">
        <li><a class="hover:text-gray-300" href="/">Home</a></li>
        <li><a class="hover:text-gray-300" href="#">Browse</a></li>
        <li><a class="hover:text-gray-300" href="/login">Login</a></li>
        <li><a class="hover:text-gray-300" href="/signup">Sign Up</a></li>
      </ul>
    </nav>
  </header>
  <div class="container mx-auto py-6">
        <div class="grid grid-cols-3 gap-4 p-6 bg-gray-200 rounded-2xl">
            <div class="col-span-1 text-center">
                <h1 class="text-lg font-semibold text-black">
                    Manage Users
                </h1>
            </div>
            <div class="col-span-1 text-center">
                <h1 class="text-lg font-semibold text-black">
                    Manage Orders
                </h1>
            </div>
            <div class="col-span-1 text-center">
                <h1 class="text-lg font-semibold text-black">
                    Manage Listing
                </h1>
            </div>
        </div>
        <div class="text-center mt-6 mb-4">
            <h1 class="text-lg font-semibold text-gray-900">Manage Users</h1>
        </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-200 rounded-xl">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">Id</th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">User Name</th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">User Email</th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">Date</th>
                    </tr>
                </thead>
             <tbody id="calls-table-body">
    <?php
    $stmt = $conn->prepare("SELECT * FROM `users` ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->get_result();

    $count = 1; // Start count

    if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
    ?>
        <tr>
            <td class="px-6 py-4"><?= $count++ ?></td>
            <td class="px-6 py-4"><?= htmlspecialchars($row['name']) ?></td>
            <td class="px-6 py-4"><?= htmlspecialchars($row['email']) ?></td>
            <td class="px-6 py-4"><?= htmlspecialchars($row['created_at']) ?></td>
            <td class="px-6 py-4">
                <!-- Optional actions like Edit/Delete can go here -->
            </td>
        </tr>
    <?php
        endwhile;
    else:
    ?>
        <tr>
            <td colspan="5" class="px-6 py-4 text-center text-lg font-semibold text-gray-700">
                No users found.
            </td>
        </tr>
    <?php
    endif;
    $stmt->close();
    ?>
</tbody>


    
</body>
</html>