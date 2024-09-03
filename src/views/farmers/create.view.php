<div class="card bg-white rounded-md">

    <div class="card-body flex justify-center">

        <form class="text-nowrap capitalize space-y-5 w-full" action="<?= root('farmers') ?>" method="post" enctype="multipart/form-data">

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
                <button class="btn btn-neutral btn-md">SAVE</button>
            </div>
        </form>

    </div>
</div>

<script>
    function toggleInputField(radioGroupName, targetValue, targetFieldId) {
        $('input[name="' + radioGroupName + '"]').on('change', function() {
            if ($(this).val() === targetValue) {
                $('#' + targetFieldId).show();
            } else {
                $('#' + targetFieldId).hide();
            }
        });
    }

    $(document).ready(function() {
        // Call the function for the marital status radio group
        toggleInputField('civil_status', 'Married', 'name_spouse');
    });
</script>