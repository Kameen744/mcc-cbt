<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 p-0">
    <img src="<?php echo base_url()?>assets/img/logo.png" alt="MCCHST LOGO" class="mt-5" style="width: 200px; height:200px; margin-left:38%;">
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
            <div class="col-6 mb-5 pb-5">
                <div class="px-5">
                    <div class="justify-content-center">
                        <!-- <h1 class="h4 text-gray-900 mb-4">Welcome</h1> -->
                    </div>
                    <?php echo form_open(base_url().'login/StudentsLogin', ['class' => 'user']);?>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user shadow-lg" name="admissionNumber" placeholder="Enter your application no...">
                            <b class="text-danger"><?php echo form_error('admissionNumber')?></b>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user shadow-lg" name="studentPassword" placeholder="Password...">
                            <b class="text-danger"><?php echo form_error('studentPassword')?></b>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-user btn-block shadow-lg">
                            Login
                        </button>
                        
                    <?php echo form_close();?>
                    <?php 
                        if($this->session->flashdata('studentsLogin_message')) {
                            echo '<h4 class="alert alert-danger text-center mt-5">'.$this->session->flashdata('studentsLogin_message').'</h4>';
                        }
                    ?>
                </div>
            </div>
        </div>
        </div> 
    </div>
    </div>
</div>