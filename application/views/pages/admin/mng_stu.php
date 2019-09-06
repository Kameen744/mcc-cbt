<!-- manage students -->
<?php if(isset($addStudentsTab)): ?>
<h4 class="text-center"><?= $page;?></h4>
  <div class="card text-white bg-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-2">
          <?php echo form_open_multipart(base_url().'admin/addNewStudents', ['class' => 'user shadow-lg', 'id' => 'addNewStudentsForm']);?>
            <div class="form-group">
              <input type="file" class="form-control form-control-sm" name="studentsFile" placeholder="Students File">
              <b class="text-info"><?php echo form_error('studentsFile')?></b>
            </div>
            <button type="submit" id="addStudentsSubmit" class="btn btn-info btn-sm btn-block">
            Upload File
            </button>
          <?php echo form_close();?>
          <hr>
          <h6>Filter by Entry</h6>
          <select name="filterByEtnry" id="filterByEntry">
            <option value="">Filter by Entry</option>
            <option value="Fresh">Fresh</option>
            <option value="Retraining">Retraining</option>
          </select>
          <hr>
          <div class="form-group">
            <input type="text"
              class="form-control" name="" id="searchByAppNo" placeholder="Search by app no">
          </div>
          <?php if(isset($insrtError)): ?>
            <div class="alert alert-danger" role="alert">
              <strong><?= $insrtError?> Records contain error or empty appliction number. Correct and upload file again.</strong>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-10" id="studentsTable">
        <?php if(isset($students)): ?>
            <table class="table table-inverse table-bordered text-white shadow-lg">
              <thead>
                <tr>
                  <th class="py-1">App/No</th>
                  <th class="py-1">Full Name</th>
                  <th class="py-1">State</th>
                  <th class="py-1">Phone</th>
                  <th class="py-1">Entry</th>
                  <th class="py-1">Recomendation</th>
                  <th class="py-1">Action</th>
                  
                </tr>
              </thead>
              <tbody id="departmentsTableBody">
                <?php foreach($students as $student):?>
                  <tr>
                    <td class="py-0 px-2"><?= $student['ex_serial_no']?></td>
                    <td class="py-0 px-2"><?= $student['ex_full_name']?></td>
                    <td class="py-0 px-2"><?= $student['ex_state']?></td>
                    <td class="py-0 px-2"><?= $student['ex_phone']?></td>
                    <td class="py-0 px-2"><?= $student['ex_modeofentry']?></td>
                    <td class="py-0 px-2">
                      <div class="form-group">
                        <select class="form-control form-control-sm" id="recomendationText">
                          <option value="<?= $student['ex_recomd']?>"><?= $student['ex_recomd']?></option>
                          <option value="CHEW">CHEW</option>
                          <option value="CHEWRT">CHEWRT</option>
                          <option value="JCHEW">JCHEW</option>
                          <option value="MLT">MLT</option>
                          <option value="DST">DST</option>
                          <option value="DHT">DHT</option>
                          <option value="DHTRT">DHTRT</option>
                          <option value="BMET">BMET</option>
                          <option value="BMEA">BMEA</option>
                          <option value="EVT">EVT</option>
                          <option value="EHT">EHT</option>
                          <option value="NDHIM">NDHIM</option>
                          <option value="PDHIM">PDHIM</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </div>
                    </td>
                    <td class="py-0 px-2">
                    <button type="button" id="delStudentBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$student['id']?>"><i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>

        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- print stud passwords -->

<?php if(isset($printStuPasswords)): ?>
<h4 class="text-center"><?= $page;?></h4>
  <div class="card text-white bg-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
            <div class="form-group">
              <textarea type="text" class="form-control form-control-sm" id="instrText" placeholder="Instruction Text"></textarea>
            </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <button class="btn btn-info btn-lg" id="printStuPasswordsBtn">Print</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- Load students password -->
<?php if(isset($stupasswords)): ?>
    <?php foreach($stupasswords as $pass): ?>
        <div class="card border-primary text-center">
          <div class="card-body">
            <h4 class="card-title"><?= $pass['ex_full_name']?></h4>
            <div class="row">
                <div class="col-6"><h5>Username: <?= $pass['ex_serial_no']?></h5></div>
                <div class="col-6"><h5>Password: <?= $pass['ex_password']?></h5></div>
                <div class="col-12">
                    <?php if(isset($instructionText)): ?>
                        <h6><?= $instructionText['ex_instruction']?></h6>
                    <?php endif; ?>
                </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<!-- vie scores -->
<?php if(isset($scrView)):?>
  <div class="card border-primary text-center" style="overflow-x: scroll">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
        <h4 class="card-title text-center"><button class="btn btn-primary" id="printScoreBtn">Print</button></h4>
          <table class="table table-striped table-bordered">
            <thead class="thead-inverse">
              <tr>
              <th>S/N</th>
              <th>App No</th>
              <th>Name</th>
              <th>State</th>
              <th>Entry</th>
              <th>1ST Choice</th>
              <th>2ND Choice</th>
              <th>O-level 1</th>
              <th>O-level 2</th>
              <th>Attempts</th>
              <th>Score</th>
              <th>Recomandation</th>
              <th>Approved</th>
              <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($scrView as $scr): ?>
                  <tr>
                  <td><?= $scr['Sno'] ?></td>
                  <td><?= $scr['serial_no'] ?></td>
                  <td><?= $scr['ex_full_name'] ?></td>
                  <td><?= $scr['ex_state'] ?></td>
                  <td><?= $scr['ex_modeofentry'] ?></td>
                  <td><?= $scr['ex_first_choice'] ?></td>
                  <td><?= $scr['ex_second_choice'] ?></td>
                  <td><?= $scr['ex_olevel'] ?></td>
                  <td><?= $scr['ex_olevel_2'] ?></td>
                  <td><?= $scr['ttatmpt'] ?></td>
                  <td><?= $scr['ttscr'] ?></td>
                  <td><?= $scr['ex_recomd'] ?></td>
                  <td><?= $scr['ex_apprv'] ?></td>
                  <td>
                  <button type="button" id="delStudentScoreBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$scr['stu_id']?>"><i class="fas fa-trash"></i></button>
                  </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- print Scores -->
<?php if(isset($scrPrint)): ?>
  <table class="table table-striped table-inverse">
    <thead class="thead-inverse">
      <tr>
        <th>S/N</th>
        <th>App No</th>
        <th>Name</th>
        <th>State</th>
        <th>Entry</th>
        <th>1ST Choice</th>
        <th>2ND Choice</th>
        <th>O-level 1</th>
        <th>O-level 2</th>
        <th>Attempts</th>
        <th>Score</th>
        <th>Recomandation</th>
        <th>Approved</th>
      
      </tr>
      </thead>
      <tbody>
        <?php foreach($scrPrint as $scr): ?>
          <tr>
            <td style=""><?= $scr['Sno'] ?></td>
            <td style=""><?= $scr['serial_no'] ?></td>
            <td style=""><?= $scr['ex_full_name'] ?></td>
            <td style=""><?= $scr['ex_state'] ?></td>
            <td style=""><?= $scr['ex_modeofentry'] ?></td>
            <td style=""><?= $scr['ex_first_choice'] ?></td>
            <td style=""><?= $scr['ex_second_choice'] ?></td>
            <td style=""><?= $scr['ex_olevel'] ?></td>
            <td style=""><?= $scr['ex_olevel_2'] ?></td>
            <td style=""><?= $scr['ttatmpt'] ?></td>
            <td style=""><?= $scr['ttscr'] ?></td>
            <td style=""><?= $scr['ex_recomd'] ?></td>
            <td style=""><?= $scr['ex_apprv'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
  </table>
<?php endif; ?>
<!-- start stop exam -->
<?php if(isset($startStopExamTab)): ?>
  <div class="card text-white bg-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-4">
          <?php if(isset($examStartStatus)): ?>
          <div class="form-group">
            <button class="btn btn-info btn-lg" id="StopExamBtn">Stop Exam</button>
          </div>
          <?php else: ?>
          <div class="form-group">
            <button class="btn btn-info btn-lg" id="startExamBtn">Start Exam</button>
          </div>
          <?php endif; ?>
        </div>
        <div class="col-8">
          <h5>Set / Change Exam Duration</h5>
          <?php echo form_open(base_url().'admin/setExamDuration', ['class' => 'user shadow-lg', 'id' => 'setExamDurationFrm']);?>
            <div class="form-group">
              <input type="text" class="form-control" name="examHours" placeholder="Hours e.g 1">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="examMinutes" placeholder="Minutes e.g 30">
            </div>
            <div class="form-group">
              <button class="btn btn-info btn-lg" id="setExamDurationBtn">Set Time</button>
            </div>
          <?php form_close() ?> 
          <hr>
          <?php if(isset($examDuration)): ?>
            <table class="table table-striped text-white table-inverse">
            <thead class="thead-inverse">
              <tr>
              <td class="px-1">Exam Duration</td>
                <td class="px-1">Hrs: <?= $examDuration['ex_hours']?></td>
                <td class="px-1">Min: <?= $examDuration['ex_minutes']?></td>
              </tr>
            </thead>
           
            </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- recomendation -->
<?php if(isset($recondationTab)): ?>
<div class="card text-white bg-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
        <?php echo form_open(base_url().'admin/addRecomendation', ['class' => 'user shadow-lg', 'id' => 'addRecomendationForm']);?>
          <table>
            <th>S/N</th>
            <th>Name</th>
            <th>App No</th>
            <th>Action</th>
          </table>
        <?php form_close() ?>  
      </div>
      </div>
    </div>
  </div>
<?php endif; ?>