<div class="card flex w-full bg-white rounded-md">
    <div class="card-body">
        <div class="flex justify-between">
            <h2 class="card-title">Farmers</h2>
            <button class="btn btn-sm rounded-md"  onclick="add_farmer.showModal()"><i class="bi bi-file-earmark-plus-fill"></i>add</button>
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
                <th></th>
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
                                <div class="font-bold">
                                    <?= htmlspecialchars($farmer['surname'] . ', ' . $farmer['first_name'] . ' ' . $farmer['middle_name']) ?>
                                </div>
                                <div class="text-sm opacity-50">
                                    <?= htmlspecialchars($farmer['municipality'] . ', ' . $farmer['province']) ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($farmer['sex']) ?></td>
                    <td><?= htmlspecialchars($farmer['contact_number']) ?></td>
                    <td><?= getFormattedDate($farmer['date_birth'], 'F j, Y') ?></td>
                    <td><?= htmlspecialchars($farmer['reference']) ?></td>
                    <td><?= htmlspecialchars($farmer['enrollment']) ?></td>
                    <td><?= getFormattedDate($farmer['created_at']) ?></td>
                    <td>
                        <form method="post">
                            <label>
                                <input type="hidden" value="<?= htmlspecialchars($farmer['id'])?>">
                            </label>
                            <button type="submit" class="btn btn-sm btn-error rounded-md">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require 'modals/farmer_modal.php' ?>
<?php require 'modals/farmer_add_modal.php' ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#farmersTable').DataTable({
            responsive: true
        });
    });
</script>
