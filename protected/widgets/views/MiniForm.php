<div class="panel panel-default <?= $class; ?>">
    <div class="panel-heading">

        <div class="icons">
            <i class="<?= $logo; ?>"></i>
        </div>
        <h5><?= $header; ?></h5>

        <div class="toolbar">
            <nav style="padding: 8px;">
                <?= $help; ?>
                <?= $collapse; ?>
                <?= $fullscreen; ?>
            </nav>
        </div>

    </div>
    <div <?= $height; ?> class="panel-body">
        <?= $content; ?>
    </div>

</div>
