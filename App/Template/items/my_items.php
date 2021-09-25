<?php /** @var ItemDTO[] $data */

use App\Data\ItemDTO; ?>

<h1>MY ITEMS</h1>

<a href="add_item.php">Add new item</a> |
<a href="myProfile.php">My Profile</a> |
<a href="logout.php">Logout</a>
<br />
<br />

<table border="1">
    <thead>
    <tr>
        <td>Title</td>
        <td>Category</td>
        <td>Price</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item):?>
        <tr>
            <td><?= $item->getTitle(); ?></td>
            <td><?= $item->getCategory()->getName(); ?></td>
            <td><?= $item->getPrice(); ?></td>
            <td><a href="edit_item.php?id=<?=$item->getId(); ?>">Edit</a></td>
            <td><a href="delete_item.php?id=<?=$item->getId(); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>