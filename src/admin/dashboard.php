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
  <div class="container mx-auto py-6">
        <dic class="grid grid-cols-3 gap-4 p-6">
            <div class="col-span-1">
                Manage Users
            </div>
            <div class="col-span-1">
                Manage Orders
            </div>
            <div class="col-span-1">
                Manage Listing
            </div>

        </dic>

  </div>
    
</body>
</html>