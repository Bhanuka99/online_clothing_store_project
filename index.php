<?php

$url="";

if(!empty($_SERVER["https"])){
    $url="https://";
}
else{
    $url="https://";
}

    $hostname=$_SERVER["HTTP_HOST"];

    $url.=$hostname;
    $url.="/onlineclothsstore/view/login.php";

    ?>

    <script>
        window.location="<?php echo $url; ?>";
    </script>

    <?php