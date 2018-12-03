<?php
    require_once('./sql/sqconnect.php');

    function PrintTags() {

        $tagsArray = $_SESSION['tagText'];

        for ($i=0; $i < count($tagsArray); $i++) {
            ?>
            <div>
                <a href="../sqlprint/prremovetag.php?tag=<?php echo $tagsArray[$i]; ?>">
                    <?php
                    echo $tagsArray[$i];
                    ?>
                </a>
            </div>
        <?php

        }

    }
 ?>
