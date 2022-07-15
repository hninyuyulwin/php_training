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
  </style>
</head>
<body>
  <table style="width:400px;margin:50px auto";>
    <?php
      $total = 0;
      for ($i=0; $i < 8 ; $i++) { 
        echo "<tr>";
          $total = $i;
          for ($j=0; $j <8 ; $j++) { 
            if($total %2 == 0){
              echo "<td style='width:20px;height:40px;background-color:#fff;'></td>";
              $total++;
            }else{
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