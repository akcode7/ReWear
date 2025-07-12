<?php
session_start();
include 'src/config/db_connect.php';


// Include DB connection
include 'src/config/db_connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    // Get form values
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already registered.";
        $stmt->close();
        exit();
    }
    $stmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        echo "Signup successful. Welcome, " . htmlspecialchars($name) . "!";
        // Optionally redirect: header("Location: dashboard.php");
    } else {
        echo "Something went wrong. Please try again.";
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
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVG Icon with Tailwind</title>
    <link rel="stylesheet" href="src/css/output.css">
</head>
<body>
    <section class="min-h-screen bg-cover bg-center relative overflow-hidden" style="background-image: url('https://placehold.co/600x400');">
        
        <!-- Blurred background overlay -->
        <div class="absolute inset-0 bg-cover bg-center filter blur-md scale-105 z-0" style="background-image: url('https://placehold.co/600x400');"></div>
      
        <!-- Main content -->
        <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
          <div class="grid grid-cols-7 bg-white rounded-3xl shadow-2xl max-w-6xl w-full  overflow-hidden">
            
            <!-- Left image side -->
            <div class="col-span-3">
              <img src="https://placehold.co/350x500" alt="Background" class="w-full h-full object-cover" />
            </div>
            
            <!-- Right login form -->
            <div class="col-span-4 p-8 md:p-10">
              <div class="flex items-center mb-8">
                <div class="h-8 w-8 rounded-md bg-gradient-to-r from-orange-400 to-red-500"></div>
                <span class="ml-2 text-xl font-semibold text-gray-800">Recova</span>
              </div>
      
              <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome to Recova</h2>
              <p class="text-gray-600 mb-6 text-sm">
                Recova is a fast, simple and secure way to recover data. With it, you can protect your privacy and well being anytime and anywhere.
              </p>
      
              <!-- Social buttons -->
              <div class="space-y-3 mb-6">
                <button class="w-full flex items-center justify-center gap-2 py-3 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                  <img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google" class="h-5 w-5" />
                  Continue with Google
                </button>
      
                <button class="w-full flex items-center justify-center gap-2 py-3 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                  <img src="https://cdn-icons-png.flaticon.com/512/732/732221.png" alt="Microsoft" class="h-5 w-5" />
                  Continue with Microsoft
                </button>
              </div>
      
              <!-- Divider -->
              <div class="relative my-5">
                <div class="absolute inset-0 flex items-center">
                  <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                  <span class="px-2 bg-white text-gray-500">Or</span>
                </div>
              </div>
              <form id="loginForm" method="POST">
                <!-- Email input -->
                <div class="mb-4 space-y-2">
                  <!-- name -->
                  <input type="text" id="name" name="name" placeholder="Enter your name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
                    <!-- email -->
                  <input type="email" name="email" id="email" placeholder="Enter your email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
                    <!-- pass -->
                  <input type="password" name="password" id="password" placeholder="Enter your password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" />
                </div>
        
                <button class="w-full py-3 px-4 bg-orange-100 hover:bg-orange-200 text-gray-800 font-medium rounded-md transition duration-150 text-sm">
                  Sign Up
                </button>

              </form>
      
              <p class="text-sm text-gray-600 text-center mt-6">
                Already have an account? 
                <a href="#" class="text-orange-600 hover:text-orange-500 font-medium">Sign in</a>
              </p>
      
              <p class="text-xs text-gray-400 text-center mt-8">
                By signing up, you agree to our 
                <a href="#" class="text-orange-600 hover:text-orange-500">Terms of services</a> & 
                <a href="#" class="text-orange-600 hover:text-orange-500">Privacy policy</a>
              </p>
            </div>
          </div>
        </div>
    </section>
</body>
</html>