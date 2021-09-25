<?php /** @var \App\Data\CategoryDTO[] $data */

use App\Data\ItemDTO; ?>

<h1>ADD ITEM</h1>

<a href="profile.php">My Profile</a><br /><br />

<form method="post">
    <label>
        Item Title:<input type="text" name="title"><br/>
    </label>
    <label>
        Price:<input type="text" name="price"><br/>
    </label>
    <label>Description:
        <textarea rows="5" name="description"></textarea><br/>
    </label>
    <label>
        Image URL:<input type="text" name="image"><br/>
    </label>
    Genres: <select name="category_id"><br />
        <?php foreach ($data as $category): ?>
            <option value="<?= $category->getId() ?>"><?= $category->getName(); ?></option>
        <?php endforeach; ?>
    </select><br/>
    <input type="submit" name="add" value="Add"  />
</form>