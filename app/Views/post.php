<section>
  <pre>
      <code><p><?= esc($post['content']) ?></p></code>
      <code><span>By <a href="/profile/<?= esc($post['post_by']) ?>"><?= esc($post['post_by']) ?></a>on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></span></code>

      <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
        <code><span><a href="/edit/<?= esc($post['id']) ?>">Edit</a><a href="/delete/<?= esc($post['id']) ?>">Delete</a></span></code>
      <?php endif; ?>
  </pre>
</section>

<?php if(session()->get('loggedIn')): ?>
  <section>
    <form action="/comment/<?= esc($post['id']) ?>" method="post">
      <?= csrf_field() ?>

      <div class="form-group">
        <?= session()->getFlashdata('error') ?>
        <?= validation_list_errors() ?>
      </div>
      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea id="comment" name="comment"></textarea>
      </div>
      <div class="form-group">
        <input id="submit" type="submit" name="submit" value="Post">
      </div>
    </form>
  </section>
<?php endif; ?>

<section id="comments">
  <?php if(!empty($comments) && is_array($comments)): ?>
    <?php foreach($comments as $comment): ?>
      <pre>
        <code><p><?= esc($comment['comment']) ?></p></code>
        <code><span>By <a href="/profile/<?= esc($comment['comment_by']) ?>"><?= esc($comment['comment_by']) ?></a>on <?= date('j F Y \a\t H:i', strtotime(esc($comment['created_at']))) ?></span></code>

        <?php if(session()->get('loggedIn') && session()->get('username') == $comment['comment_by']): ?>
          <code><span><a href="/edit-comment/<?= esc($comment['id']) ?>">Edit</a><a href="/delete-comment/<?= esc($comment['id']) ?>">Delete</a></span></code>
        <?php endif; ?>
    </pre>
    <?php endforeach; ?>
  <?php endif; ?>
</section>