<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan MAUT</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
        h2 {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <h2>Tabel Kriteria</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Kriteria</th>
            <th>Bobot</th>
        </tr>
        <?php
        foreach ($criterias as $c) {
           ?>
           <tr>
            <td><?= $c['criteria_code'] ?></td>
            <td><?= $c['criteria_name'] ?></td>
            <td><?= $c['weight'] ?></td>
           </tr>
           <?php
        }

        ?>
    </table>
<h2>Tabel Matrix (Nilai Alternatif per Kriteria)</h2>
<table>
    <tr>
        <th>Kode</th>
        <th>Alternatif</th>
        <?php foreach ($criterias as $c): ?>
            <th><?= $c['criteria_code'] ?> - <?= $c['criteria_name'] ?> (<?= $c['weight'] ?>)</th>
        <?php endforeach ?>
    </tr>

    <?php foreach ($alternatives as $alt): ?>
        <tr>
            <th><?= $alt['alternative_code'] ?></th>
            <th><?= $alt['alternative_name'] ?></th>
            <?php foreach ($criterias as $c): ?>
                <td><?= $matrix[$alt['id']][$c['id']] ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>


<h2>Nilai Max & Min per Kriteria</h2>
<table>
    <tr>
        <th></th>
        <?php foreach ($criterias as $c): ?>
            <th><?= $c['criteria_code'] ?></th>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Max</th>
        <?php foreach ($criterias as $c): ?>
            <td><?= $maxValue[$c['id']] ?></td>
        <?php endforeach ?>
    </tr>
    <tr>
        <th>Min</th>
        <?php foreach ($criterias as $c): ?>
            <td><?= $minValue[$c['id']] ?></td>
        <?php endforeach ?>
    </tr>
</table>


<h2>Normalisasi MAUT</h2>
<table>
    <tr>
        <th>Alternatif</th>
        <?php foreach ($criterias as $c): ?>
            <th><?= $c['criteria_code'] ?></th>
        <?php endforeach ?>
    </tr>

    <?php foreach ($alternatives as $alt): ?>
        <tr>
            <th><?= $alt['alternative_code'] ?></th>
            <?php foreach ($criterias as $c): ?>
                <td><?= number_format($normalisasi[$alt['id']][$c['id']], 4) ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach ?>
</table>


<h2>Utility & Ranking</h2>
<table>
    <tr>
        <th>Alternatif</th>
        <th>Utility</th>
        <th>Ranking</th>
    </tr>

    <?php 
        // buat ranking
        $ranked = $utility;
        arsort($ranked);
        $pos = 1;
        $rankIndex = [];
        foreach ($ranked as $altId => $val) {
            $rankIndex[$altId] = $pos++;
        }
    ?>

    <?php foreach ($alternatives as $alt): ?>
        <tr>
            <th><?= $alt['alternative_code'] ?></th>
            <td><?= number_format($utility[$alt['id']], 4) ?></td>
            <td><?= $rankIndex[$alt['id']] ?></td>
        </tr>
    <?php endforeach ?>
</table>

</body>
</html>
