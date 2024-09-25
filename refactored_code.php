<?php

// contracts

// 0 => id,
// 2 => nazwa przedsiebiorcy,
// 4 => NIP,
// 10 => kwota,

if ($_GET['akcja'] == 5) {

    // show contracts with amount more than 10

    $x = "id = {$_GET[i]} AND kwota > 10; ";

    $sql_orderby = " order by ";

    switch ($_GET['sort']) {
      case 1:
        $sql_orderby.= "2, 4";
        $b = 'DESC';
        break;
      case 2:
        $sql_orderby.= "10";
      break;
    }

    $i = "SELECT * FROM contracts WHERE $x ORDER BY $sql_orderby $b";

    $a = mysql_query($i);


    echo `
    <html>
      <body bgcolor=$dg_bgcolor>
        <br>
        <table width=95%>`;

    while ($z = mysql_fetch_array($a)) {

        echo "
          <tr>
            <td>.$z[0]</td>
            <td>$z[2]
        ";

        if ($z[10] > 5) {
          echo " $z[10]";
        }
        
        echo "
            </td>
          <tr>
        ";
    }

} else {

    $c = mysql_query("SELECT * FROM contracts WHERE $x ORDER BY id");

    echo "
    <html>
      <body bgcolor=$dg_bgcolor>
        <br>
        <table width=95%>
    ";

    while ($z = mysql_fetch_array($c)) {

        echo "
          <tr>
            <td>$z[0]</td>
            <td>$z[2]</td>
          <tr>
        ";
    }

}

echo "
      </table>
    </body>
  </html>
  ";