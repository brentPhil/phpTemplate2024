<!doctype html>
<html lang="en" data-theme="mytheme">
<?php
view('/partials/heading.php',[
    'heading' => 'Login'
])
?>
<body style="
        background-image: url(<?= assets('images/agri_bg_image.jpg')?>);
        background-repeat: no-repeat;
        background-size: cover;
        "
      class="font-poppins">
<div class="hero backdrop-blur-lg bg-neutral/50 min-h-screen">
    <div class="hero-content">
        <div class="card rounded-md border border-base-100 bg-base-100 w-[500px] shrink-0 shadow-2xl">
            <figure class="h-60">
                <img src="<?= assets('images/agri_bg_image.jpg')?>"
                     alt="banner" />
            </figure>
            <div class="avatar flex justify-center absolute inset-x-0 top-12">
                <div class="w-36 rounded-full">
                    <img alt="Site Logo" src="<?= assets('images/tabon.png', 'default.svg')?>" />
                </div>
            </div>
            <form class="card-body flex z-10 flex-col gap-6" action="<?= root('login') ?>" method="post">

                <div class="space-y-2">

                    <label class="input input-bordered gap-3 <?= isset($errors["email"]) ? 'input-error' : '' ?> flex items-center">

                        <i class="bi bi-envelope-fill"></i>
                        <input
                                type="email" id="email"
                                placeholder="Email" name="email"
                                class="grow border-l ps-3"
                                value="<?= old('email')?>"
                        />

                    </label>
                    <?= displayMessage($errors["email"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                    <label class="input input-bordered gap-3 <?= isset($errors["password"]) ? 'input-error' : '' ?> flex items-center">

                        <i class="bi bi-key-fill"></i>
                        <input
                                type="password" id="password"
                                placeholder="Password" name="password"
                                class="grow border-l ps-3"
                                value="<?= old('password')?>"
                        />

                    </label>
                    <?= displayMessage($errors["password"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                </div>

                <?= displayMessage($errors["exist"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                <div class="form-control w-full">
                    <button type="submit" class="btn rounded-md text-lg btn-accent">login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>


