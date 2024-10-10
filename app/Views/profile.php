<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 py-4">
                <div class="card p-3">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img width="75px" height="75px" class="rounded img-fluid" src="<?= base_url('/uploads/profile-pictures/') ?><?= esc($user['profile_picture']) ?>" alt="Profile Picture">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-1"><?= esc($user['name']) ?></h5>
                                <h6 class="mb-2 pb-1">@<?= esc($user['username']) ?></h6>
                                <small class="text-secondary">User since: <?= date('j F Y', strtotime(esc($user['created_at']))) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <small class="text-secondary">By <?= esc($post['post_by']) ?></a> on <?= date('j F Y \a\t H:i', strtotime(esc($post['created_at']))) ?></small>

                                <?php if(session()->get('loggedIn') && session()->get('username') == $post['post_by']): ?>
                                    <span class="mt-2"><a href="/edit/<?= esc($post['id']) ?>">Edit</a> <a href="/delete/<?= esc($post['id']) ?>">Delete</a></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <span class="text-center">No Posts</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>