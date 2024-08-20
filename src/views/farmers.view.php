<div class="card flex w-full bg-white rounded-md">
    <div class="card-body">
        <div class="flex justify-between">
            <h2 class="card-title">Farmers</h2>
            <button class="btn btn-sm rounded-md"><i class="bi bi-file-earmark-plus-fill"></i>add</button>
        </div>

        <table id="farmersTable" class="table w-full">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Sex</th>
                <th>Contact Number</th>
                <th>Date of Birth</th>
                <th>Reference</th>
                <th>Enrollment</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($farmers as $farmer): ?>
                <tr class="hover text-nowrap cursor-pointer view-farmer" data-id="<?= $farmer['id'] ?>">
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12">
                                    <img src="<?= assets('', 'images/default.svg')?>" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><?= $farmer['surname'] . ', ' . $farmer['first_name'] . ' ' . $farmer['middle_name'] ?></div>
                                <div class="text-sm opacity-50"><?= $farmer['municipality'] . ', ' . $farmer['province'] ?></div>
                            </div>
                        </div>
                    </td>
                    <td><?= $farmer['sex'] ?></td>
                    <td><?= $farmer['contact_number'] ?></td>
                    <td><?= getFormattedDate($farmer['date_birth'], 'F j, Y') ?></td>
                    <td><?= $farmer['reference'] ?></td>
                    <td><?= $farmer['enrollment'] ?></td>
                    <td><?= getFormattedDate($farmer['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require 'modals/farmer_modal.php' ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#farmersTable').DataTable({
            responsive: true
        });
    });
</script>
