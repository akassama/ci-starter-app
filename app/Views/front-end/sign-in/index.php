<!-- include layout -->
<?= $this->extend('shared/_layout') ?>

<!-- main content -->
<?= $this->section('content') ?>
<section class="bg-light mt-3">
    <?= $this->include('shared/_messages') ?>
    <div class="row">
        <div class="col-6 offset-3 bg-inverse">
            <div class="row">
                <span class="validation_errors text-danger">
                    <?= validation_list_errors() ?>
                </span>
            </div>

            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('sign-in/process-login') ?>" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-12 mb-2">
                <h4 class="text-center">
                    Login
                </h4>
            </div>
            <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <!-- Error -->
                        <?php if($validation->getError('last_name')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('last_name'); ?>
                            </div>
                        <?php }?>                        
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= set_value('email') ?>" required>
                        <div class="invalid-feedback">
                            Please choose an email.
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= set_value('password') ?>" required>
                         <!-- Error -->
                         <?php if($validation->getError('password')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('password'); ?>
                            </div>
                        <?php }?>                       
                        <div class="invalid-feedback">
                            Please provide a password.
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <button type="submit" class="btn btn-danger submit-btn">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>