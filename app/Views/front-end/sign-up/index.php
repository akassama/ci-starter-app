<!-- include layout -->
<?= $this->extend('shared/_layout') ?>

<!-- main content -->
<?= $this->section('content') ?>
<section class="bg-light mt-3">
    <?= $this->include('shared/_messages') ?>
    <div class="row">
        <div class="col-8 offset-2 bg-inverse">
            
            <div class="row">
                <span class="validation_errors text-danger">
                    <?= validation_list_errors() ?>
                </span>
            </div>

            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('sign-up/add-registration') ?>" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-12 mb-2">
                <h4 class="text-center">
                    Registration
                </h4>
            </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="FirstName">First Name:</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" value="<?= set_value('first_name') ?>" required>
                        <!-- Error -->
                        <?php if($validation->getError('first_name')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('first_name'); ?>
                            </div>
                        <?php }?>
                        <div class="invalid-feedback">
                            Please choose a first name.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2 mb-2">
                    <div class="form-group">
                        <label for="LastName">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="<?= set_value('last_name') ?>" required>
                         <!-- Error -->
                         <?php if($validation->getError('last_name')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('last_name'); ?>
                            </div>
                        <?php }?>                       
                        <div class="invalid-feedback">
                            Please choose a last name.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="DateOfBirth">D.O.B:</label>
                        <input type="date" class="form-control" id="dob" placeholder="Enter date of birth" name="dob" value="<?= set_value('dob') ?>">
                        <!-- Error -->
                        <?php if($validation->getError('last_name')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('last_name'); ?>
                            </div>
                        <?php }?>                        
                        <div class="invalid-feedback">
                            Please choose a last name.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
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
                <div class="col-md-6 mb-2">
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
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="RepeatPassword">Repeat Password:</label>
                        <input type="password" class="form-control" id="repeat_password" placeholder="Repeat password" name="repeat_password" value="<?= set_value('repeat_password') ?>" required>
                        <!-- Error -->
                        <?php if($validation->getError('repeat_password')) {?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('repeat_password'); ?>
                            </div>
                        <?php }?>
                        <div class="invalid-feedback">
                            Please repeat password.
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <button type="submit" class="btn btn-danger submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>