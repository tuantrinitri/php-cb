<!DOCTYPE html>
<html lang="vi">
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>DANH SÁCH SINH VIÊN< </title>
</head>
<body>

<?php
require('../helper_function.php');
require('../index.php');
$data = index(); // array student
?>

<h2>DANH SÁCH SINH VIÊN</h2>

<?php if ($data) { ?>

    <table>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
        </tr>
        <?php
        $i = 1;
        foreach ($data as $item) { ?>
            <tr>
                <td><?php echo($i) ?> </td>
                <td><?php echo($item["fullname"]) ?></td>
                <td><?php echo($item["birthday"]) ?>  </td>
            </tr>
            <?php $i++;
        }   ?>
    </table>

<?php } else
    echo '<div style="color: red">Chưa có dữ liệu</div>' ?>
</body>
</html>

