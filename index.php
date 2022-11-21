<?php

    ob_start();
    ?>
        <section id="facts">
            <p>Welcome on this flourishing website where you'll be able to learn the most interesting facts about the tremendously talented rugby player, and also physics professor, the almighty gigachad Jean Kieffer.</p>
        </section>
    <?php
    $content = ob_get_clean();
    require('template.php'); 
