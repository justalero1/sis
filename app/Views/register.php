<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

    <h2>Register</h2>

    <?php if(isset($validation)): ?>
        <div style="color:red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="/register/save" method="post">
        <?= csrf_field() ?>

        <label>Username:</label><br>
        <input type="text" name="username" value="<?= old('username') ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= old('email') ?>"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Register</button>
    </form>

    <br>
    <a href="/login">Go to Login</a>

</body>
</html>