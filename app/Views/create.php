<section>
    <div class="heroe">
        <h1>Create a Post</h1>
    </div>
</section>

<section>
  <form enctype="multipart/form-data" action="/new" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>
    </div>
    <div class="form-group">
      <label for="image">Image (Optional)</label>
      <input id="image" type="file" name="image">
    </div>
    <div class="form-group">
      <label for="content">Message</label>
      <textarea id="content" name="content"></textarea>
    </div>
    <div class="form-group">
      <input id="submit" type="submit" name="submit" value="Post">
    </div>
  </form>
</section>