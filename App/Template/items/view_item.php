<?php /** @var \App\Data\ItemDTO $data */?>

<h1>VIEW ITEM</h1>

<a href="myProfile.php">My Profile</a>

<p>Title: <?= $data->getTitle(); ?></p>
<p>Price: <?= $data->getPrice(); ?></p>
<p>Category: <?= $data->getCategory()->getName(); ?></p>
<p>Phone: <?= $data->getUser()->getPhone(); ?></p>
<p>Description: <?= $data->getDescription(); ?></p>
<img src="<?= $data->getImage(); ?>" alt="None" width="400" height="250" />