<div class="row justify-content-center">
    <di class="col-md-6 col-sm-12 mx-1">
        <?php if(session()->getFlashdata('msg_success')):?>
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= session()->getFlashdata('msg_success') ?>
                </strong>
            </div>
        <?php endif;?>

        <?php if(session()->getFlashdata('msg_info')):?>
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= session()->getFlashdata('msg_info') ?>
                </strong>
            </div>
        <?php endif;?>

        <?php if(session()->getFlashdata('msg_warning')):?>
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= session()->getFlashdata('msg_warning') ?>
                </strong>
            </div>
        <?php endif;?>

        <?php if(session()->getFlashdata('msg_danger')):?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= session()->getFlashdata('msg_danger') ?>
                </strong>
            </div>
        <?php endif;?>
    </di>
</div>