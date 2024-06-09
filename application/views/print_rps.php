<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak RPS</title>
</head>
<body>
    <table>
        <tr>
            <th>Mata Kuliah</th>
            <th>Kode</th>
            <th>SKS</th>
        </tr>
        <?php $no = 1;
        foreach($rps as $row) : ?>
        <tr>
            <td><?= $no++   ?></td>
            <td><?= $row->nama_matkul   ?></td>
            <td><?= $row->kode          ?></td>
            <td><?= $row->sks           ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
