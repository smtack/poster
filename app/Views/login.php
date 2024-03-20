<section>
    <div class="heroe">
        <h1>Log In</h1>
    </div>
</section>

<section>
  <form action="/authenticate" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?php if(session()->getFlashData('error')): ?>
        <div class="error">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>
      
      <?= validation_list_errors() ?>
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" type="text" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" type="password" name="password">
    </div>
    <div class="form-group">
      <input id="login" type="submit" name="login" value="Log In">
    </div>
  </form>
</section>