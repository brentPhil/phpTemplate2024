<div class="w-48 flex flex-col items-center justify-center space-y-2 h-fit">

    <div class="w-48 h-48 rounded-md bg-base-200 overflow-hidden flex justify-center items-center">
        <img src="<?= assets(!empty($admin['profile']) ? 'uploads/' . $admin['profile'] : '', 'images/default.svg')?>" id="imagePreview" alt="Profile photo">
    </div>

    <input type="file"
           name="profile"
           id="imageInput"
           class="file-input rounded-md file-input-bordered file-input-neutral w-full file-input-sm max-w-xs"
           accept="image/*"
    />
    <?= displayMessage($errors["profile"] ?? '', 'bi bi-exclamation-diamond-fill')?>

</div>

<script>
    $(document).ready(function() {
        $('#imageInput').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('#imagePreview').attr('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>