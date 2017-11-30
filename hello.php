<html>
<head>
<title>PHP Test</title>
</head>
<body>
<?php echo '<p>Hello World</p>'; ?>

<form action="hello.php" method="get">
Query: <input type="text" name="query"><br>
<input type="submit">
</form>
<?php
if (isset($_GET["query"]))
{
        $query=$_GET["query"];
        echo "thats a nice query <br>";
        $htmlq = htmlspecialchars($query);
        echo "lets look at $htmlq <br> ";
$descriptorspec = array(
   0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
   2 => array("file", "/tmp/error-output.txt", "a") // stderr is a file to write to
);

        $process = proc_open('./query.py', $descriptorspec, $pipes, NULL, NULL);
        if(is_resource($process)){
                fwrite($pipes[0], $query);
                fclose($pipes[0]); 
                echo nl2br(stream_get_contents($pipes[1]));
                fclose($pipes[1]);
                $return_value = proc_close($process);
        }
}
?>
</body>
</html>
