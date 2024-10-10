<section>
    <div class="container">
        <div class="text-center my-5">
            <h3>Edit Post</h3>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <form enctype="multipart/form-data" action="/update/<?= esc($post['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <?= session()->getFlashdata('error') ?>
                        <?= validation_list_errors() ?>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="form-label">Message</label>
                        <textarea style="height:225px" id="content" class="form-control" name="content"><?= esc($post['content']) ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">Image (Optional)</label>
                        <input id="image" class="form-control" type="file" name="image">
                    </div>
                    <div class="mb-4">
                        <input id="submit" class="form-control" type="submit" name="edit" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>