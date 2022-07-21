<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chess Board</title>
  <style>
    body {
      background-color : #808080;
    }
    h1 {
      color : #fff;
      text-align : center;
    }
  </style>
</head>
<body>
  <h1>Tutorial-01</h1>
  <table style="width:400px;margin:50px auto";>
    <?php
        $total = 0;
        for ($row = 0; $row < 8; $row++) {
            echo "<tr>";
            $total = $row;
            for ($col = 0; $col < 8; $col++) {
                if ($total % 2 == 0) {
                    echo "<td style='width:20px;height:40px;background-color:#fff;'></td>";
                    $total++;
                } else {
                    echo "<td style='width:20px;height:40px;background-color:#000;'></td>";
                    $total++;
                }
            }
            echo "</tr>";
        }
    ?>
  </table>

</body>
</html>