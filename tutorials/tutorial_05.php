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