<?php

include 'src/config/db_connect.php';

$loginMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $loginMessage = "Email and password are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($userId, $userName, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['user_id'] = $userId;
                $_SESSION['user_name'] = $userName;
                $loginMessage = "Login successful. Welcome back, " . htmlspecialchars($userName) . "!";
                // Optionally redirect after success:
                header("Location: dashboard.php");
                // exit();
            } else {
                $loginMessage = "Invalid password.";
            }
        } else {
            $loginMessage = "Account not found.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ReWear</title>
    <link rel="stylesheet" href="src/css/output.css">
</head>
<body>
<section class="min-h-screen bg-cover bg-center relative overflow-hidden" style="background-image: url('https://placehold.co/600x400');">

    <!-- Blurred background overlay -->
    <div class="absolute inset-0 bg-cover bg-center filter blur-md scale-105 z-0" style="background-image: url('https://placehold.co/600x400');"></div>

    <!-- Main content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        <div class="grid grid-cols-7 bg-white rounded-3xl shadow-2xl max-w-4xl w-full overflow-hidden">

            <!-- Left image side -->
            <div class="col-span-3">
                <img src="https://placehold.co/350x500" alt="Background" class="w-full h-full object-cover" />
            </div>

            <!-- Right login form -->
            <div class="col-span-4 p-8 md:p-10">
                <div class="flex items-center mb-8">
                    <div class="h-8 w-8 rounded-md bg-gradient-to-r from-orange-400 to-red-500"></div>
                    <span class="ml-2 text-xl font-semibold text-gray-800">ReWear</span>
                </div>

                <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome to ReWear</h2>
                <p class="text-gray-600 mb-6 text-sm">
                    ReWear is a fast, simple and secure way to recover data. With it, you can protect your privacy and well being anytime and anywhere.
                </p>

                <!-- Alert message -->
                <?php if (!empty($loginMessage)): ?>
                    <div class="mb-4 text-sm px-4 py-3 rounded bg-<?php echo (strpos($loginMessage, 'successful') !== false) ? 'green' : 'red'; ?>-100 text-<?php echo (strpos($loginMessage, 'successful') !== false) ? 'green' : 'red'; ?>-800">
                        <?= htmlspecialchars($loginMessage) ?>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form method="POST" class="space-y-4 mb-6">
                    <input type="email" name="email" placeholder="Enter your email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" required />

                    <input type="password" name="password" placeholder="Enter your password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm" required />

                    <button type="submit"
                        class="w-full py-3 px-4 bg-orange-100 hover:bg-orange-200 text-gray-800 font-medium rounded-md transition duration-150 text-sm">
                        Log In
                    </button>
                </form>

                <p class="text-sm text-gray-600 text-center mt-6">
                    Don't have an account?
                    <a href="signup.php" class="text-orange-600 hover:text-orange-500 font-medium">Sign up</a>
                </p>

                <p class="text-xs text-gray-400 text-center mt-8">
                    By logging in, you agree to our
                    <a href="#" class="text-orange-600 hover:text-orange-500">Terms of service</a> &
                    <a href="#" class="text-orange-600 hover:text-orange-500">Privacy policy</a>
                </p>
            </div>
        </div>
    </div>
</section>
</body>
</html>
