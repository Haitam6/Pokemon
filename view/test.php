<?php ob_start(); ?>

<pre>
    <?php
    var_dump($test);
    ?>
</pre>

<?php
$content = ob_get_clean();
$title_part = "TEST";
require("template.php");
?>