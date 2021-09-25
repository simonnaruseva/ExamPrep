<?php /** @var UserDTO $data */
use App\Data\UserDTO; ?>

<h2>Hello, <?= $data->getFullName(); ?></h2>

<a href="add_item.php">Add new item</a> |
    <a href="myProfile.php">My Profile</a> |
        <a href="logout.php">Logout</a> <br/><br/>

<a href="my_items.php">My Items</a> <br />
<a href="all_items.php">All Items</a> <br />
