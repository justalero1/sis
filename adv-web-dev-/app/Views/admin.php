<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>

    <h2>Admin Page</h2>
    <p>Hello Admin, <?= session()->get('username') ?></p>

    <a href="/dashboard">Back to Dashboard</a><br><br>
    <a href="/logout">Logout</a>

</body>
</html>