<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-r from-purple-100 via-pink-100 to-yellow-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-lg">
  <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-200">
    <div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white text-center py-6">
      <h4 class="text-2xl font-bold tracking-wide">Add New Student</h4>
      <p class="text-purple-100 mt-1 text-sm">Fill in the details below</p>
    </div>
    <div class="p-8">

      <?php if (isset($insert_id)): ?>
        <?php if ($insert_id): ?>
          <div class="bg-green-50 border-l-4 border-green-400 text-green-700 p-4 rounded-md mb-6 shadow-md" role="alert">
            🎉 <span class="font-semibold">Success!</span> Student added successfully.
            <span class="float-right cursor-pointer text-green-800" onclick="this.parentElement.style.display='none';">&times;</span>
          </div>
        <?php else: ?>
          <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-4 rounded-md mb-6 shadow-md" role="alert">
            ❌ <span class="font-semibold">Error!</span> Insert failed. Please try again.
            <span class="float-right cursor-pointer text-red-800" onclick="this.parentElement.style.display='none';">&times;</span>
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <form action="<?= site_url('students/create'); ?>" method="POST" class="space-y-5">
        <input type="text" id="lastname" name="lastname" placeholder="Enter your lastname" required
               class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 text-gray-700 placeholder-gray-400 font-medium">

        <input type="text" id="firstname" name="firstname" placeholder="Enter your firstname" required
               class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 text-gray-700 placeholder-gray-400 font-medium">

        <input type="email" id="email" name="email" placeholder="Enter your email" required
               class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 text-gray-700 placeholder-gray-400 font-medium">

        <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition-colors shadow-lg">Add Student</button>

        <a href="<?=site_url('students/get-all');?>" class="w-full block text-center bg-pink-500 text-white py-3 rounded-xl font-semibold hover:bg-pink-600 transition-colors shadow-lg">Back</a>
      </form>

    </div>
  </div>
</div>

</body>
</html>
