<?php
echo "<h2>Reading Text file</h2>";
$filename = "files/text.txt";
$file = fopen($filename, 'r');

if ($file == false) {
    echo "Error to open text file.";
    exit();
}
$filesize = filesize($filename);
$read = fread($file, $filesize);
echo "<pre>$read</pre>";
fclose($file);
?>

<?php

echo "<h2>Reading CSV file</h2>";

$filename = "files/StudentList.csv";
$file = file_get_contents($filename);
echo $file . "<br>";

echo "----------------------------<br>";

$csvfile = file('files/StudentList.csv');
foreach ($csvfile as $key => $value) {
    echo $value . "<br>";
}
echo "----------------------------<br>";

foreach ($csvfile as $value) {
    $data = str_getcsv($value);
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    echo "<br>";
}
?>
<html>
    <head></head>
    <body>
        <h2>Showing Student List from Csv file</h2>
        <table style="width : 400px;border : 1px solid #000;border-collapse: collapse;text-align:center;">
            <?php
                $file = fopen("files/StudentList.csv",'r');
                while(($data = fgetcsv($file)) == true){
                    echo "<tr>";
                        foreach ($data as $value) {
                            echo "<td>$value</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </table>
    </body>
</html>