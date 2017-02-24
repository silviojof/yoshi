$(function(){



  //Start of Jquery
  $('.del-btn').click(function(){
    $('.update-div').css('display', 'flex');
    let item = $(this).parents('tr');
    let id = item.children().eq(0).text();
    let title = item.children().eq(1).text();
    let author = item.children().eq(2).text();
    let date = item.children().eq(3).text();
    let description = item.children().eq(4).text();
    $('#up-blog-title').val(title);
    $('#up-blog-author').val(author);
    $('#up-blog-desc').val(description);
    $('#up-blog-id').val(id);
  });

  $('#up-blog-submit').click(function(){
    $('.update-div').css('display', 'none');
  });

  $('#up-blog-title').focus(function(){
    $('.form-warning').text("Title should be no longer than 30 characters");
  });
  $('#up-blog-title').blur(function(){
    $('.form-warning').text("");
  });

  $('#up-blog-author').focus(function(){
    $('.form-warning').text("Author should be no longer than 30 characters");
  });
  $('#up-blog-author').blur(function(){
    $('.form-warning').text("");
  });
  $('#up-blog-desc').focus(function(){
    $('.form-warning').text("Post should be no longer than 140 characters");
  });
  $('#up-blog-desc').blur(function(){
    $('.form-warning').text("");
  });

  $('#up-blog-id').click(function(){
    $('.form-warning').text("It is not possible to change the ID");
  });





  $('#blog-title').focus(function(){
    $('.form-warning').text("Title should be no longer than 30 characters");
  });
  $('#blog-title').blur(function(){
    $('.form-warning').text("");
  });

  $('#blog-author').focus(function(){
    $('.form-warning').text("Author should be no longer than 30 characters");
  });
  $('#blog-author').blur(function(){
    $('.form-warning').text("");
  });

  $('#blog-alt').focus(function(){
    $('.form-warning').text("Describe the image in less than 100 characters");
  });
  $('#blog-alt').blur(function(){
    $('.form-warning').text("");
  });

  $('#blog-desc').focus(function(){
    $('.form-warning').text("Post should be no longer than 140 characters");
  });
  $('#blog-desc').blur(function(){
    $('.form-warning').text("");
  });

  $('.fa-close').click(function(){
    $(this).parents('div').css('display', 'none');
  });

  $('.upload-blog').click(function(){
    $('.upload-div').css('display', 'flex');
  });

  // end of jquery
});
