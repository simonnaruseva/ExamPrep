<?php /** @var \App\Data\UserDTO[] $data */ ?>

<table border="1">
    <thead>
    <tr>
        <td>Id</td>
        <td>Username</td>
        <td>Full Name</td>
        <td>Location</td>
        <td>Phone</td>
    </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $userDTO): ?>
            <tr>
                <td><?= $userDTO->getId(); ?></td>
                <td><?= $userDTO->getUsername(); ?></td>
                <td><?= $userDTO->getFullName(); ?></td>
                <td><?= $userDTO->getLocation(); ?></td>
                <td><?= $userDTO->getPhone(); ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<br />
Go back to <a href="profile.php">your profile</a>