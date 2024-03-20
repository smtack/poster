<section>
    <div class="heroe">
        <h1><?= esc($user['name']) ?>'s Profile</h1>
        <h3>@<?= esc($user['username']) ?></h3>
        <h4>User since: <?= date('j F Y', strtotime(esc($user['created_at']))) ?></h4>
    </div>
</section>

<!-- CONTENT -->

<section>
    <h1>Posts</h1>

    <?php if(!empty($posts) && is_array($posts)): ?>
        <?php foreach($posts as $post): ?>
            <pre>
                <code><p><?= esc($post['content']) ?></p></code>
                <code><span>By <?= esc($post['post_by']) ?> on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></span></code>
                <code><span><a href="/post/<?= esc($post['id']) ?>">View</a></span></code>

                <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
                    <code><span><a href="/edit/<?= esc($post['id']) ?>">Edit</a><a href="/delete/<?= esc($post['id']) ?>">Delete</a></span></code>
                <?php endif; ?>
            </pre>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>No Posts</h3>
    <?php endif; ?>
</section>