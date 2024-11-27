<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
</head>
<body>
    <h1>Welcome, <?= isset($user) ? $user['name'] : 'Guest'; ?></h1>
    <p><?= isset($message) ? $message : 'No message.'; ?></p>
</body>
</html>
