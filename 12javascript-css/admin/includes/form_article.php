<?php 
if (! empty($article->errors)): ?>
    <ul>
        <?php foreach ($article->errors as $err): ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" id="formArticle">
    <div class="mb-3">
        <label for="Title" class="form-label">Title</label>
        <input class="form-control" name="Title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->Title); ?>" />
    </div>
    <div class="mb-3">
        <label for="Content" class="form-label">Content</label>
        <textarea class="form-control" name="Content" rows="4" cols="40" id="content" placeholder="Article Content"><?= htmlspecialchars($article->Content); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="Published_at" class="form-label">Published at</label>
        <input class="form-control" type="datetime-local" name="Published_at" id="published_at" value="<?= $article->Published_at ?>"/>
    </div>
    <fieldset>
        <legend>Categories</legend>
        <?php foreach ($categories as $category): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category['id'] ?>" id="category<?= $category['id'] ?>" 
                    <?php 
                        if (in_array($category['id'], $category_ids)) :
                            echo 'checked';
                        endif;
                    ?> 
                />
                <label class="form-check-label" for="category<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></label>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <button type="submit">Save</button>
</form>