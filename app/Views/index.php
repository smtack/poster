<section>
    <div class="heroe">
        <h1>Welcome to Poster</h1>

        <h2>A posting site</h2>
    </div>
</section>

<!-- CONTENT -->

<section>
    <h1>Posts</h1>

    <?php if(!empty($posts) && is_array($posts)): ?>
        <?php foreach($posts as $post): ?>
            <pre>
                <code><p><?= esc($post['content']) ?></p></code>
                <code><span>By <?= esc($post['name']) ?> on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></span></code>
            </pre>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>No Posts</h3>

        <p>Make a post <a href="/create">Here</a></p>
    <?php endif; ?>
</section>