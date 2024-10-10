<section>
    <div class="container">
        <div class="row py-4">
            <div class="col">
                <?php if(session()->getFlashData('message')): ?>
                    <div class="message">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-lg">
        <div class="text-center">
            <h3>Update Profile</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <form action="/update-profile" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?php if(session()->getFlashData('error')): ?>
                            <div class="error">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(isset($errors)): foreach($errors as $error): ?>
                            <li class="error"><?= $error ?></li>
                        <?php endforeach; endif;?>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="John" value="<?= session()->get('name') ?>">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" class="form-control" type="text" name="username" placeholder="john1234" value="<?= session()->get('username') ?>" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="john@example.com" value="<?= session()->get('email') ?>">
                    </div>
                    <div class="mb-4">
                        <input id="update" class="form-control" type="submit" name="update" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-lg">
        <div class="text-center">
            <h3>Update Profile Picture</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <form enctype="multipart/form-data" action="/upload-profile-picture" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?php if(session()->getFlashData('picture-error')): ?>
                            <div class="error">
                                <?= session()->getFlashdata('picture-error') ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(isset($image_errors)): foreach($image_errors as $error): ?>
                            <li class="error"><?= $error ?></li>
                        <?php endforeach; endif;?>
                    </div>
                    <div class="mb-4">
                        <label for="picture" class="form-label">Select Profile Picture</label>
                        <input id="picture" class="form-control" type="file" name="picture">
                    </div>
                    <div class="mb-4">
                        <input id="upload" class="form-control" type="submit" name="upload" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-lg">
        <div class="text-center">
            <h3>Update Password</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <form action="/change-password" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?php if(session()->getFlashData('password-error')): ?>
                            <div class="error">
                                <?= session()->getFlashdata('password-error') ?>
                            </div>
                        <?php endif; ?>
        
                        <?php if(isset($password_errors)): foreach($password_errors as $error): ?>
                            <li class="error"><?= $error ?></li>
                        <?php endforeach; endif;?>
                    </div>
                    <div class="mb-4">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input id="current-password" class="form-control" type="password" name="current_password">
                    </div>
                    <div class="mb-4">
                        <label for="new-password" class="form-label">New Password</label>
                        <input id="new-password" class="form-control" type="password" name="new_password">
                    </div>
                    <div class="mb-4">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input id="confirm" class="form-control" type="password" name="confirm">
                    </div>
                    <div class="mb-4">
                        <input id="change-password" class="form-control" type="submit" name="change_password" value="Update Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-lg">
        <div class="text-center">
            <h3>Delete Profile</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <form action="/delete-profile" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?php if(session()->getFlashData('delete-error')): ?>
                            <div class="error">
                                <?= session()->getFlashdata('delete-error') ?>
                            </div>
                        <?php endif; ?>
        
                        <?php if(isset($delete_errors)): foreach($delete_errors as $error): ?>
                            <li class="error"><?= $error ?></li>
                        <?php endforeach; endif;?>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input id="password" class="form-control" type="password" name="confirm_password">
                    </div>
                    <div class="mb-4">
                        <input id="delete-profile" class="form-control" type="submit" name="delete_profile" value="Delete Profile">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>