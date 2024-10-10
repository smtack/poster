<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 py-4">
                <form enctype="multipart/form-data" action="/new" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-1">
                        <?= session()->getFlashdata('error') ?>
                        <?= validation_list_errors() ?>
                    </div>
                    <div class="mb-1">
                        <label for="content" class="form-label">Message</label>
                        <textarea id="content" class="form-control" name="content"></textarea>
                    </div>
                    <div class="mb-1">
                        <label for="image" class="form-label">Image (Optional)</label>
                        <input id="image" class="form-control" type="file" name="image">
                    </div>
                    <div class="mb-1">
                        <input id="submit" class="form-control" type="submit" name="submit" value="Post">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 py-4">
                <?php if(!empty($posts) && is_array($posts)): ?>
                    <div class="list-group">
                        <?php foreach($posts as $post): ?>
                            <div class="post list-group-item py-3" onclick="location.href='/post/<?= esc($post['id']) ?>'">
                                <p><?= esc($post['content']) ?></p>
                                <small class="text-secondary">By <a href="/profile/<?= esc($post['post_by']) ?>"><?= esc($post['post_by']) ?></a> on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></small>

                                <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
                                    <span class="mt-2"><a href="/edit/<?= esc($post['id']) ?>">Edit</a> <a href="/delete/<?= esc($post['id']) ?>">Delete</a></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center">
                        <span>No Posts</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>