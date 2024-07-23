<?= $this->extend('layout/layout'); ?>

<?= $this->section('content'); ?>

<div class="max-w-3xl w-full mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl w-full font-semibold mb-6">Edit Student</h2>
    <form class="w-full" action="/students/update/<?= $student['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">


        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" value="<?= $student['name']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="<?= $student['email']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= $student['phone']; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="profile_image" class="block text-gray-700 text-sm font-bold mb-2">Profile Image</label>
            <input type="file" id="profile_image" name="profile_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <img src="<?= $student['profile_image']; ?>" alt="Profile Image" width="100" class="mt-2">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>