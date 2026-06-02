<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h2>Dashboard</h2>
    <p>Welcome, <?= session()->get('username') ?></p>
    <p>Your role is: <?= session()->get('role') ?></p>

    <a href="/admin">Go to Admin Page</a><br><br>
    <a href="/logout">Logout</a>

</body>
</html>