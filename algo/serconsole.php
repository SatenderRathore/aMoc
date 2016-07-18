<?php
include("sayy.php");

?>
<html>
<head>
</head>


<body>
    <script type="text/javascript">
    setInterval(controller,1000);
    function controller()
    {
        <?php
        see();
        ?>
    }
    </script>
</body>
</html>