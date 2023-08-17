<?php $session = session(); ?>

<!-- include layout -->
<?= $this->extend('shared/_adminLayout') ?>

<!-- main content -->
<?= $this->section('content') ?>
<section class="features-icons bg-light text-center mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="lead text-info">
                    Welcome <?php echo $name ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>