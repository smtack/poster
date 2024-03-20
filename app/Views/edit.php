<section>
    <div class="heroe">
        <h1>Edit Post</h1>
    </div>
</section>

<section>
  <form action="/update/<?= esc($post['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>
    </div>
    <div class="form-group">
      <label for="content">Message</label>
      <textarea id="content" name="content"><?= esc($post['content']) ?></textarea>
    </div>
    <div class="form-group">
      <input id="submit" type="submit" name="submit" value="Edit">
    </div>
  </form>
</section>