<section>
    <div class="heroe">
        <h1>Update Profile</h1>
    </div>
</section>

<section>
  <div class="form-group">
    <?php if(session()->getFlashData('message')): ?>
      <div class="message">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<section>
  <form action="/update-profile" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?php if(session()->getFlashData('error')): ?>
        <div class="error">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>
      
      <?php if(isset($errors)): foreach($errors as $error): ?>
        <li class="error"><?= $error ?></li>
      <?php endforeach; endif;?>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" type="text" name="name" value="<?= session()->get('name') ?>">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" type="text" name="username" value="<?= session()->get('username') ?>" disabled>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="text" name="email" value="<?= session()->get('email') ?>">
    </div>
    <div class="form-group">
      <input id="update" type="submit" name="update" value="Update Profile">
    </div>
  </form>
</section>

<section>
    <div class="mini-heroe">
        <h2>Profile Picture</h2>
    </div>
</section>

<section>
  <form enctype="multipart/form-data" action="/upload-profile-picture" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?php if(session()->getFlashData('picture-error')): ?>
        <div class="error">
          <?= session()->getFlashdata('picture-error') ?>
        </div>
      <?php endif; ?>
      
      <?php if(isset($image_errors)): foreach($image_errors as $error): ?>
        <li class="error"><?= $error ?></li>
      <?php endforeach; endif;?>
    </div>
    <div class="form-group">
      <label for="picture">Select Profile Picture</label>
      <input id="picture" type="file" name="picture">
    </div>
    <div class="form-group">
      <input id="upload" type="submit" name="upload" value="Upload">
    </div>
  </form>
</section>

<section>
    <div class="mini-heroe">
        <h2>Change Password</h2>
    </div>
</section>

<section>
  <form action="/change-password" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?php if(session()->getFlashData('password-error')): ?>
        <div class="error">
          <?= session()->getFlashdata('password-error') ?>
        </div>
      <?php endif; ?>
      
      <?php if(isset($password_errors)): foreach($password_errors as $error): ?>
        <li class="error"><?= $error ?></li>
      <?php endforeach; endif;?>
    </div>
    <div class="form-group">
      <label for="current-password">Current Password</label>
      <input id="current-password" type="password" name="current_password">
    </div>
    <div class="form-group">
      <label for="new-password">New Password</label>
      <input id="new-password" type="password" name="new_password">
    </div>
    <div class="form-group">
      <label for="confirm">Confirm Password</label>
      <input id="confirm" type="password" name="confirm">
    </div>
    <div class="form-group">
      <input id="change-password" type="submit" name="change_password" value="Change Password">
    </div>
  </form>
</section>

<section>
    <div class="mini-heroe">
        <h2>Delete Profile</h2>
    </div>
</section>

<section>
  <form action="/delete-profile" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?php if(session()->getFlashData('delete-error')): ?>
        <div class="error">
          <?= session()->getFlashdata('delete-error') ?>
        </div>
      <?php endif; ?>
      
      <?php if(isset($delete_errors)): foreach($delete_errors as $error): ?>
        <li class="error"><?= $error ?></li>
      <?php endforeach; endif;?>
    </div>
    <div class="form-group">
      <label for="password">Confirm Password</label>
      <input id="password" type="password" name="confirm_password">
    </div>
    <div class="form-group">
      <input id="delete-profile" type="submit" name="delete_profile" value="Delete Profile">
    </div>
  </form>
</section>