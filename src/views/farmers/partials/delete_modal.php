
<!-- Modal -->
<dialog id="removeFarmer" class="modal">
    <div class="modal-box rounded-md">
        <!-- Updated Title -->
        <h3 class="text-xl font-bold">Confirm Deletion</h3>

        <!-- Updated Description -->
        <p class="py-4">Are you sure you want to delete this farmer's record? This action cannot be undone.</p>

        <div class="modal-action">
            <form method="dialog">
                <label>
                    <input type="hidden" id="farmerIdInput" name="farmer_id" value="">
                </label>
                <!-- if there is a button in form, it will close the modal -->
                <button type="button" class="btn btn-md btn-error" onclick="submitDeleteForm()">
                    <span id="loadingSpinner" class="loading loading-spinner hidden"></span>
                    Delete
                </button>
                <button class="btn btn-md rounded-md" onclick="this.closest('dialog').close();">Cancel</button>
            </form>
        </div>
    </div>
</dialog>

<script>
    // Function to show the modal and set the farmer ID
    function showRemoveModal(button) {
        // Get the farmer ID from the data-id attribute
        const farmerId = $(button).data('id');

        // Set the farmer ID in the hidden input field inside the modal
        $('#farmerIdInput').val(farmerId);

        // Show the modal
        $('#removeFarmer')[0].showModal();
    }

    // Function to handle form submission via AJAX
    function submitDeleteForm() {
        const farmerId = $('#farmerIdInput').val();

        // Show loading spinner
        $('#loadingSpinner').removeClass('hidden');

        $.ajax({
            url: 'api/deleteFarmer.php',  // Replace with your PHP delete handler URL
            method: 'POST',
            data: {
                action: 'DELETE',
                id: farmerId
            },
            success: function(response) {
                // Parse the JSON response
                const result = JSON.parse(response);

                if (result.status !== 'success') {
                    // Handle error if deletion fails
                    console.error('Deletion failed:', result.message);
                    $('#loadingSpinner').addClass('hidden');
                    $('#toast-container').toast({
                        title: 'Error',
                        description: 'Something went wrong!',
                        icon: 'bi bi-x-square-fill',
                        showCloseBtn: true,
                        duration: 5000,
                        variant: 'error',
                        reload: false,
                    });
                } else {
                    setTimeout(function() {
                        $('#loadingSpinner').addClass('hidden');
                        $('#removeFarmer')[0].close();
                        $('#toast-container').toast({
                            variant: 'success',
                            title: '',
                            description: 'Farmer has been removed from the database.',
                            icon: 'bi bi-check-square-fill',
                            showCloseBtn: false,
                            duration: 4000
                        });
                    }, 1000);

                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('AJAX error:', error);
                $('#loadingSpinner').addClass('hidden');
                $('#removeFarmer')[0].close();

                $('#toast-container').toast({
                    title: 'Error',
                    description: 'Something went wrong!',
                    icon: 'bi bi-x-square-fill',
                    showCloseBtn: true,
                    duration: 5000,
                    variant: 'error',
                    reload: false,
                });
            }
        });
    }
</script>