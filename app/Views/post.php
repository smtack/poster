<!-- CONTENT -->

<section>
  <pre>
      <code><p><?= esc($post['content']) ?></p></code>
      <code><span>By <a href="/profile/<?= esc($post['post_by']) ?>"><?= esc($post['post_by']) ?></a>on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></span></code>

      <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
        <code><span><a href="/edit/<?= esc($post['id']) ?>">Edit</a><a href="/delete/<?= esc($post['id']) ?>">Delete</a></span></code>
      <?php endif; ?>
  </pre>
</section>