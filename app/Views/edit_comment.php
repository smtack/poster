<section>
    <div class="heroe">
        <h1>Edit Comment</h1>
    </div>
</section>

<section>
  <form action="/update-comment/<?= esc($comment['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <?= session()->getFlashdata('error') ?>
      <?= validation_list_errors() ?>
    </div>
    <div class="form-group">
      <label for="comment">Message</label>
      <textarea id="comment" name="comment"><?= esc($comment['comment']) ?></textarea>
    </div>
    <div class="form-group">
      <input id="submit" type="submit" name="submit" value="Edit">
    </div>
  </form>
</section>