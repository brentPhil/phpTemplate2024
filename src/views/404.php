<!doctype html>
<html lang="en" data-theme="mytheme">
<?php
view('/partials/heading.php',[
    'heading' => '😵 404 😵'
]) ?>
<body>
<div class="flex justify-center items-center bg-white rounded-md py-40 w-full">
    <div class="text-center space-y-3">
        <div class="avatar">
            <div class="w-[400px]">
                <img class="" src="<?= assets('images/cat_404.svg', '')?>" alt="404_svg">
            </div>
        </div>
        <div>
            <a class="btn btn-link btn-md text-2xl" href="<?= root('dashboard')?>">
                <i class="bi bi-arrow-left"></i> Go Back
            </a>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= root('node_modules/datatables.net/js/dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?= root('node_modules/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
</body>
</html>