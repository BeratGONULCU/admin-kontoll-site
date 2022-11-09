<?php
include_once("connection.php");
$query = "SELECT * FROM kullanici";
$result = mysql_query($query);

?>

<DOCTYPE html>
        <html>
            <body>
                <?php
                
                while($rows=mysql_fetch_assoc($result))
                {
                    echo rows['kullaniciID'];
                    echo rows['kullaniciAdi'];
                    echo rows['parola'];
                    echo rows['yetki'];
                    echo rows['email'];
                    echo rows['aktif'];

                }
                
                ?>
            </body>
        </html>