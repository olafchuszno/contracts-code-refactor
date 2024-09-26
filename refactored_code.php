<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<!-- What is db_bgcolor? Not provided in the email -->
<body
  bgcolor="<?php echo $dg_bgcolor ?>"
>
  <br>

  <table width=95%>
    <?php echo $result ?>
  </table>
</body>

</html>

<?php

$sql_orderby = $_GET['sort'] === 1 ? "2, 4 DESC" : "10";

// Where condition
$sql_condition = "id = {$_GET['id']} AND kwota > 10";

// Both combined
$orderBy = $_GET['akcja'] === 5 ? "$sql_orderby" : 'id';

$sql_query = mysql_query("SELECT * FROM contracts WHERE $sql_condition ORDER BY $orderBy");

$result = '';

foreach (mysql_fetch_array($sql_query) as $element) {
  $result.="
    <tr>
      <td>.$z[0]</td>
      <td>$z[2]
  ";

  if ($_GET['akcja'] == 5 && $z[10] > 5) {
    $result.=" $z[10]";
  }

  $result.="
      </td>
    <tr>
  ";
}
