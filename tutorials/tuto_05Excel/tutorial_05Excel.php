<?php
  require 'XLSXReader.php';

  $excel = new XLSXReader(filePath:'file.xlsx');

  $dataexcel = $excel->getSheetData(sheetNameOrId : 'Sheet1');

?>
<html>
  <head>
    <title>Showing with table</title>
  </head>
  <body>
    <table style="width:800px;border:1px;text-align:center;">
      <?php
        foreach ($dataexcel[0] as $v) {
          echo "<th>$v</th>";
        }
      ?>
      <?php
        foreach ($dataexcel as $k=>$v) {
          if($k != 0){
            echo "<tr>";
            foreach($v as $value){
              echo "<td>$value</td>";
            }
            echo "</tr>";
          }
        }
      ?>
    </table>
  </body>
</html>