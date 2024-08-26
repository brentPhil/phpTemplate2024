<!doctype html>
<html lang="en" data-theme="mytheme">
<?php
view('/partials/heading.php',[
    'heading' => 'Register'
]) ?>
<body>
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content">
        <div class="card bg-base-100 w-full max-w-md min-w-[400px] shrink-0 rounded-md shadow-2xl">
            <form class="card-body" action="<?= root('register') ?>" method="post">
                <h1 class="card-title">Register</h1>
                <div class="form-control">
                    <label for="username" class="label">
                        <span class="label-text">username</span>
                    </label>

                    <input type="text" id="username"
                           placeholder="username" name="username"
                           value="<?= old('username')?>"
                           class="input input-bordered <?= isset($errors["username"]) ? 'input-error' : '' ?>"
                    />
                    <?= isset($errors["username"]) ? "<p class='text-error'>{$errors["username"]}</p>" : '' ?>
                </div>
                <div class="form-control">

                    <label for="email" class="label">
                        <span class="label-text">Email</span>
                    </label>

                    <input type="email" id="email"
                           placeholder="email" name="email"
                           value="<?= old('email')?>"
                           class="input input-bordered <?= isset($errors["email"]) ? 'input-error' : '' ?>"
                    />
                    <?= isset($errors["email"]) ? "<p class='text-error'>{$errors["email"]}</p>" : '' ?>
                </div>
                <div class="form-control">

                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>

                    <input type="password" id="password"
                           placeholder="password" name="password"
                           class="input input-bordered <?= isset($errors["password"]) ? 'input-error' : '' ?>"
                    />
                    <?= isset($errors["password"]) ? "<p class='text-error'>{$errors["password"]}</p>" : '' ?>
                </div>
                <?= isset($errors["exist"]) ? "<p class='text-error'>{$errors["exist"]}</p>" : '' ?>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
