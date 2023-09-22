<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Tên khoá học</th>
        </tr>
        <?php
                $arr = ['PHP', 'HTML', 'CSS', 'JS'];
                foreach($arr as $value){
                    echo "<tr>
                            <td>$value</td>
                        </tr>";
                }
            ?>
    </table>
</body>
</html>