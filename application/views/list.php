<div class="container">
    <div class="row">
        <h3>All Articles</h3>
        <p>
            <a href="<?php echo site_url('article/'); ?>" class="btn btn-default">Refresh</a>
            <a href="<?php echo site_url('article/create/'); ?>" class="btn btn-success">Create a Post</a>
        </p>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">create date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($articles as $key => $article): ?>
                <tr>
                    <th scope="row"><?= $article->id_article; ?></th>
                    <td>
                        <?php if ($user_id == $article->author->id) { ?>
                            <a href="#" class="show_content" data-toggle="modal"
                               data-content="<?= $article->content; ?>"
                               data-target=".bs-example-modal-lg"><?= $article->title; ?></a>
                        <?php } else { ?>
                            <span title="Users can read their own posts"><?= $article->title; ?></span>
                        <?php } ?>
                    </td>
                    <td><?= $article->author->username; ?></td>
                    <td><?= $article->create_date ?></td>
                    <td>
                        <?php if ($user_id == $article->author->id) { ?>
                            <a href="<?= site_url("article/edit/$article->id_article"); ?>" title="Edit" class="edit"><i
                                        class="fas fa-edit"></i></a>
                            <a href="<?= site_url("article/delete/$article->id_article"); ?>"
                               title="delete" class="delete"><i
                                        class="fas fa-trash-alt"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".delete").on("click", function (e) {
            e.preventDefault();
            var r = confirm("Are You sure?");
            if (r == true) {
                var url = $(this).attr("href");
                window.location.replace(url);
            }
        })


        $(".show_content").on("click", function (e) {
            $(".modal-content").html(
                "<h3>" + $(this).text() + "</h3><p>" + $(this).data("content") + "</p>");

        })
    })
</script>