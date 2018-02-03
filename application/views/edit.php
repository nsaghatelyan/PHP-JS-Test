<div class="container">
    <div class="row">
        <a href="<?= site_url('article'); ?>"><i class="fas fa-arrow-alt-circle-left"></i> Back to Articles</a>

        <h3>Edit Article</h3>
        <form action="<?php echo site_url('article/update/'); ?>" method="post">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder=""
                       value="<?= $article->title; ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3">
                    <?= trim($article->content); ?>
                </textarea>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?= $article->id_article; ?>" name="id">
                <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
            </div>
        </form>

    </div>
</div>