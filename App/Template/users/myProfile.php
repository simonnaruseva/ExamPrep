<?php /** @var \App\Data\UserDTO $data */ ?>

<h2>Your Profile</h2>

<form method="post">
    <label>
        Username: <input type="text" name="username" value="<?= $data->getUsername(); ?>"    /> <br/>
    </label>
    <label>
        Password: <input type="text" name="password" /> <br/>
    </label>
    <label>
        Confirm Password: <input type="text" name="confirm_password"/> <br/>
    </label>
    <label>
        Full Name: <input type="text" name="full_name" value="<?= $data->getFullName(); ?>"  /><br/>
    </label>
    <label>
        Location: <input type="text" name="location" value=" <?= $data->getLocation(); ?>"/> <br/>
    </label>
    <label>
        Phone: <input type="text" name="phone" value="<?= $data->getPhone(); ?>"  /><br/>
    </label>

    <input type="submit" name="edit" value="Edit"/> <br/>

</form>

You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>.