<div class="card bg-white md:max-w-2xl rounded-md">
    <figure class="absolute h-60">
        <img src="<?= assets('images/agri_bg_image.jpg')?>"
             alt='banner' />
    </figure>
    <div class="card-body z-[1] flex justify-center">

        <form class="grid gap-8 pt-16" action="<?= root('profile') ?>" method="post" enctype="multipart/form-data">

            <?php view('imageUpload.component.php', ['admin' => $admin, 'errors' => \Core\Session::get('errors')]) ?>

            <div class="space-y-3 w-full border-y-neutral">
                <label class="input input-bordered <?= isset($errors["first_name"]) ? 'input-error' : '' ?> flex items-center gap-2">

                    First name
                    <input
                            type="text" id="first_name"
                            placeholder="zack" name="first_name"
                            class="grow border-l ps-3"
                            value="<?= old('first_name', $admin['first_name'])?>"
                    />
                    <?= displayMessage($errors["first_name"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                </label>

                <label class="input input-bordered <?= isset($errors["last_name"]) ? 'input-error' : '' ?> flex items-center gap-2">

                    Last name
                    <input
                            type="text" id="last_name"
                            placeholder="snider" name="last_name"
                            class="grow border-l ps-3"
                            value="<?= old('last_name', $admin['last_name'])?>"
                    />
                    <?= displayMessage($errors["last_name"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                </label>

                <label class="input input-bordered <?= isset($errors["username"]) ? 'input-error' : '' ?> flex items-center gap-2">

                    Username
                    <input
                            type="text" id="username"
                            placeholder="zack23" name="username"
                            class="grow border-l ps-3"
                            value="<?= old('username', $admin['username'])?>"
                    />
                    <?= displayMessage($errors["username"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                </label>

                <label class="input input-bordered <?= isset($errors["email"]) ? 'input-error' : '' ?> flex items-center gap-2">

                    <i class="bi bi-envelope-fill"></i>
                    <input
                            type="email" id="email"
                            placeholder="Email" name="email"
                            class="grow border-l ps-3"
                            value="<?= old('email', $admin['email'])?>"
                    />
                    <?= displayMessage($errors["email"] ?? '', 'bi bi-exclamation-diamond-fill')?>

                </label>

                <label class="input input-bordered flex items-center gap-2">

                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="h-4 w-4 opacity-70">
                        <path
                                fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                    </svg>
                    <input type="password" class="grow border-l ps-3"
                           name="password" value="<?= old('password', 'hidden')?>"
                           disabled
                    />

                </label>

            </div>
            <div class="card-actions justify-end">
                <button class="btn btn-neutral btn-md">SAVE</button>
            </div>

        </form>
    </div>
</div>