<div class="container">
    <div class="row">
        <a href="<?= site_url('article'); ?>"><i class="fas fa-arrow-alt-circle-left"></i> Back to Articles</a>
        <h3>Create new Article</h3>
        <form action="<?php echo site_url('article/createArticle/'); ?>" method="post">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
            </div>
        </form>

    </div>
</div>