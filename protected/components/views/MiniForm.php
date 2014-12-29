<div class="<?= $this->class; ?>">
    <div class="box dark">
        <header>
            <div class="icons">
                <i class="<?= $this->logo; ?>"></i>
            </div>
            <h5><?= $this->header; ?></h5>
            <div class="toolbar">
                <nav style="padding: 8px;">
                    <?= $this->help; ?>
                    <?= $this->collapse; ?>
                    <?= $this->fullscreen; ?>
                </nav>
            </div>

        </header>
        <div <?= $this->height; ?> class="body">
            <?= $this->content; ?>
        </div>
    </div>
</div>