<table border="1" cellpadding="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i<count($names); $i++): ?>
            <tr>
                <?php if ($ages[$i] >= 18): ?>
                <td><?= $names[$i]; ?></td>
                <td><?= $ages[$i]; ?></td>
                <?php endif; ?>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>