<section>
    <div class="heroe">
        <h1>Welcome to Poster <?= session()->get('name') ?: '' ?></h1>

        <h2>A posting site</h2>
    </div>
</section>

<section>
    <h1>Posts</h1>

    <?php if(!empty($posts) && is_array($posts)): ?>
        <?php foreach($posts as $post): ?>
            <pre>
                <code><p><?= esc($post['content']) ?></p></code>
                <code><span>By <a href="/profile/<?= esc($post['post_by']) ?>"><?= esc($post['post_by']) ?></a>on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></span></code>
                <code><span><a href="/post/<?= esc($post['id']) ?>#comments">Comments</a></span></code>

                <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
                    <code><span><a href="/edit/<?= esc($post['id']) ?>">Edit</a><a href="/delete/<?= esc($post['id']) ?>">Delete</a></span></code>
                <?php endif; ?>
            </pre>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>No Posts</h3>

        <?php if(session()->get('loggedIn')): ?>
            <p>Make a post <a href="/create">Here</a></p>
        <?php else: ?>
            <p>Sign up to create a post <a href="/signup">here</a></p>
        <?php endif; ?>
    <?php endif; ?>
</section>