<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0">
    <img src="<?php echo base_url()?>assets/img/logo.png" alt="MCCHST LOGO" class="mt-5" style="width: 200px; height:200px; margin-left:38%;">
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="px-5">
                    <div class="justify-content-center">
                        <!-- <img src="assets/img/logo.png" alt="MCCHST LOGO" class="w-45"> -->
                    </div>
                    <?php echo form_open(base_url().'login/AdminLogin', ['class' => 'user']);?>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user shadow-lg" name="adminUserName" placeholder="Enter your username">
                            <b class="text-danger"><?php echo form_error('adminUserName')?></b>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user shadow-lg" name="adminPassword" placeholder="Password...">
                            <b class="text-danger"><?php echo form_error('adminPassword')?></b>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block shadow-lg">
                            Login
                        </button>
                    <?php echo form_close();?>
                    <?php 
                        if($this->session->flashdata('adminLogin_message')) {
                            echo '<h4 class="alert alert-danger text-center mt-5">'.$this->session->flashdata('adminLogin_message').'</h4>';
                        }
                    ?>
                </div>
            </div>
        </div>
        </div> 
    </div>
    </div>
</div>