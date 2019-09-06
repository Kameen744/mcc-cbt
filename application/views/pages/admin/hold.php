<div class="col-8">
        <?php echo form_open(base_url().'admin/addNewQuestion', ['class' => 'user shadow-lg', 'id' => 'addNewQuestionForm']);?>
          <div class="form-group">
            <select class="form-control form-control-sm" name="SelectQuesCourse" id="SelectQuesCourse">
              <option value="">Select Course</option>
                <?php foreach($questionCourses as $course):?>
                  <option value="<?= $course['id']?>"><?= $course['ex_course']?></option>
                <?php endforeach;?>                                
            </select>
            <b class="text-info"><?php echo form_error('SelectQuesCourse')?></b>
          </div>
          <div class="form-group" id="sectionGroup" style="display:none;">
            <select class="form-control form-control-sm" name="sections" id="quesSectionsid" style="">
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

      

<!-- SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `mcchstexam`.`ex_students` 
ADD COLUMN `ex_olevel_2` VARCHAR(45) NULL DEFAULT NULL AFTER `ex_olevel`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS; -->

      