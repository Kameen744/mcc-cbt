<!-- manage sections and section questions -->
<?php if(isset($addSectionQuestionsTab)): ?>
  <h4 class="text-center"><?= $page;?></h4>
  <div class="card text-white bg-primary">
    <div class="card-body">
      <div class="row">
        <div class="col-2">
          <?php echo form_open(base_url().'admin/addNewSection', ['class' => 'user shadow-lg', 'id' => 'addNewSectionForm']);?>
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="newSection" placeholder="New Section">
              <b class="text-info"><?php echo form_error('newSection')?></b>
            </div>
            <button type="submit" id="addNewSectionSubmit" class="btn btn-info btn-sm btn-block">
            Add New Section
            </button>
          <?php echo form_close();?>
        </div>
        <div class="col-3" id="sectionsTable">
          <?php if(isset($Sections)): ?>
            <table class="table table-inverse table-bordered text-white shadow-lg">
              <thead>
                <tr>
                  <th class="py-1">ID</th>
                  <th class="py-1">Section</th>
                  <th class="py-1">Action</th>
                </tr>
              </thead>
              <tbody id="departmentsTableBody">
                <?php foreach($Sections as $section):?>
                  <tr>
                    <td class="py-0 px-2"><?=$section['id']?></td>
                    <td class="py-0 px-2"><?= $section['ex_section']?></td>
                    <td class="py-0 px-2">
                    <button type="button" id="delSectionBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$section['id']?>"><i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
        <div class="col-7">
          <?php echo form_open(base_url().'admin/addNewSectionQuestion', ['class' => 'user shadow-lg', 'id' => 'addNewSectionQuesForm']);?>
            <div class="form-group" id="sectionGroup">
              <select class="form-control form-control-sm" name="sections" id="selSecQuesSectionsid">
                <option value="">Select Section</option>
                  <?php foreach($Sections as $section):?>
                    <option value="<?= $section['id']?>"><?= $section['ex_section']?></option>
                  <?php endforeach;?>                               
              </select>
              <b class="text-info"><?php echo form_error('sections')?></b>
            </div>
            <div class="form-group">
              <textarea type="text" rows="10" class="form-control form-control-sm" name="newSectionQues" id="secQstSummrNt"></textarea>
              <b class="text-info"><?php echo form_error('newSectionQues')?></b>
            </div>
            <button type="submit" id="addNewSectionQuesSubmit" class="btn btn-info btn-sm btn-block">
              Add New Question
            </button> 
          <?php echo form_close(); ?>
        </div>
        <div class="col-12" id="sectionQuestionsTable">
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- section Qeustions table -->
<?php if(isset($sectionQuestions)): ?>
  <table class="table table-inverse table-bordered text-white shadow-lg">
    <thead>
      <tr>
        <th class="py-1">Question/Passage</th>
      </tr>
    </thead>
    <tbody id="departmentsTableBody">
      <?php foreach($sectionQuestions as $question):?>
        <tr>
          <td class="py-0 px-2"><?= html_entity_decode($question['ex_section_question'])?><br>
          <button type="button" id="editSecQuesBtn" class="btn btn-sm btn-success btn-circle" value="<?=$question['id']?>"><i class="fas fa-pen"></i></button>
          <button type="button" id="delSecQuesBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$question['id']?>"><i class="fas fa-trash"></i></button>
        </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
<?php endif; ?>
<!-- manage Exam parts and sections tab -->
<?php if(isset($addQuestionsTab)):?>
<h4 class="text-center"><?= $page;?></h4>
<div class="card text-white bg-primary">
  <div class="card-body">
    <div class="row">
      <div class="col-4">
          <?php echo form_open_multipart(base_url().'admin/uploadQuestionsFrm', ['class' => 'user shadow-lg', 'id' => 'uploadQuestionsFrm']);?>
          <div class="form-group">
            <select class="form-control form-control-sm" name="SelectQuesCourse" id="SelectQuesCourse">
              <option value="">Select Course</option>
                <?php foreach($questionCourses as $course):?>
                  <option value="<?= $course['id']?>"><?= $course['ex_course']?></option>
                <?php endforeach;?>                                
            </select>
            <b class="text-info"><?php echo form_error('SelectQuesCourse')?></b>
          </div>
          <div class="form-group" id="sectionGroup">
            <select class="form-control form-control-sm" name="sections" id="quesSectionsid" style="">
              <option value="">Select Section</option>
                <?php foreach($Sections as $section):?>
                  <option value="<?= $section['id']?>"><?= $section['ex_section']?></option>
                <?php endforeach;?>                                
            </select>
            <b class="text-info"><?php echo form_error('sections')?></b>
          </div>
          <hr>  
          <div class="form-group">
              <input type="file" class="form-control form-control-sm" name="studentsFile" placeholder="Students File">
              <b class="text-info"><?php echo form_error('studentsFile')?></b>
            </div>
            <button type="submit" id="uploadQuestionsBtn" class="btn btn-info btn-sm btn-block">
            Upload Questions
            </button>
          <?php echo form_close();?>
          <hr>
      </div>
      <div class="col-8">
        <?php echo form_open(base_url().'admin/addNewQuestion', ['class' => 'user shadow-lg', 'id' => 'addNewQuestionForm']);?>
          <div class="form-group">
            <select class="form-control form-control-sm" name="SelectQuesCourse" id="frmSelectQuesCourse">
              <option value="">Select Course</option>
                <?php foreach($questionCourses as $course):?>
                  <option value="<?= $course['id']?>"><?= $course['ex_course']?></option>
                <?php endforeach;?>                                
            </select>
            <b class="text-info"><?php echo form_error('SelectQuesCourse')?></b>
          </div>
          <div class="form-group" id="sectionGroup">
            <select class="form-control form-control-sm" name="sections" id="frmquesSectionsid" style="">
              <option value="">Select Section</option>
                <?php foreach($Sections as $section):?>
                  <option value="<?= $section['id']?>"><?= $section['ex_section']?></option>
                <?php endforeach;?>                                
            </select>
            <b class="text-info"><?php echo form_error('sections')?></b>
          </div>
            <div class="form-group">
              <textarea type="text" class="" name="questionText" id="qstSummerNote"></textarea>
              <b class="text-info"><?php echo form_error('questionText')?></b>
            </div>
            <div class="col-12 mb-3">
              <div class="row">
                <div class="input-group col-12 p-0">
                  
                  <div class="input-group-prepend ml-1">
                    <button class="btn btn-info btn-sm" type="button">A</button>
                  </div>
                  <div style="width:320px;">
                    <textarea type="text" class="" name="optionA" id="optionASummerNote"></textarea>
                    <b class="text-info"><?php echo form_error('optionA')?></b>
                  </div>

                  <div class="input-group-prepend ml-2">
                    <button class="btn btn-info btn-sm" type="button">B</button>
                  </div>
                  <div style="width:320px;">
                    <textarea type="text" class="" name="optionB" id="optionBSummerNote"></textarea>
                    <b class="text-info"><?php echo form_error('optionB')?></b>
                  </div>
                  
                  <div class="input-group-prepend ml-1 mt-2">
                    <button class="btn btn-info btn-sm" type="button">C</button>
                  </div>
                  <div style="width:320px;" class="mt-2">
                    <textarea type="text" class="" name="optionC" id="optionCSummerNote"></textarea>
                    <b class="text-info"><?php echo form_error('optionC')?></b>
                  </div>

                  <div class="input-group-prepend ml-2 mt-2">
                      <button class="btn btn-info btn-sm" type="button">D</button>
                  </div>
                  <div style="width:320px;" class="mt-2">
                    <textarea type="text" class="" name="optionD" id="optionDSummerNote"></textarea>
                    <b class="text-info"><?php echo form_error('optionD')?></b>
                  </div>

                </div>
              </div>
            </div>

            <div class="form-group">
              <select class="form-control form-control-sm" name="optionR">
                <option value="">Aswer</option> 
                <option value="A">A</option>
                <option value="B">B</option>   
                <option value="C">C</option>   
                <option value="D">D</option>      
              </select>
            </div>
            <b class="text-info"><?php echo form_error('optionR')?></b>
          <button type="submit" id="addQuestionSubmit" class="btn btn-info btn-lg btn-block">
            Add Question
          </button>
        <?php echo form_close();?>
      </div>
      <div class="col-12 m-0 p-0 my-3">
          <textarea type="text" class="form-control form-control-sm" id="textQstHolder"></textarea>
      </div>

      <div class="col-12" id="questionsTableDiv">
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- questions table -->
<?php if(isset($questionsTable)): ?>
    <?php if(isset($questions)):?>
      <?php if(isset($questions[0]['ex_section_question'])):?>
          <div class="col-12 shadow-lg" style="height:80px; overflow:hidden; overflow-y:auto">
            <?= html_entity_decode($questions[0]['ex_section_question'])?>
          </div>
      <?php endif; ?>
      <table class="table table-inverse table-bordered text-white shadow-lg">
        <thead>
          <tr>
            <th class="py-1">S/N</th>
            <th class="py-1">Question</th>
            <?php if(isset($questions[0]['ex_section'])):?>
              <th class="py-1">Section</th>
            <?php endif; ?>
            <th class="py-1">Action</th>
          </tr>
        </thead>
        <tbody id="departmentsTableBody">
          <?php $arrNo = count($questions); for($i = 0; $i < $arrNo; $i++):?>
            <tr>
              <td class="py-0 px-2"><?= $i +1?></td>
              <td class="py-0 px-2"><?= html_entity_decode($questions[$i]['ex_question'])?></td>
              <?php if(isset($questions[$i]['ex_section'])):?>
                <td class="py-0 px-2"><?= html_entity_decode($questions[$i]['ex_section'])?></td>
              <?php endif; ?>
              <td class="py-0 px-2">
                <button type="button" id="delQuestBtn" class="btn btn-sm btn-danger btn-circle" value="<?=$questions[$i]['id']?>"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          <?php endfor;?>
        </tbody>
      </table>
    <?php endif;?>
<?php endif; ?>