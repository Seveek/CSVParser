<!DOCTYPE html>
<html>
<head>
    <title>Выгрузка данных</title>
    <style>
        table {
            width: 300px;
            border-collapse: collapse;
        }
        td, Th {
            padding: 3px;
            border: 1px solid black;
        }
        th {
            background: #b0e0e6;
        }
    </style>
    <meta charset="utf-8" />
</head>
<body>
    <h2>Список товаров</h2>
    <a href="index.php">На главную</a>
    <?php
        $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'mysql');
        $sql = "SELECT * FROM products";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Код</th>
                    <th>Наименование</th>
                    <th>Уровень 1</th>
                    <th>Уровень 2</th>
                    <th>Уровень 3</th>
                    <th>Цена</th>
                    <th>Цена СП</th>
                    <th>Количество</th>
                    <th>Поля свойств</th>
                    <th>Совместные покупки</th>
                    <th>Единица измерения</th>
                    <th>Картинка</th>
                    <th>Выводить на главной</th>
                    <th>Описание</th>
                </tr>";
        foreach ($result as $row){
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["code"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["level1"] . "</td>";
            echo "<td>" . $row["level2"] . "</td>";
            echo "<td>" . $row["level3"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["priceSP"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["prop_fields"] . "</td>";
            echo "<td>" . $row["joint_purchases"] . "</td>";
            echo "<td>" . $row["measurement_unit"] . "</td>";
            echo "<td>" . $row["picture"] . "</td>";
            echo "<td>" . $row["is_displayed"] . "</td>";
            echo "<td>" . $row["description"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>