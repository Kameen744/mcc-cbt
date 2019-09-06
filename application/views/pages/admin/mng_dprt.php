<!-- add / remove departments -->
<?php if(isset($addRemoveDepartments)):?>
<h4 class="text-center"><?= $page;?></h4>
<div class="card text-white bg-primary border-left-info">
  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <?php echo form_open(base_url().'admin/regNewDepartment', ['class' => 'user shadow-lg', 'id' => 'newDepartmentForm']);?>
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="department" placeholder="Department">
            <b class="text-info"><?php echo form_error('department')?></b>
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="departmentCode" placeholder="Department Code">
            <b class="text-info"><?php echo form_error('departmentCode')?></b>
          </div>
          <button type="submit" id="addNewDeptSubmit" class="btn btn-info btn-sm btn-block">
            Register Department
          </button>
        <?php echo form_close();?>
      </div>
      <div class="col-8" id="departmentsTable">
        <?php if(isset($departments)):?>
          <table class="table table-inverse table-bordered text-white shadow-lg">
            <thead>
              <tr>
                <th class="py-1">ID</th>
                <th class="py-1">Department</th>
                <th class="py-1">Code</th>
                <th class="py-1">Action</th>
              </tr>
            </thead>
            <tbody id="departmentsTableBody">
              <?php foreach($departments as $department):?>
                <tr>
                  <td class="py-1 px-2"><?=$department['id']?></td>
                  <td class="py-1 px-2"><?= $department['ex_department']?></td>
                  <td class="py-1 px-2"><?= $department['ex_department_code']?></td>
                  <td class="py-1 px-2">
                    <button type="button" id="editDeptBtn" class="btn btn-sm btn-success" value="<?=$department['id']?>">Edit</button>
                    <button type="button" id="delDeptBtn" class="btn btn-sm btn-danger" value="<?=$department['id']?>">Delete</button>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
<?php endif;?>

<!-- Edit Department -->
<?php if(isset($editDepartment)):?>
  <tr>
    <td class="py-1 px-2" colspan="4">
    <?php echo form_open(base_url().'admin/editDepartmentUpdate', ['id' => 'editDepartmentForm']);?>
      <div class="row">  
        <div class="col-1">
          <input type="hidden" class="form-control form-control-sm" name="departmentId" value="<?=$editDepartment['id']?>">
        </div>
        <div class="col-4">
          <input type="text" class="form-control form-control-sm" name="updtdepartment" value="<?= $editDepartment['ex_department']?>">
        </div>
        <div class="col-4">
          <input type="text" class="form-control form-control-sm" name="updtdepartmentCode" value="<?= $editDepartment['ex_department_code']?>">
        </div>
        <div class="col-2">
          <button type="submit" id="editDeptBtnSaveUpadate" class="btn btn-sm btn-success">Save</button>
        </div>  
      </div>
      <?php echo form_close();?>  
    </td>
  </tr>
<?php endif;?>

<!-- add remove courses -->
<?php if(isset($addRemoveCourses)):?>
<h4 class="text-center"><?= $page;?></h4>
<div class="card text-white bg-primary">
  <div class="card-body">
    <div class="row">
      <div class="col-2">
        <?php echo form_open(base_url().'admin/regNewCourse', ['class' => 'user shadow-lg', 'id' => 'newCourseForm']);?>
          <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="course" placeholder="course">
            <b class="text-info"><?php echo form_error('course')?></b>
          </div>
          <button type="submit" id="addCourseSubmit" class="btn btn-info btn-sm btn-block">
            Register Course
          </button>
        <?php echo form_close();?>
      </div>
      
      <div class="col-4" id="coursesTable">
      <?php if(isset($courses)):?>
          <table class="table table-inverse table-bordered text-white shadow-lg">
            <thead>
              <tr class="bg-info">
                <th class="py-1">ID</th>
                <th class="py-1">course</th>
                <th class="py-1">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($courses as $course):?>
                <tr>
                  <td class="py-0 px-2"><?=$course['id']?></td>
                  <td class="py-0 px-2"><?=$course['ex_course']?></td>
                  <td class="py-1 px-0">
                    <button type="button" id="delCourseBtn" class="ml-2 btn btn-sm btn-danger btn-circle" value="<?=$course['id']?>"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        <?php endif;?>
      </div>
      <div class="col-3">
        <?php echo form_open(base_url().'admin/regDeptCourse', ['class' => 'user shadow-lg', 'id' => 'newDeptCourseForm']);?>
          <div class="form-group">
            <select class="form-control form-control-sm" name="SelectDept" id="SelectDept">
              <option value="">Select Department</option>
              <?php foreach($departments as $department):?>
                <option value="<?= $department['id']?>"><?= $department['ex_department']?> (<?= $department['ex_department_code']?>)</option>
              <?php endforeach;?>                                
            </select>
            <b class="text-info"><?php echo form_error('SelectDept')?></b>
          </div>
          <div class="form-group" id="selectCoursesGroup">
            <select class="form-control form-control-sm" name="SelectCourse">
              <option value="">Select Course</option>
              <?php foreach($courses as $course):?>
                <option value="<?= $course['id']?>"><?= $course['ex_course'] ?></option>
              <?php endforeach; ?>                                
            </select>
            <b class="text-info"><?php echo form_error('SelectCourse')?></b>
          </div>
          <div class="form-group">
            <input type="number" class="form-control form-control-sm" name="noOfQues" placeholder="No of Questions">
            <b class="text-info"><?php echo form_error('noOfQues')?></b>
          </div>
          <button type="submit" id="addDeptCourseSubmit" class="btn btn-info btn-sm btn-block">
            Add Course
          </button>
        <?php echo form_close();?>
      </div>
      <div class="col-3" id="departmentCoursesTable">
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<!-- get dept courses -->
<?php if(isset($departmentCourses)): ?>
<table class="table table-inverse table-bordered text-white shadow-lg">
    <thead>
      <tr class="bg-info">
        <th class="py-1">Courses</th>
        <th class="py-1">Qs.</th>
        <th class="py-1">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($deptCourses as $course):?>
        <tr>
          <td class="py-0 px-2"><?= $course['ex_course']?></td>
          <td class="py-0 px-2"><?= $course['ex_noof_questions']?></td>
          <td class="py-0 px-2">
            <button type="button" id="delDeptCourseBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$course['id']?>"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
<?php endif; ?>
