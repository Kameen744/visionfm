$.ajaxSetup({
  beforeSend:function(){
      // show gif here, eg:
      // $("#loading").show();
  },
  complete:function(){
      // hide gif here, eg:
      // $("#loading").hide();
  }
});
// $.ajax({
//    global: false,
// });
$(document).ready(function() {
    var alterClass = function() {
      var ww = document.body.clientWidth;
      if (ww < 450) {
        $('#stickytop').removeClass('sticky-top');
      } else if (ww >= 451) {
        $('#stickytop').addClass('sticky-top');
      };
    };
    $(window).resize(function(){
      alterClass();
    });
    alterClass();
});

$('.social-link').mouseover(function (){
  $(this).children('.text-dark').removeClass('text-dark');
  $(this).children('.text-dark').addClass('text-danger');
});
// ajax call obj
function ajxobj (url, method, dataType, data) {
    this.jxhr = $.ajax({
      url: url,
      method: method,
      dataType: dataType,
      data: data
    });
}
function checkEmpty(elm) {
  var val = $(elm).val();
  if (val == null || val == ""){
      return false;
  }else {
    return true;
  }
}
  // form submit
function AJAXSubmit (formid, elm) {
    var form = document.getElementById(formid);
    if (!form.action) { alert('returned'); return;}
    var oReq = new XMLHttpRequest();
    if (form.method.toLowerCase() === "post") {
      oReq.open("post", form.action);
      oReq.send(new FormData(form));
    } else { }
    oReq.onload = function () {
      var res = this.responseText;
      if(res !='Image size is too big' & res != 'Image is too small' & res != 'Invalid image type'){
        $('#ReporterMainPage').html(res);
      }else{
        $(elm).html(res);
      }
    }
}
function formSubmit (formid, elm) {
  // loadingMd();
  var form = document.getElementById(formid);
  if (!form.action) { console.log('no form action'); return;}
  var oReq = new XMLHttpRequest();
  if (form.method.toLowerCase() === "post") {
    oReq.open("post", form.action);
    oReq.send(new FormData(form));
  } else {console.log('wrong form method')}
  oReq.onload = function () {
    // $('body').loadingModal('destroy');
    $(elm).html(this.responseText);
  }
}
// admin right links click
$(document).on('click', '.admnrightlink', function() {
  var post = new ajxobj ('' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
      $('#AdminMainPage').html(res);
    });
});
// add new station
$(document).on('click', '#AddStationsSubmit', function(e) {
  e.preventDefault();
  formSubmit('addNewStationFrm', '#AdminMainPage');
})
// add new user
$(document).on('click', '#AddUserSubmit', function (e) {
  e.preventDefault();
  var AddUserName = $('#AddUserName').val();
  var AddUserPassword = $('#AddUserPassword').val();
  var post = new ajxobj ('create_new_user','POST', 'HTML',
  {'AddUserName' : AddUserName, 'AddUserPassword' : AddUserPassword});
    post.jxhr.done(function (res) {
      $('#AddUserSuccess').html(res);
    });
});
// delete user
$(document).on('click', '#delUser', function () {
  var post = new ajxobj ('delete_user/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
        $('#AdminMainPage').html(res);
    });
});
// manage categories post type select
$(document).on('change', '#catType', function () {
  var post = new ajxobj ('manage_categories/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
        $('#catTable').html(res);
    });
});
// manage categories add new category
$(document).on('click', '#catAdd', function () {
  var post = new ajxobj ('add_category', 'POST', 'HTML',
  {catType : $('#catType').val(), catText : $('#catText').val()});
    post.jxhr.done(function (res) {
        $('#catTable').html(res);
    });
});
// manage categories del category
$(document).on('click', '#delCategory', function () {
  var post = new ajxobj ('delete_category', 'POST', 'HTML',
  {delCatTypeId : $('#catType').val(), delCatId : $(this).val()});
    post.jxhr.done(function (res) {
        $('#catTable').html(res);
    });
});
// Reporter
// dash link click
$(document).on('click', '.userdashlink', function () {
  var post = new ajxobj ('/farinwatab/posts/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
      $('#ReporterMainPage').html(res);
    });
});
// view post table page no
$(document).on('click', '.postPage', function () {
  var post = new ajxobj ('/farinwatab/posts/view_posts/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
        $('#ReporterMainPage').html(res);
    });
});
// del posts
$(document).on('click', '.deletePost', function () {
  var post = new ajxobj ('/farinwatab/posts/delete_post/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
        $('#ReporterMainPage').html(res);
    });
});
// post type select
$(document).on('change', '#PostType', function () {
  var post = new ajxobj ('/farinwatab/posts/get_category/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
        $('#PostCategory').html(res);
    });
});
// new post
$(document).on('click', '#SubmitPost', function (e) {
    e.preventDefault();
    if(checkEmpty(PostTitle) &
    checkEmpty(PostType) &
    checkEmpty(PostCategory) &
    checkEmpty(PostContent) &
    checkEmpty(PostFile)) {
      AJAXSubmit('NewPostForm', '#AddPostSuccess');
    } else {
      $('#AddPostSuccess').html('All fields are required');
    }
});
// upload video
$(document).on('click', '#SubmitVideo', function (e) {
  e.preventDefault();
    if(checkEmpty(VideoTitle) &
    checkEmpty(VideoFile)) {
      AJAXSubmit('NewVideoForm', '#ReporterMainPage');
    } else {
      $('#AddPostSuccess').html('All fields are required');
    }
});
// delete video
$(document).on('click', '#deleteVid', function () {
  var post = new ajxobj ('/farinwatab/posts/delete_video/' + $(this).val(), 'POST', 'HTML');
    post.jxhr.done(function (res) {
        $('#ReporterMainPage').html(res);
    });
});
// more next/prev
$(document).on('click', '#newsNext', function () {
  var post = new ajxobj ('/farinwatab/posts/next_post/', 'POST', 'HTML',
  {newsNext : $(this).val(), newsPrevv : $('#newsPrev').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#news').html(res);}
    });
});

$(document).on('click', '#newsPrev', function () {
  var post = new ajxobj ('/farinwatab/posts/prev_post/', 'POST', 'HTML',
  {newsPrev : $(this).val(), newsNextt : $('#newsNext').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#news').html(res);}
    });
});

$(document).on('click', '#intNext', function () {
  var post = new ajxobj ('/farinwatab/posts/next_post/', 'POST', 'HTML',
  {intNext : $(this).val(), intPrevv : $('#intPrev').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#stickytop').html(res);}
    });
});

$(document).on('click', '#intPrev', function () {
  var post = new ajxobj ('/farinwatab/posts/prev_post/', 'POST', 'HTML',
  { intPrev : $(this).val(), intNextt : $('#intNext').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#stickytop').html(res);}
    });
});

$(document).on('click', '#polNext', function () {
  var post = new ajxobj ('/farinwatab/posts/next_post/', 'POST', 'HTML',
  {polNext : $(this).val(), polPrevv : $('#polPrev').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#polnws').html(res);}
    });
});

$(document).on('click', '#polPrev', function () {
  var post = new ajxobj ('/farinwatab/posts/prev_post/', 'POST', 'HTML',
  {polPrev : $(this).val(), polNextt : $('#polNext').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#polnws').html(res);}
    });
});

$(document).on('click', '#busNext', function () {
  var post = new ajxobj ('/farinwatab/posts/next_post/', 'POST', 'HTML',
  {busNext : $(this).val(), busPrevv : $('#busPrev').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#busnws').html(res);}
    });
});

$(document).on('click', '#busPrev', function () {
  var post = new ajxobj ('/farinwatab/posts/prev_post/', 'POST', 'HTML',
  {busPrev : $(this).val(), busNextt : $('#busNext').val()});
    post.jxhr.done(function (res) {
      if(res == null || res == ''){

      }else {$('#busnws').html(res);}
    });
});

// post comment
$(document).on('click', '#postComment', function (e) {
  e.preventDefault();
  formSubmit('commentsForm', '#comments');
});
