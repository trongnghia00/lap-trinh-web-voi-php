<?php 
if (! empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $err): ?>
            <li><?= $err ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div>
        <label for="Title">Title</label>
        <input name="Title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($title); ?>" />
    </div>
    <div>
        <label for="Content">Content</label>
        <textarea name="Content" rows="4" cols="40" id="content" placeholder="Article Content"><?= htmlspecialchars($content); ?></textarea>
    </div>
    <div>
        <label for="Published_at">Published at</label>
        <input type="datetime-local" name="Published_at" id="published_at" value="<?= $published_at ?>"/>
    </div>
    <button type="submit">Save</button>
</form>