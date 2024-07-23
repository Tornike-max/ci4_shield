<?= $this->extend('layout/layout'); ?>

<?= $this->section('content'); ?>

<div class="w-full flex justify-center items-center flex-col gap-2">
    <div class="max-w-5xl w-full flex justify-end items-center">
        <button class="py-2 px-3 rounded-md bg-blue-500 hover:bg-blue-600 duration-300 transition-all text-slate-100">
            Add Student
        </button>
    </div>
    <table class="max-w-5xl w-full table table-bordered mb-10">
        <thead class="bg-slate-200 p-3">
            <tr>
                <th class="text-start px-2">Id</th>
                <th class="text-start px-2">Profile Image</th>
                <th class="text-start px-2">Name</th>
                <th class="text-start px-2">Email</th>
                <th class="text-start px-2">Phone</th>
                <th class="text-start px-2">Actions</th>
            </tr>
        </thead>
        <tbody class="border-b-2 bg-gray-100">
            <?php foreach ($students as $student) : ?>
                <tr class="border-2 hover:bg-gray-200">
                    <td class="text-start px-2 py-3"><?= $student['id']; ?></td>
                    <td class="text-start px-2 py-3"><img src="images/<?= $student['profile_image'] ?>" alt="Profile Image" width="50" height="50"></td>
                    <td class="text-start px-2 py-3"><?= $student['name']; ?></td>
                    <td class="text-start px-2 py-3"><?= $student['email']; ?></td>
                    <td class="text-start px-2 py-3"><?= $student['phone']; ?></td>
                    <td class="text-start px-2 py-3 flex items-center gap-1">
                        <a href="<?= base_url('students/edit/') . $student['id'] ?>" class="py-1 px-2 rounded-lg bg-blue-500 hover:bg-blue-600 duration-300 transition-all text-slate-100">Update</a>
                        <form method="post" action="<?= base_url('students/destroy/') . $student['id'] ?>">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="py-1 px-2 rounded-lg bg-red-500 hover:bg-red-600 duration-300 transition-all text-slate-100">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>

        <?= $pager->links('default', 'my_pagination') ?>
    </div>
</div>

<?= $this->endSection(); ?>