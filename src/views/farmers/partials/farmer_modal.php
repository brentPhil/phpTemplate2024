<dialog id="farmer" class="modal">
    <div class="modal-box rounded-md bg-white p-0">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div class="flex items-end gap-3 px-4 py-5 sm:px-6">
            <div class="avatar">
                <div class="w-24 rounded">
                    <img id="profile" src="<?= assets( '', 'images/default.svg')?>"  alt="profile"/>
                </div>
            </div>
            <div class="h-fit">
                <h3 id="fullname" class="text-xl font-bold leading-6 text-gray-900">Dagami, Ramel Cabrera</h3>
                <p id="contact_number" class="mt-1 max-w-2xl text-sm text-gray-500"><span>094913417778</span></p>
                <div class="tooltip tooltip-bottom" data-tip="Reference No">
                <p id="reference" class="badge badge-accent mt-2 flex max-w-2xl gap-2 rounded-md p-3 text-sm">NBI2023-000123456</p>
                </div>
            </div>
        </div>
        <div class="border-t">
            <dl>
                <div class="bg-gray-50 px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Enrollment</dt>
                    <dd class="text-sm text-gray-900 col-span-2 mt-0">New</dd>
                </div>
                <div class="bg-white px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Date of birth</dt>
                    <dd id="date_birth" class="text-sm text-gray-900 col-span-2 mt-0">December 26, 1983</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Gender</dt>
                    <dd id="gender" class="text-sm text-gray-900 col-span-2 mt-0">Male</dd>
                </div>
                <div class="bg-white px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Civil Status</dt>
                    <dd id="civil_status" class="text-sm text-gray-900 col-span-2 mt-0">Married</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Spouse</dt>
                    <dd id="name_spouse" class="text-sm text-gray-900 col-span-2 mt-0"></dd>
                </div>
                <div class="bg-white px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                    <dd id="address" class="text-sm text-gray-900 col-span-2 mt-0">Unit 301</dd>
                </div>
<!--                <div class="bg-gray-50 px-4 py-5 grid grid-cols-3 gap-4 sm:px-6">-->
<!--                    <dt class="text-sm font-medium text-gray-500">Barangay</dt>-->
<!--                    <dd id="barangay" class="text-sm text-gray-900 col-span-2 mt-0">District I Poblacion</dd>-->
<!--                </div>-->
            </dl>
        </div>
    </div>
</dialog>

<script type="text/javascript">
    $(document).ready(function() {

        function formatDate(dateString) {
            // Create a new Date object from the string
            const date = new Date(dateString);

            // Define an array of month names
            const monthNames = [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            // Extract the year, month, and day from the date object
            const year = date.getFullYear();
            const month = monthNames[date.getMonth()]; // getMonth() returns 0-11
            const day = date.getDate();

            // Return the formatted date
            return `${month} ${day}, ${year}`;
        }

        // Attach the click event to elements with a specific class or ID
        $('.view-farmer').on('dblclick', function() {
            // Get the ID from the clicked element
            const itemId = $(this).attr('data-id');
            // Make an AJAX request to the PHP file
            $.ajax({
                url: 'api/getFarmer.php', // URL to the PHP file
                type: 'POST',             // or 'GET' depending on your requirement
                data: { id: itemId },     // Pass the ID to the PHP file
                dataType: 'json',         // Expect JSON data in response
                success: function(response) {
                    // Loop through each key in the JSON response
                    $.each(response, function(key, value) {
                        // console.log(response);
                        farmer.showModal();
                        // Update the HTML element with the corresponding ID
                        // $('#' + key).val(value);  // For input elements
                        $('#' + key).text(value); // For p tags or other elements
                        $('#date_birth').text(formatDate(response['date_birth']));

                        $('#profile').attr('src', response['profile']
                            ? `<?= assets('uploads/')?>`
                            + response['profile']
                            : `<?= assets('images/default.svg')?>` );

                        $('#fullname').text(response['surname'] + ', ' + response['first_name'] + ' ' + response['middle_name']); // Update fullname
                        $('#address').text(response['building_no'] + ' ' + response['street'] + ' ' + response['barangay']); // Update fullname
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + status + " " + error);
                }
            });
        });
    });
</script>