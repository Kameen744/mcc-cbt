// global data
var questionsArray = [];
var questionsAttempts = [];
var numberOfQuestions = 0;
var currentQuestion = 0;
var selectedOption;
var hrs = 0, min = 0, sec = 0;
// function timerReads (hrs, min, sec){
//   this.hrs = hrs; this.min = min; this.sec = sec;
// }
function loadingMd() {
  $('body').loadingModal({
      position: 'auto',
      text: 'Loading...',
      color: '#fff',
      opacity: '0.7',
      backgroundColor: 'rgb(0,0,0)',
      animation: 'doubleBounce'
    });    
}
// ajax call obj
function ajxobj (url, method='GET', dataType='HTML', data=null) {
  this.jxhr = $.ajax({
    url: url,
    method: method,
    dataType: dataType,
    data: data
  });
}
// summer not init
function summernotInit(elm, placehold) {
  $(elm).summernote({
    placeholder: placehold,
    height: 40, 
    toolbar: [
      // [groupName, [list of button]]
      // ['style', ['bold', 'italic', 'underline', 'clear']],
      // ['font', ['strikethrough', 'superscript', 'subscript']]
      // ['fontsize', ['fontsize']]
      // ['color', ['color']],
      // ['para', ['ul', 'ol', 'paragraph']]
    ]
  });
}

// form submit
function formSubmit (formid, elm) {
  loadingMd();
  var form = document.getElementById(formid);
  if (!form.action) { console.log('no form action'); return;}
  var oReq = new XMLHttpRequest();
  if (form.method.toLowerCase() === "post") {
    oReq.open("post", form.action);
    oReq.send(new FormData(form));
  } else {console.log('wrong form method')}
  oReq.onload = function () {
    $('body').loadingModal('destroy');
    $(elm).html(this.responseText);
  }
}
// add remove Department
$(document).on('click', '#addRemoveDept', function() {
  loadingMd();
  var post = new ajxobj ('/mcchstcbt/admin/addRemoveDepartments');
    post.jxhr.done(function(res) {
      $('body').loadingModal('destroy');
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
});
// new deptartment submit
$(document).on('click', '#addNewDeptSubmit', function(e) {
  e.preventDefault();
  formSubmit('newDepartmentForm', '#adminPage');
});
// edit department
$(document).on('click', '#editDeptBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/editDepartment/' + $(this).val());
    post.jxhr.done(function(res) {
      $('#departmentsTableBody').html(res);
    });
});
// edit department save update
$(document).on('click', '#editDeptBtnSaveUpadate', function(e) {
  e.preventDefault();
  formSubmit('editDepartmentForm', '#adminPage');
});
// delete department
$(document).on('click', '#delDeptBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/deleteDepartment/' + $(this).val());
    post.jxhr.done(function(res) {
      $('#adminPage').html(res);
    });
});
// add remove courses
$(document).on('click', '#addRemoveCourses', function() {
  var post = new ajxobj ('/mcchstcbt/admin/addRemoveCourses');
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
});
// new course submit
$(document).on('click', '#addCourseSubmit', function(e) {
  e.preventDefault();
  formSubmit('newCourseForm', '#adminPage');
});
// delete courses
$(document).on('click', '#delCourseBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/deleteCourse/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#adminPage').html(res);
    });
});
// select Dept changed
$(document).on('change', '#SelectDept', function () {
  var post = new ajxobj ('/mcchstcbt/admin/getDeptCourses/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#departmentCoursesTable').html(res);
    });
});
// add Dept Course Submit
$(document).on('click', '#addDeptCourseSubmit', function (e) {
  e.preventDefault();
  formSubmit('newDeptCourseForm', '#departmentCoursesTable');
});
// delete Dept Course
$(document).on('click', '#delDeptCourseBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/deleteDeptCourses/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#departmentCoursesTable').html(res);
    });
});
// ----------------------------------------------------------------------------

// add section questions tab
$(document).on('click', '#addSectionQuestionsTab', function(){
  var post = new ajxobj ('/mcchstcbt/admin/addSectionQuestionsTab');
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
      summernotInit('#secQstSummrNt', 'Type or copy and paste section question here...');
    });
});
// add new section submit
$(document).on('click', '#addNewSectionSubmit', function(e) {
  e.preventDefault();
  formSubmit('addNewSectionForm', '#adminPage')
});
// delete section
$(document).on('click', '#delSectionBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/delSectionBtn/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
      summernotInit('#secQstSummrNt', 'Type or copy and paste section question here...');
    });
});
// add section question select section change
$(document).on('change', '#selSecQuesSectionsid', function() {
  var post = new ajxobj ('/mcchstcbt/admin/getSectionQuestionsTable/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#sectionQuestionsTable').html(res);
      summernotInit('#secQstSummrNt', 'Type or copy and paste section question here...');
    });
});
// add New Section Ques Submit
$(document).on('click', '#addNewSectionQuesSubmit', function(e) {
  e.preventDefault();
  formSubmit('addNewSectionQuesForm', '#sectionQuestionsTable');
});
// delete section questions
$(document).on('click', '#delSecQuesBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/delSecQuesBtn/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#adminPage').html(res);
      summernotInit('#secQstSummrNt', 'Type or copy and paste section question here...');
    });
})
// add Questions tab
$(document).on('click', '#addQuestionsTab', function() {
  var post = new ajxobj ('/mcchstcbt/admin/addQuestionsTab');
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
      summernotInit('#qstSummerNote', 'Type or copy and paste question...');
      summernotInit('#optionASummerNote', 'Option A');
      summernotInit('#optionBSummerNote', 'Option B');
      summernotInit('#optionCSummerNote', 'Option C');
      summernotInit('#optionDSummerNote', 'Option D');
      summernotInit('#textQstHolder', 'Questions holder...');
    });
});
// select question course
$(document).on('change', '#SelectQuesCourse', function() {
  var post = new ajxobj ('/mcchstcbt/admin/getQuestionsTable/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#questionsTableDiv').html(res);
    });
});
// section select change
$(document).on('change', '#quesSectionsid', function() {
  loadingMd();
  var post = new ajxobj ('/mcchstcbt/admin/getQuestionsTable/' +$('#SelectQuesCourse').val()+'/'
  +$(this).val());
    post.jxhr.done(function(res) {
      $('#questionsTableDiv').html(res);
      $('body').loadingModal('destroy');
    });
});
// duplicate  

// select question course
$(document).on('change', '#frmSelectQuesCourse', function() {
  var post = new ajxobj ('/mcchstcbt/admin/getQuestionsTable/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#questionsTableDiv').html(res);
    });
});
// section select change
$(document).on('change', '#frmquesSectionsid', function() {
  loadingMd();
  var post = new ajxobj ('/mcchstcbt/admin/getQuestionsTable/' +$('#frmSelectQuesCourse').val()+'/'
  +$(this).val());
    post.jxhr.done(function(res) {
      $('#questionsTableDiv').html(res);
      $('body').loadingModal('destroy');
    });
});
// upload questions
$(document).on('click', '#uploadQuestionsBtn', function(e) {
  e.preventDefault();
  formSubmit('uploadQuestionsFrm', '#questionsTableDiv');
});
// add question Submit
$(document).on('click', '#addQuestionSubmit', function(e) {
  e.preventDefault();
  formSubmit('addNewQuestionForm', '#questionsTableDiv');
    $('#qstSummerNote').summernote('reset');
    $('#optionASummerNote').summernote('reset');
    $('#optionBSummerNote').summernote('reset');
    $('#optionCSummerNote').summernote('reset');
    $('#optionDSummerNote').summernote('reset');
});
// delete question
$(document).on('click', '#delQuestBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/delQuestBtn/' +$(this).val() +'/'
  +$('#SelectQuesCourse').val() +'/' +$('#quesSectionsid').val());
    post.jxhr.done(function(res) {
      $('#questionsTableDiv').html(res);
    });
});
// add remove students tab
$(document).on('click', '#addRemoveStuTab', function () {
  var post = new ajxobj ('/mcchstcbt/admin/addRemoveStudentsTab');
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
});
// delete students
$(document).on('click', '#delStudentBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/deleteSTudent/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
});
// recomendation save
$(document).on('change', '#recomendationText', function() {
  var post = new ajxobj ('/mcchstcbt/admin/recomendationSaveTxt', 'POST', 'TEXT', 
  {'recTxt':$(this).val(), 'stuId': $('#delStudentBtn').val()});
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
});
// add new students submit file
$(document).on('click', '#addStudentsSubmit', function(e) {
  e.preventDefault();
  formSubmit('addNewStudentsForm', '#adminPage');
});
// FILTER students by entry
$(document).on('change', '#filterByEntry', function() {
  loadingMd();
  var post = new ajxobj ('/mcchstcbt/admin/addRemoveStudentsTab/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
      $('body').loadingModal('destroy');
    });
});
// search by application number 
$(document).on('change', '#searchByAppNo', function() {
  var post = new ajxobj ('/mcchstcbt/admin/addRemoveStudentsTab/' +$(this).val());
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
})
// print students passwords tab
$(document).on('click', '#printStuPasswordsTab', function() {
  var post = new ajxobj ('/mcchstcbt/admin/printStuPasswordsTab');
    post.jxhr.done(function(res) {
      $('#dashNavbar').remove();
      $('#adminPage').html(res);
    });
});
// print students passwords btn
$(document).on('click', '#printStuPasswordsBtn', function() {
  var instructionText = $('#instrText').val();
  var post = new ajxobj ('/mcchstcbt/admin/printStuPasswordsBtn', 'POST', 'HTML', {'InstructionTxt':instructionText});
    post.jxhr.done(function(res) {
      var w = window.open("", "Passwords", "scrollbars=yes,width=900,height=600");
      w.document.write(res);
      w.document.close().delay(2000);
      setTimeout(function() {
        w.document.close();
        w.print();
      }, 2000);
      // setTimeout(function() {
      //   w.print();
      // }, 1000);
    });
});
// view print result
$(document).on('click', '#viewPrintResultTab', function() {
  loadingMd();
  var post = new ajxobj ('/mcchstcbt/admin/printStuScoreTab');
  post.jxhr.done(function(res) {
    $('body').loadingModal('destroy');
    $('#dashNavbar').remove();
    $('#adminPage').html(res);
  });
});
// print score btn
$(document).on('click', '#printScoreBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/printStuScoreTab/Print');
  post.jxhr.done(function(res) {
    var w = window.open("", "Passwords", "scrollbars=yes,width=900,height=600");
    w.document.write(res);
    
    setTimeout(function() {
      w.document.close();
      w.print();
    }, 2000);
  });
}); 
// delete score btn
$(document).on('click', '#delStudentScoreBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/delStudentScoreBtn/' + $(this).val());
  post.jxhr.done(function(res) {
    $('body').loadingModal('destroy');
    $('#dashNavbar').remove();
    $('#adminPage').html(res);
  });
});
// --------------------------------students------------------------------------------
// get questions btns
function getQuestionsBtns(){
  var post = new ajxobj ('/mcchstcbt/students/getAttemptedQuestions');
  post.jxhr.done(function(res) {
    var rslt = JSON.parse(res);
    
    for (let index = 0; index < numberOfQuestions; index++) {
      $('#questionsBtns').append(`
      <button class="btn btn-info btn-sm ml-0 p-0 px-1 questNumbsBtns" id="qstbtnid${questionsArray[index].id}" value="${index}">${index+1}</button>`);
    }

    for(var indx = 0; indx < rslt.length; indx++) {
      var qstBtnId = '#qstbtnid' +rslt[indx]['ex_questions_id'];
      $(qstBtnId).removeClass('btn-info');
      $(qstBtnId).addClass('btn-success');
    }

  });
}
function decodeHtml(html) {
	var txt = document.createElement('textarea');
  txt.innerHTML = html;
  return txt.value;
};
// load questions 
function insertQuestions(no) {
  var qst = Number(no)+1;
  $('#examAreaCont').html(`
    <div class="row px-3">
      <hr>
      <div class="col-12 bg-primary font20 shadow-lg text-justify text-white text-center">
        <h5>${decodeHtml(questionsArray[no].ex_section_question)}</h3>
      </div>
      <hr>
      <div class="col-12" style="padding: 0px;">
        <h4 class="text-center text-primary shadow justify-content-center d-flex">${qst}:  ${decodeHtml(questionsArray[no].ex_question)}</h4>
      </div>
        <div class="col-12">
          <div class="form-group">
            <input type="checkbox" class="optionAAnswer" id="option_a" value="A">
            <label for="option_a" class="d-flex shadow-lg text-primary"><div class="pr-1 d-block">A:</div> ${decodeHtml(questionsArray[no].option_a)}</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="checkbox" class="optionAAnswer" id="option_b" value="B">
            <label for="option_b" class="d-flex shadow-lg text-primary"><div class="pr-1 d-block">B:</div> ${decodeHtml(questionsArray[no].option_b)}</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="checkbox" class="optionAAnswer" id="option_c" value="C">
            <label for="option_c" class="d-flex shadow-lg text-primary"><div class="pr-1 d-block">C:</div> ${decodeHtml(questionsArray[no].option_c)}</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <input type="checkbox" class="optionAAnswer" id="option_d" value="D">
            <label for="option_d" class="d-flex shadow-lg text-primary"><div class="pr-1 d-block">D:</div> ${decodeHtml(questionsArray[no].option_d)}</label>
          </div>
        </div>         
    </div>
    <div class="col-md-12" style="padding: 0px;">
      <div class="row">
          <div class="col-md-6">
              <button class="btn btn-primary btn-block font20" id="prevQuestionBtn" value="${questionsArray[no].id}">
                <span class="fa fa-chevron-left"></span> Prev Question
              </button>
          </div> 
          <div class="col-md-6" id="prevNexBtns">
              <button class="btn btn-primary btn-block font20" id="nextQuestionBtn" value="${questionsArray[no].id}">
                Next Question <span class="fa fa-chevron-right"></span>
              </button>
          </div> 
      </div>
    </div>
    `);
}
// finished exam function
function finishExam() {
  var post = new ajxobj ('/mcchstcbt/students/finishedExam');
    post.jxhr.done(function(res) {
      // $('#dashNavbar').remove();
      $('#content').html(res);
    });
};
// get timerTime
function getTimerHrs(){
  return hrs;
};
function getTimerMin() {
  return min;
};
// set timer time
function setTimerTime(sHrs, sMin, sSec){
  hrs = Number(sHrs); min = Number(sMin); sec = Number(sSec);
 // console.log(sHrs+ sMin + 'time settings');
};
// Exam Timer
function examinationTimer(stuAdmsNo, examHrs, examMin) {
  // if (Number(Cookies.get(stuAdmsNo+'tsec')) === 60) {
  //   tpmin = Number(Cookies.get(stuAdmsNo+'tmin'));
  //   Cookies.set(stuAdmsNo+'tmin', tpmin+1);
    
  //   Cookies.set(stuAdmsNo+'tsec', 0);
  // }else if(Number(Cookies.get(stuAdmsNo+'tmin')) === 60) {
  //   tphrs = Number(Cookies.get(stuAdmsNo+'thrs'));
  //   Cookies.set(stuAdmsNo+'thrs', tphrs+1);
  //   min = 0; Cookies.set(stuAdmsNo+'tmin', 0);
  // }else if(Number(Cookies.get(stuAdmsNo+'thrs')) >= Number(examHrs) & Number(Cookies.get(stuAdmsNo+'thrs')) >= Number(examMin)){
  //   clearInterval(timerIntervalSet);
  //   finishExam();
  // } else {
  //   $('#timeArea').html(`<h3 class="p-0 m-0 text-center">${Cookies.get(stuAdmsNo+'thrs')} : ${Cookies.get(stuAdmsNo+'tmin')} : ${Cookies.get(stuAdmsNo+'tsec')}</h3>`);
  //   tpsec = Number(Cookies.get(stuAdmsNo+'tsec'));
  //   Cookies.set(stuAdmsNo+'tsec', tpsec+1);
  // }

  if (sec >= 60) {
    min = min +1;
    sec = 0;
  }else if(min >= 60) {
    hrs = hrs +1;
    min = 0;
  }else if(hrs >= Number(examHrs) & min >= Number(examMin)){
    clearInterval(timerIntervalSet);
    finishExam();
  } else {
    // $('#timeArea').html(`<h3 class="p-0 m-0 text-center">${hrs} : ${min} : ${sec}</h3>`);
    $('#timeHour').text(hrs);
    $('#timeMin').text(min);
    $('#timeSec').text(sec);
    sec++;
  }

}
// start exam btn
$(document).on('click', '#StartExam', function() {
  var post = new ajxobj ('/mcchstcbt/students/startExam', 'GET', 'JSON');
    post.jxhr.done(function(res) {
    
      for (let index = 0; index < res.length; index++) {
        for (let ind = 0; ind < res[index].length; ind++){
          var crnt = res[index][ind];
          questionsArray.push(crnt);
          // questionsArray[ind] = crnt;
        }
      } 
      // var exam_hours = 1;
      // var exam_min = 0;
      // var stuAdmsNo = $('#stuAdmsNo').text();
     

      // if(Number(Cookies.get(stuAdmsNo+'tsec'))){
        
      // }else{
      //   Cookies.set(stuAdmsNo+'tsec', 0);
      //   Cookies.set(stuAdmsNo+'tmin', 0);
      //   Cookies.set(stuAdmsNo+'thrs', 0);
      // }
      numberOfQuestions = questionsArray.length;  
      insertQuestions(currentQuestion);
      getQuestionsBtns();
      var getDurPost = new ajxobj ('/mcchstcbt/students/getExamDurationAndTime', 'GET', 'JSON');
      setTimeout(function() {
        getDurPost.jxhr.done(function(res) {
          var stuHrs = res.stuTime.ex_stu_hours;
          var stuMin = res.stuTime.ex_stu_minutes;
          var stuSec = res.stuTime.ex_stu_seconds;

          var examHrs = res.examDuration.ex_hours;
          var examMin = res.examDuration.ex_minutes;

          var stuAdmsNo = $('#stuAdmsNo').text();
          setTimerTime(stuHrs, stuMin, stuSec);
          timerIntervalSet = setInterval(function () {
            examinationTimer(stuAdmsNo, examHrs, examMin);
          },1000);
        });
      }, 1000)
      
    })
});
// guess questions Btn
$(document).on('click', '.optionAAnswer', function () {
  $(".optionAAnswer").prop('checked',false);
  $(this).prop('checked',true);
  questionId = $('#nextQuestionBtn').val();
  selectedOption = $(this).val();
  var qstBtnId = '#qstbtnid' +questionId;
  // var stuAdmsNo = $('#stuAdmsNo').text();
  // let data = {'qstChooseId': questionId, 'optChoose': selectedOption};
  var post = new ajxobj ('/mcchstcbt/students/attemptSbumit/' +questionId +'/' +selectedOption);
  post.jxhr.done(function(res) {
    $(qstBtnId).removeClass('btn-info');
    $(qstBtnId).addClass('btn-success');
  });
});
// next Question Btn
$(document).on('click', '#nextQuestionBtn', function () {
  if (currentQuestion === numberOfQuestions -1) {
    $('#prevNexBtns').html(`
      <button class="btn btn-success btn-block font20" id="finishAndSubmitBtn">
        Finish and submit
      </button>
    `);
  } else {
    currentQuestion++;
    insertQuestions(currentQuestion);
    var crhr = $('#timeHour').text(), crmin = $('#timeMin').text(), crsec = $('#timeSec').text();
    var post = new ajxobj ('/mcchstcbt/students/updateStuTime/' +crhr +'/' +crmin +'/' +crsec);
    post.jxhr.done(function(res) {
    });
  }
});
// prev Question Btn
$(document).on('click', '#prevQuestionBtn', function () {
  if (currentQuestion === 0) {
    insertQuestions(0);
  } else if (currentQuestion > 0) {
    currentQuestion--;
    insertQuestions(currentQuestion);
  }
});
// question numbers btn click
$(document).on('click', '.questNumbsBtns', function() {
  insertQuestions($(this).val());
  // console.log(isNaN($(this).val()))
});
// finish and submit 
$(document).on('click', '#finishAndSubmitBtn', function() {
  finishExam();
  var stuAdmsNo = $('#stuAdmsNo').text();
  Cookies.remove(stuAdmsNo+'tsec');
  Cookies.remove(stuAdmsNo+'tmin');
  Cookies.remove(stuAdmsNo+'thrs');
});
// start stop exam
$(document).on('click', '#startStopExam', function() {
  var post = new ajxobj ('/mcchstcbt/admin/startStopExam');
  post.jxhr.done(function(res) {
    $('#dashNavbar').remove();
    $('#adminPage').html(res);
  });
});
// start Exam
$(document).on('click', '#startExamBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/startExamBtn');
  post.jxhr.done(function(res) {
    $('#dashNavbar').remove();
    $('#adminPage').html(res);
  });
});
// stop exam
$(document).on('click', '#StopExamBtn', function() {
  var post = new ajxobj ('/mcchstcbt/admin/stopExamBtn');
  post.jxhr.done(function(res) {
    $('#dashNavbar').remove();
    $('#adminPage').html(res);
  });
});
// set exam duration
$(document).on('click', '#setExamDurationBtn', function(e) {
  e.preventDefault();
  formSubmit('setExamDurationFrm', '#adminPage');
});
// recomendation
$(document).on('click', '#recomandationTab', function() {
  var post = new ajxobj ('/mcchstcbt/admin/recomandationTab');
  post.jxhr.done(function(res) {
    $('#dashNavbar').remove();
    $('#adminPage').html(res);
  });
});