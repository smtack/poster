<section>
    <div class="heroe">
        <h1>Sign Up</h1>
    </div>
</section>

<section>
  <form action="/register" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" type="text" name="name">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" type="text" name="username">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="text" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" type="password" name="password">
    </div>
    <div class="form-group">
      <label for="confirm">Confirm Password</label>
      <input id="confirm" type="password" name="confirm">
    </div>
    <div class="form-group">
      <input id="signup" type="submit" name="signup" value="Sign Up">
    </div>
  </form>
</section>