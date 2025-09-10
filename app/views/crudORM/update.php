<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gradient-to-r from-purple-100 via-pink-100 to-yellow-100 min-h-screen flex items-center justify-center py-12">

<div class="w-full max-w-md">
  <div class="bg-white shadow-2xl rounded-3xl border border-gray-200">
    <div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white text-center py-6">
      <h4 class="text-2xl font-bold tracking-wide">Update User</h4>
      <p class="text-purple-100 mt-1 text-sm">Edit the details below</p>
    </div>
    <div class="p-8">

      <form action="<?=site_url(url: '/students/update/'.$stu['id']);?>" method="POST" class="space-y-5">
        <input type="text" id="lastname" name="lastname" value="<?=$stu['lastname'];?>" 
               class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 text-gray-700 placeholder-gray-400 font-medium">

        <input type="text" id="firstname" name="firstname" value="<?=$stu['firstname'];?>" 
               class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 text-gray-700 placeholder-gray-400 font-medium">

        <input type="text" id="email" name="email" value="<?=$stu['email'];?>" 
               class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 text-gray-700 placeholder-gray-400 font-medium">

        <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-xl font-semibold hover:bg-purple-700 transition-colors shadow-lg">Update User</button>
      </form>

    </div>
  </div>
</div>

</body>
</html>
  