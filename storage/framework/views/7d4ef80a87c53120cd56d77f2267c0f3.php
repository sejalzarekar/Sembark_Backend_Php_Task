<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener App</title>

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-10 rounded-lg shadow-md text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to the URL Shortener App</h1>
        <p class="mb-6">Create, manage, and track your short URLs easily.</p>

        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mr-2">Login</a>
            <a href="<?php echo e(route('register')); ?>" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Sign Up</a>
        <?php else: ?>
            <a href="<?php echo e(route('dashboard')); ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Go to Dashboard</a>
        <?php endif; ?>
    </div>

</body>
</html>
<?php /**PATH C:\Users\HP\Desktop\Sembark Tech\url-shortener\resources\views/welcome.blade.php ENDPATH**/ ?>