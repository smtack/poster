<section>
    <div class="container">
        <div class="text-center my-5">
            <h3>Sign Up</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <form action="/register" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?= session()->getFlashdata('error') ?>
                        <?= validation_list_errors() ?>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="John">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" class="form-control" type="text" name="username" placeholder="john1234">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="john@example.com">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>
                    <div class="mb-4">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input id="confirm" class="form-control" type="password" name="confirm">
                    </div>
                    <div class="mb-4">
                        <input id="signup" class="form-control" type="submit" name="signup" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>