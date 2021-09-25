<?php /** @var EditItemDTO $data */

use App\Data\EditItemDTO; ?>


<h1>EDIT ITEM</h1>

<a href="profile.php">My Profile</a>
<form method="post">
    <label>
        Title:<input type="text" name="title" value="<?= $data->getItem()->getTitle() ?>"><br/>
    </label>
    <label>
        Price:<input type="text" name="price" value="<?= $data->getItem()->getPrice(); ?>"><br/>
    </label>
    <label>Description:
        <textarea rows="5" name="description"><?= $data->getItem()->getDescription(); ?></textarea><br/>
    </label>
    Category: <select name="category_id"><br />
        <?php foreach ($data->getCategories() as $category): ?>
            <?php if($data->getItem()->getCategory()->getId() === $category->getId()): ?>
                <option selected="selected" value="<?= $category->getId(); ?>"> <?= $category->getName(); ?> </option>
            <?php else: ?>
                <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    <label>
        Image URL:<input type="text" name="image" value="<?= $data->getItem()->getImage(); ?>"><br/>
    </label>
    <img src="<?= $data->getItem()->getImage() ?>" alt="None" width="400" height="250"/><br/>
    <input type="submit" name="edit" value="Edit"  />
</form>