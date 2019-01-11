<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php bloginfo();?>
    </title>
</head>
<body>
    
<?php
while (have_posts()) {
    The_post();
    echo "<h2>";
    the_title();
    echo "</h2>";
}
?>


</body>
</html>