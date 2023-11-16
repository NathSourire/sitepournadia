<main>
    <div> <?= $messageConf ?></div>
</main>
<div>
    <?php
    FlashMessage::display();
    ?>
</div>