<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tailwind CSS Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="container-2xl mx-auto p-5 bg-blue-600 text-white text-center">
        <h1 class="text-3xl font-bold">Students Management</h1>
        <p>Students List</p>
    </div>

    <div class="w-full flex justify-center items-center mx-auto mt-5">
        <?= $this->renderSection('content') ?>
    </div>

</body>

</html>