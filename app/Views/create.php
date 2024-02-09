<section>
    <div class="heroe">
        <h1>Create a Post</h1>
    </div>
</section>

<section>
  <form action="/new" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>
    </div>
    <div class="form-group">
      <label for="content">Message</label>
      <textarea id="content" name="content"></textarea>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input id="name" type="text" name="name">
    </div>
    <div class="form-group">
      <input id="submit" type="submit" name="submit" value="Post">
    </div>
  </form>
</section>