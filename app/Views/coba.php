<!DOCTYPE html>
<html>
<head>
    <title>Coba</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px; }
    </style>
</head>
<body>
    <form action="<?= base_url('/coba/add') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="text" name="value">
        <button type="submit">Add</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Value</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['value'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>