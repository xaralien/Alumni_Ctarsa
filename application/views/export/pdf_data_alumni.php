<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Alumni CTARSA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Data Alumni CTARSA</h2>
        <p></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alumni</th>
                    <th>Sekolah</th>
                    <th>Tahun</th>
                    <th>Status</th>
                    <th>Instansi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($list as $l) {
                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $l->name ?></td>
                        <td><?= $l->school_name ?></td>
                        <td><?= $l->year_graduate ?></td>
                        <td><?= $l->student_status ?></td>
                        <td><?= $l->institute ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Alumni</th>
                    <th>Sekolah</th>
                    <th>Tahun</th>
                    <th>Instansi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>