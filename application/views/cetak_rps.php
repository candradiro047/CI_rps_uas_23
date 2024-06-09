<!DOCTYPE html>
<html lang="en"><head>
    <title>Cetak RPS</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
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
</body></html>