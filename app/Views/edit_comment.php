<section>
    <div class="container">
        <div class="text-center my-5">
            <h3>Edit Comment</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <form action="/update-comment/<?= esc($comment['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?= session()->getFlashdata('error') ?>
                        <?= validation_list_errors() ?>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea style="height:225px" id="comment" class="form-control" name="comment"><?= esc($comment['comment']) ?></textarea>
                    </div>
                    <div class="mb-4">
                        <input id="submit" class="form-control" type="submit" name="submit" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>