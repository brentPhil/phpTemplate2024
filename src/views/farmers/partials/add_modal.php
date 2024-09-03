
<!-- Modal -->
<dialog id="newFarmer" class="modal">
    <div class="modal-box rounded-md w-11/12 max-w-5xl">

        <div class="modal-action">

            <form class="text-nowrap capitalize space-y-5 w-full" method="POST" enctype="multipart/form-data">

                <div class="lg:flex gap-8 w-full">

                    <?php view('components/imageUpload.php', ['errors' => \Core\Session::get('errors')]) ?>

                    <div class="space-y-3 w-full border-y-neutral">

                        <div class="sm:flex grid lg:grid-cols-3 gap-3 w-full">

                            <div class="w-full col-span-2">

                                <?= createFormInput('Reference No', 'reference', 'NBI2023-000123456', old('reference'), $errors ?? '') ?>

                            </div>

                            <div>

                                <?php
                                $options = [
                                    'New' => 'New',
                                    'Existing' => 'Existing',
                                ];
                                //radio group reusable component
                                renderRadioGroup('enrollment', $options, 'Enrollment', old('enrollment') ?? '');
                                ?>

                            </div>

                        </div>

                        <!-------------------------------------------------------------------------------------------------------------->

                        <div class="h-[1px] my-5 bg-neutral-300 w-full"></div>

                        <div class="grid md:grid-cols-5 gap-3 w-full">

                            <div class="col-span-2">

                                <?= createFormInput('First name:', 'first_name', '', old('first_name'), $errors ?? '') ?>

                            </div>

                            <div class="col-span-2">

                                <?= createFormInput('Last name', 'surname', '', old('surname'), $errors ?? '') ?>

                            </div>

                            <div>

                                <?= createFormInput('Name Extension', 'extension_name', '', old('extension_name'), $errors ?? '') ?>

                            </div>

                        </div>

                        <!-------------------------------------------------------------------------------------------------------------->

                        <div class="grid sm:grid-cols-2 xl:grid-cols-5 gap-3 w-full">

                            <div class="xl:col-span-2">

                                <?= createFormInput('Middle name', 'middle_name', 'daily', old('middle_name'), $errors ?? '') ?>

                            </div>

                            <div class="xl:col-span-2">

                                <?= createFormInput('Mobile No', 'contact_number', 'daily', old('contact_number'), $errors ?? '', 'number') ?>

                            </div>

                            <div class="xl:col-span-1">

                                <?= createFormInput('Date of Birth', 'date_birth', 'daily', old('date_birth'), $errors ?? '', 'date') ?>

                            </div>

                            <div class="xl:col-span-2">

                                <?php

                                renderSelectDropdown(
                                    'sex',
                                    [
                                        ['id' => 'Male', 'name' => 'Male'],
                                        ['id' => 'Female', 'name' => 'Female']
                                    ],
                                    'Gender',
                                    old('sex') ?? '',
                                    $errors ?? [],
                                )

                                ?>

                            </div>

                            <div class="sm:flex xl:col-span-3 gap-3">

                                <div class="">

                                    <?php
                                    $options = [
                                        'Single' => 'Single',
                                        'Married' => 'Married',
                                    ];
                                    //radio group reusable component
                                    renderRadioGroup('civil_status', $options, 'Civil Status', old('civil_status') ?? '');
                                    ?>

                                </div>

                                <div class="w-full" id="name_spouse" style="display: <?= old('civil_status') === 'Married' ? 'block' : 'none'?>">

                                    <?= createFormInput('Name of Spouse', 'name_spouse', 'Enter your spouse’s name', old('name_spouse'), $errors ?? '') ?>

                                </div>

                            </div>

                        </div>

                        <!-------------------------------------------------------------------------------------------------------------->

                        <div class="h-[1px] my-5 bg-neutral-300 w-full"></div>

                        <div class="grid md:grid-cols-2 xl:grid-cols-5 gap-3 w-full">

                            <div class="sm:col-span-2 xl:col-span-2">

                                <?= createFormInput('Building No', 'building_no', 'Unit 301', old('building_no'), $errors ?? '') ?>

                            </div>

                            <div class="xl:col-span-2">

                                <?= createFormInput('Street', 'street', '123, Main Street', old('street'), $errors ?? '') ?>

                            </div>

                            <div class="xl:col-span-1">

                                <?php

                                renderSelectDropdown(
                                    'barangays_id',
                                    $barangays ?? [],
                                    'Select Barangay',
                                    old('barangays_id') ?? '',
                                    $errors ?? [],
                                )

                                ?>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="card-actions justify-end">
                    <button type="button" onclick="handleSubmitForm()" class="btn btn-neutral btn-md">
                        <span id="loadingSpinner" class="loading loading-spinner hidden"></span>
                        SAVE
                    </button>
                </div>
            </form>

        </div>
    </div>
</dialog>

<script>

    // Function to handle form submission via AJAX
    function handleSubmitForm() {
        // Create a FormData object
        const formData = new FormData();
        formData.append('first_name', $('#first_name').val());
        formData.append('surname', $('#surname').val());
        formData.append('sex', $('#sex').val());
        formData.append('building_no', $('#building_no').val());
        formData.append('street', $('#street').val());
        formData.append('barangays_id', $('#barangays_id').val());
        formData.append('contact_number', $('#contact_number').val());
        formData.append('date_birth', $('#date_birth').val());
        formData.append('civil_status', $('#civil_status').val());
        formData.append('enrollment', $('#enrollment').val());
        formData.append('reference', $('#reference').val());

        if ($('#civil_status').val() === 'Married') {
            formData.append('name_spouse', $('#name_spouse').val());
        }

        // Check if there's a file to upload
        const profileInput = $('#profileInput')[0];
        if (profileInput && profileInput.files.length > 0) {
            formData.append('profile', profileInput.files[0]);
        } else {
            // Optionally handle the case where no file is selected
            console.log('No file selected for profile.');
        }

        console.log(formData);

        // Use the generic function for submission
        submitFormGeneric({
            formData: formData,
            apiEndpoint: 'api/farmers/store.php',
            modalSelector: '#newFarmer',  // Optional, if you have a modal
            onSuccess: function(message) {
                console.log('Success:', message);
                // Additional success handling if needed
            },
            onError: function(errors) {
                console.log('Errors:', errors);
                // Additional error handling if needed
            }
        });
    }

</script>