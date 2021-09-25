<?php /** @var ItemDTO[] $data */

use App\Data\ItemDTO; ?>

<h1>ALL ITEMS</h1>

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
        <td>Username</td>
        <td>Location</td>
        <td>Phone</td>
        <td>Details</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $item):?>
            <tr>
                <td><?= $item->getTitle(); ?></td>
                <td><?= $item->getCategory()->getName(); ?></td>
                <td><?= $item->getPrice(); ?></td>
                <td><?= $item->getUser()->getUsername(); ?></td>
                <td><?= $item->getUser()->getLocation(); ?></td>
                <td><?= $item->getUser()->getPhone(); ?></td>
                <td><a href="view_item.php?id=<?=$item->getId(); ?>">Details</a></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

