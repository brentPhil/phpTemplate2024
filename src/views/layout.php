<!doctype html>
<html lang="en" data-theme="mytheme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
    <link href="<?= root('src/output.css')?>" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= root('node_modules/datatables.net-dt/css/dataTables.dataTables.min.css')?>"/>
    <link rel="stylesheet" href="<?= root('node_modules/bootstrap-icons/font/bootstrap-icons.css')?>">
    <script src="<?= root('node_modules/jquery/dist/jquery.min.js')?>"></script>
    <!--    Sidebar   -->
    <link rel="stylesheet" type="text/css" href="<?= root('src/assets/css/sidebar.css')?>"/>
    <script src="<?= root('src/assets/js/toastPlugin.js')?>"></script>
    <script src="<?= root('src/assets/js/sidebar.js')?>"></script>
    <script src="<?= root('src/assets/js/FormSubmission.js')?>"></script>
</head>
<body class="font-poppins">
<div class="flex flex-row h-screen w-full">
    <div id="toast-container"></div>
    <?php require 'partials/sidebar.php' ?>

    <div class="flex h-full w-full overflow-y-auto flex-col">

        <?php require 'partials/nav.php' ?>

        <main class="h-full bg-slate-300 p-3 pb-6 w-full flex flex-col justify-between overflow-y-auto">

            <?php $router->route($uri, $method);?>

            <?php require 'partials/footer.php' ?>

        </main>

    </div>
</div>
<script type="text/javascript" src="<?= root('node_modules/datatables.net/js/dataTables.min.js')?>"></script>
<script type="text/javascript" src="<?= root('node_modules/datatables.net-responsive/js/dataTables.responsive.min.js')?>"></script>
</body>
</html>