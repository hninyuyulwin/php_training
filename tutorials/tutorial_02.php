<html>
    <head>
    <title>Diamond Shape</title>
    <style>
    </style>
    </head>
    <body>
        <div style="margin-left:30%;margin-top:50px;">
            <h2>Diamond Shape</h2>
            <?php
                $size = 6;
                for ($row=1; $row <=$size ; $row++) { 
                    for ($space=$size; $space > $row ; $space--) { 
                        echo "&nbsp;&nbsp;";
                    }
                    for ($star=0; $star < $row*2-1 ; $star++) { 
                        echo "*";
                    }
                    echo "<br>";
                }

                for ($row=1; $row <= $size ; $row++) { 
                    for ($space=0; $space < $row ; $space++) { 
                        echo "&nbsp;&nbsp;";
                    }
                    for ($star=($size - $row)*2-1; $star > 0 ; $star--) { 
                        echo "*";
                    }
                    echo "<br>";
                }
            ?>
        </div> 
    </body>
</html>