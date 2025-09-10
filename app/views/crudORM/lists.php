<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-r from-purple-100 via-pink-100 to-yellow-100 min-h-screen py-12">

<div class="container mx-auto">

    <!-- Heading -->
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Students List</h2>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-lg border border-gray-200 mb-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-purple-600">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Firstname</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Lastname</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach($students as $s): ?>
                <tr class="hover:bg-purple-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $s['id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $s['firstname']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $s['lastname']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700"><?= $s['email']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                        <a href="<?= site_url('students/update/'.$s['id']); ?>" class="bg-green-400 text-white px-3 py-1 rounded-md hover:bg-green-500 transition-colors text-sm font-medium flex items-center gap-1"> Update</a>
                        <a href="<?= site_url('students/delete/'.$s['id']); ?>" onclick="return confirm('Are you sure you want to delete this student?');" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition-colors text-sm font-medium flex items-center gap-1"> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Student Button Centered Below Table -->
    <div class="flex justify-center">
        <a href="<?= site_url('students/create'); ?>" class="bg-purple-600 text-white px-6 py-3 rounded-lg shadow hover:bg-purple-700 transition-colors font-semibold flex items-center gap-2">
            Add Student
        </a>
    </div>

</div>
</body>
</html>
