<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <script src="script.js"></script>
  <title>LB3</title>
</head>

<body>
  <div>
    <div>
      <label>Выберите имя автора:</label>
      <select name='author' id='author'>
        <?php
        try {
          
          $sql = 'SELECT name FROM lb_1.authors';
          foreach ($dbh->query($sql) as $row) {
            $name = $row[0];
            print "<option value = '$name'>$name</option>";
          }
        } catch (PDOException $e) {

          die("Error!:" . $e->GetMessage() . "<br>");
        }
        ?>
      </select>
      <br><br>
      <input type="submit" value="Отправить" onclick="GetBookByAuthName()">
      </div>
    <br>

    <div>
      <label>Введите временной период (в годах):</label>
      <br>
      С <input style="width: 50px;" name='FYear' id="FYear"></input>
      ПО <input style="width: 50px;" name='SYear' id="SYear"></input>
      <br><br>
      <input type="submit" value="Отправить" onclick="GetBookByDate()">
    </div>
    <br>

    <div>
    <label>Выберите издательство:</label>
      <select name='publisher' id='publisher'>
        <?php
        try {
          $sql = 'SELECT DISTINCT publisher FROM lb_1.literature WHERE publisher IS NOT NULL';
          foreach ($dbh->query($sql) as $row) {
            $name = $row[0];
            print "<option value = '$name'>$name</option>";
          }
        } catch (PDOException $e) {

          die("Error!:" . $e->GetMessage() . "<br>");
        }
        ?>
      </select>
      <br><br>
      <input type="submit" value="Отправить" onclick="GetBookByPublisher()">
    </div>
  </div>
  <br>
  <div>
    <table border='2' id='result'></table>
  </div>
</body>
</html>