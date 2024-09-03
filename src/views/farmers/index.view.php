<div class="card flex w-full bg-white rounded-md">
    <div class="card-body">
        <div class="flex justify-between">
            <h2 class="card-title">Farmers</h2>
            <button class="btn btn-sm btn-neutral rounded-md" onclick="newFarmer.showModal()">
                <i class="bi bi-file-earmark-plus-fill"></i>
                add
            </button>
        </div>

        <table id="farmersTable" class="table w-full capitalize">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Enrollment</th>
                <th>Contact Number</th>
                <th>Date of Birth</th>
                <th>Reference</th>
                <th>Created At</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($farmers ?? [] as $farmer):
                $profile = $farmer['profile'] ? 'uploads/' . $farmer['profile'] : false;
                ?>
                <tr class="hover text-nowrap cursor-pointer view-farmer" data-id="<?= $farmer['id'] ?>">
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar indicator">
                                <span class="indicator-item badge border-none p-0">
                                    <button class="btn btn-circle btn-xs z-[2] p-0 text-white
                                    <?= $farmer['sex'] === 'Male'
                                        ? 'bg-blue-500 hover:bg-blue-600' : 'bg-pink-500 hover:bg-pink-600' ?>">
                                        <?= $farmer['sex'] === 'Male'
                                            ? "<i class='bi bi-gender-male'></i>"
                                            : '<i class="bi bi-gender-female"></i>'
                                        ?>
                                    </button>
                                </span>
                                <div class="mask mask-squircle h-12 w-12">
                                    <img src="<?= assets( $profile, 'images/default.svg')?>" alt="Avatar Tailwind CSS Component" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">
                                    <?= htmlspecialchars($farmer['surname'] . ', ' . $farmer['first_name'] . ' ' . $farmer['middle_name']. ' ' . $farmer['extension_name']) ?>
                                </div>
                                <div class="text-sm opacity-50">
                                    <?= htmlspecialchars($farmer['barangay'] . ', ' .$farmer['building_no'] . ', ' . $farmer['street']) ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($farmer['enrollment']) ?></td>
                    <td><?= htmlspecialchars($farmer['contact_number']) ?></td>
                    <td><?= getFormattedDate($farmer['date_birth'], 'F j, Y') ?></td>
                    <td><?= htmlspecialchars($farmer['reference']) ?></td>
                    <td><?= getFormattedDate($farmer['created_at']) ?></td>
                    <td>
                        <div class="flex gap-2">
                            <button data-tip="Update" class="tooltip tooltip-bottom btn btn-square btn-sm btn-warning rounded-md">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <div class="" >

                            <button data-tip="Delete" class="tooltip tooltip-bottom btn btn-square btn-sm btn-error rounded-md" data-id="<?= $farmer['id'] ?>" onclick="showRemoveModal(this)">
                                <i class="bi bi-file-earmark-x-fill"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'partials/delete_modal.php'?>
<?php require 'partials/farmer_modal.php'?>
<?php require 'partials/add_modal.php'?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#farmersTable').DataTable({
            responsive: {
                details: false
            },
            scrollCollapse: true,
            scrollY: '53.5vh',
            columnDefs: [
                { responsivePriority: 1, targets: -1 }
            ]
        });
    });
</script>