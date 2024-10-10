<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 py-4">
                <div class="py-3">
                    <p><?= esc($post['content']) ?></p>

                    <?php if($post['post_image']): ?>
                        <img style="max-width: 100%" class="rounded mx-auto d-block" id="post-image" src="<?= base_url('/uploads/post-images/') ?><?= $post['post_image'] ?>" alt="Post Image">
                    <?php endif; ?>

                    <small class="text-secondary">By <a href="/profile/<?= esc($post['post_by']) ?>"><?= esc($post['post_by']) ?></a> on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></small>

                    <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
                        <span class="mt-2"><a href="/edit/<?= esc($post['id']) ?>">Edit</a> <a href="/delete/<?= esc($post['id']) ?>">Delete</a></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(session()->get('loggedIn')): ?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 py-4">
                    <form action="/comment/<?= esc($post['id']) ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-1">
                            <?= session()->getFlashdata('error') ?>
                            <?= validation_list_errors() ?>
                        </div>
                        <div class="mb-1">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea id="comment" class="form-control" name="comment"></textarea>
                        </div>
                        <div class="mb-1">
                            <input id="submit" class="form-control" type="submit" name="submit" value="Comment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section id="comments">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 py-4">
                <?php if(!empty($comments) && is_array($comments)): ?>
                    <div class="list-group">
                        <?php foreach($comments as $comment): ?>
                            <div class="list-group-item py-3">
                                <p><?= esc($comment['comment']) ?></p>
                                <small class="text-secondary">By <a href="/profile/<?= esc($comment['comment_by']) ?>"><?= esc($comment['comment_by']) ?></a> on <?= date('j F Y \a\t H:i', strtotime(esc($comment['created_at']))) ?></small>

                                <?php if(session()->get('loggedIn') && session()->get('username') == $comment['comment_by']): ?>
                                    <span class="mt-2"><a href="/edit-comment/<?= esc($comment['id']) ?>">Edit</a> <a href="/delete-comment/<?= esc($comment['id']) ?>">Delete</a></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <span class="text-center py-4">No Comments</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>