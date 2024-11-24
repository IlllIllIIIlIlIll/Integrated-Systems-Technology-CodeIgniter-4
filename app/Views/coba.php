<!DOCTYPE html>
<html>
<head>
    <title>Coba</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <form action="<?= base_url('/coba/add') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="text" name="value" placeholder="Masukkan nilai" required>
        <button type="submit">Add</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['value'] ?></td>
                <td>
                    <button onclick="editData('<?= $item['id'] ?>', '<?= $item['value'] ?>')">Update</button>
                    <form action="<?= base_url('/coba/delete') ?>" method="POST" style="display: inline;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <form id="updateForm" action="<?= base_url('/coba/update') ?>" method="POST" style="display: none;">
        <?= csrf_field() ?>
        <input type="hidden" id="updateId" name="id">
        <input type="text" id="updateValue" name="value" placeholder="Update nilai" required>
        <button type="submit">Save Changes</button>
    </form>

    <script>
        function editData(id, value) {
            const updateForm = document.getElementById('updateForm');
            updateForm.style.display = 'block'; 
            document.getElementById('updateId').value = id; 
            document.getElementById('updateValue').value = value; 
        }
    </script>
</body>
</html>