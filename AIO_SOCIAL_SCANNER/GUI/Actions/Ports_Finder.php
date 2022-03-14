<?php
    /*AUTHOR: Luca Garofalo (Lucksi)
    Copyright (C) 2021-2022 Lucksi
    License: GNU General Public License v3.0*/ 
    
    function Checker() {
        $File_name = $_POST["Searcher"];
        if ($File_name == "") {
            echo "
            <script>
            alert('INSERT A HOST');
            </script>";
        }
        else {
            $Complete_name = "../Reports/Ports/{$File_name}.txt";
            if(file_exists($Complete_name)){
                echo "
                <script>
                alert('HOST FOUND');
                </script>";
                echo "<p id = 'Const'>HOST-PORT DATA</p>";
                echo "<div class = 'Data'>";
                echo "<p id = 'Const'>REPORT:</p>";
                $data = fopen($Complete_name,"r")or die("Sever-Error");
                while (!feof($data)){
                    $content = fgets($data);
                    echo "<p>".$content;
                }
                fclose($data);
                echo "</p>";
                echo "\n</div>";     
            }
            else {
                echo "
                <script>
                alert('OPS HOST NOT FOUND');
                </script>";
            }
        }
    }
    if(isset($_POST["Button"])){
        Checker();
    }
?>