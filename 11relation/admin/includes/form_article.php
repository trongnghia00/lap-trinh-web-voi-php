<?php 
if (! empty($article->errors)): ?>
    <ul>
        <?php foreach ($article->errors as $err): ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div>
        <label for="Title">Title</label>
        <input name="Title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->Title); ?>" />
    </div>
    <div>
        <label for="Content">Content</label>
        <textarea name="Content" rows="4" cols="40" id="content" placeholder="Article Content"><?= htmlspecialchars($article->Content); ?></textarea>
    </div>
    <div>
        <label for="Published_at">Published at</label>
        <input type="datetime-local" name="Published_at" id="published_at" value="<?= $article->Published_at ?>"/>
    </div>
    <fieldset>
        <legend>Categories</legend>
        <?php foreach ($categories as $category): ?>
            <div>
                <input type="checkbox" name="category[]" value="<?= $category['id'] ?>" id="category<?= $category['id'] ?>" 
                    <?php 
                        if (in_array($category['id'], $category_ids)) :
                            echo 'checked';
                        endif;
                    ?> 
                />
                <label for="category<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></label>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <button type="submit">Save</button>
</form>