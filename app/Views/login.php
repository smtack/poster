<section>
    <div class="container">
        <div class="text-center my-5">
            <h3>Log In</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <form action="/authenticate" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?php if(session()->getFlashData('error')): ?>
                            <div class="error"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
            
                        <?= validation_list_errors() ?>
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" class="form-control" type="text" name="username">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>
                    <div class="mb-4">
                        <input id="login" class="form-control" type="submit" name="login" value="Log In">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>