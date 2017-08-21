<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <link rel="stylesheet" href="">
        <style type="text/css">
            th { text-align: left; background-color: #999; }
            th, td { padding: 0.4em; }
            tr.alt td { background: #ddd; }
        </style>
    </head>
    <body>
        <?php 
            define("PAGE_SIZE", 10);
            $start=0;
            if(isset($_GET['start']) && (int)$_GET['start']>0 && (int)$_GET['start']<100000)
                $start=(int)$_GET['start'];//casting since the value is received from a user.
            $end=$start + PAGE_SIZE -1;
            echo "<h1>Squaring Numbers</h1>Displaying square numbers of $start to $end";
        ?>
        <table border="1" width="20">
            <thead>
                <tr>
                    <th>n</th>
                    <th>n<sup>2</sup></th>
                </tr>
            </thead>
            <?php 
            for($i=$start;$i<=$end;$i++) 
            { ?>
                <tbody>
                    <tr <?php if($i%2===0)echo 'class="alt"'?>>
                        <td><?php echo $i;?></td>
                        <td><?php echo pow($i,2);?></td>
                    </tr>                
                </tbody>
            <?php
            } ?>
        </table>
        <a href="./query_strings.php?start=<?php echo $start-PAGE_SIZE?>">&lt;Previous Page</a> |
        <a href="./query_strings.php?start=<?php echo $start+PAGE_SIZE?>">Next Page&gt;</a>

        
    </body>
</html>