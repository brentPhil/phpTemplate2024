<dialog id="farmer" class="modal">
    <div class="modal-box">
        <div class="flex items-center gap-3">
            <div class="avatar">
                <div class="mask mask-squircle h-12 w-12">
                    <img src="<?= assets('', 'images/default.svg')?>" alt="Avatar Tailwind CSS Component" />
                </div>
            </div>

            <div>
                <div class="font-bold" id="fullname"></div>
                <div class="text-sm opacity-50" id="address"></div>
            </div>
        </div>
        <span class="text-sm-center opacity-50" id="sex"></span>
        <div class="modal-action">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>

<script type="text/javascript">
    $(document).ready(function() {
        // Attach the click event to elements with a specific class or ID
        $('.view-farmer').on('dblclick', function() {
            // Get the ID from the clicked element
            const itemId = $(this).attr('data-id');
            console.log(itemId)
            // Make an AJAX request to the PHP file
            $.ajax({
                url: 'api/getFarmer.php', // URL to the PHP file
                type: 'POST',             // or 'GET' depending on your requirement
                data: { id: itemId },     // Pass the ID to the PHP file
                dataType: 'json',         // Expect JSON data in response
                success: function(response) {
                    // Loop through each key in the JSON response
                    $.each(response, function(key, value) {
                        console.log(key);
                        farmer.showModal();
                        // Update the HTML element with the corresponding ID
                        // $('#' + key).val(value);  // For input elements
                        $('#' + key).text(value); // For p tags or other elements
                        $('#fullname').text(response['surname'] + ', ' + response['first_name'] + ' ' + response['middle_name']); // Update fullname
                        $('#address').text(response['municipality'] + ', ' + response['province'] + ', ' + response['region']); // Update fullname
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + status + " " + error);
                }
            });
        });
    });
</script>