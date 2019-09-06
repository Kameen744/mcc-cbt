 <!-- Page Wrapper -->
 <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-blue topbar static-top shadow" id="dashNavbar" style="height:35px;">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto p-0">
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#calculatorModal">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Calculator</span>
                <!-- <img class="img-profile rounded-circle" src=""> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Close
                </a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="#" role="button">
                  <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="timeArea"</span> -->
                  <b class="ml-1 text-primary" id="timeHour"></b>: 
                  <b class="ml-1 text-primary" id="timeMin"></b>: 
                  <b class="ml-1 text-primary" id="timeSec"></b>
                </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <!-- <a class="nav-link" href="#" role="button">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $studentFirstChoice ?></span> -->
                  <!-- <img class="img-profile rounded-circle" src=""> -->
                <!-- </a>
            </li> -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link" href="#" role="button">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="stuAdmsNo"><?= $studentAdmsNo ?></span>
                </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $studentName; ?></span>
                <!-- <img class="img-profile rounded-circle" src=""> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url();?>logout/studentsLogout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid m-0 p-1" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">
         <div class="row" id="adminPage">
           <div class="col-12 pt-0">
             <div class="card">
             <!-- <img src="<?php echo base_url()?>assets/img/logo.png" alt="MCCHST LOGO" class="" style="width: 150px; height:150px; margin-left:43%;"> -->
               <div class="card-body p-1">
                 <div class="row" id="examAreaCont">
                    <div class="col-12 text-center p-0">
                      <hr>
                      <br>
                        <p class="card-text"><?= $instructionTxt['ex_instruction']?></p>
                      <hr>
                      <?php if(isset($examStatus) & isset($studentStatus)): ?>
                      <button type="button" class="btn btn-lg btn-info" id="StartExam">Start Exam</button>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12 mt-3" id="questionsBtns"></div> 
                  </div>
               </div>
             </div>
           </div>
         </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MCCHST 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- modal -->
<div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="calculatorModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content p-0" style="background:rgba(0,0,0,0.0); border:0ch; max-width:360px;">
      <div class="modal-body p-0" style="border:0ch;">
        <div class="container py-3" style="max-width:350px;">
            <form>
                <input readonly id="display1" type="text" class="form-control-lg text-right">
                <input readonly id="display2" type="text" class="form-control-lg text-right">
            </form>
            
            <div class="d-flex justify-content-between button-row">
                <button id="left-parenthesis" type="button" class="operator-group calbutton">&#40;</button>
                <button id="right-parenthesis" type="button" class="operator-group calbutton">&#41;</button>
                <button id="square-root" type="button" class="operator-group calbutton">&#8730;</button>
                <button id="square" type="button" class="operator-group calbutton">&#120;&#178;</button>
            </div>
          
            <div class="d-flex justify-content-between button-row">
                <button id="clear" type="button" class="calbutton">&#67;</button>
                <button id="backspace" type="button" class="calbutton">&#9003;</button>
                <button id="ans" type="button" class="operand-group calbutton">&#65;&#110;&#115;</button>
                <button id="divide" type="button" class="operator-group calbutton">&#247;</button>
            </div>
            

            <div class="d-flex justify-content-between button-row">
                <button id="seven" type="button" class="operand-group calbutton">&#55;</button>
                <button id="eight" type="button" class="operand-group calbutton">&#56;</button>
                <button id="nine" type="button" class="operand-group calbutton">&#57;</button>
                <button id="multiply" type="button" class="operator-group calbutton">&#215;</button>
            </div>
        
            
            <div class="d-flex justify-content-between button-row">
                <button id="four" type="button" class="operand-group calbutton">&#52;</button>
                <button id="five" type="button" class="operand-group calbutton">&#53;</button> 
                <button id="six" type="button" class="operand-group calbutton">&#54;</button> 
                <button id="subtract" type="button" class="operator-group calbutton">&#8722;</button>
            </div>
      
            
            <div class="d-flex justify-content-between button-row">
                <button id="one" type="button" class="operand-group calbutton">&#49;</button> 
                <button id="two" type="button" class="operand-group calbutton">&#50;</button>
                <button id="three" type="button" class="operand-group calbutton">&#51;</button>
                <button id="add" type="button" class="operator-group calbutton">&#43;</button>
            </div>

            <div class="d-flex justify-content-between button-row">
                <button id="percentage" type="button" class="operand-group calbutton">&#37;</button>
                <button id="zero" type="button" class="operand-group calbutton">&#48;</button>
                <button id="decimal" type="button" class="operand-group calbutton">&#46;</button>
                <button id="equal" type="button" class="calbutton">&#61;</button>
            </div>

          </div>
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

</div>