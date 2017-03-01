$(function(){



  //Start of Jquery

  // Open Updating Modal and filling the form
  $('.up-blog-btn').click(function(){
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

  // Turn display on submit to none when information has been submitted
  $('#up-blog-submit').click(function(){
    $('.update-div').css('display', 'none');
  });

  // Open Updating Modal and filling the form
  $('.up-test-btn').click(function(){
    $('.update-div').css('display', 'flex');
    let item = $(this).parents('tr');
    let id = item.children().eq(0).text();
    let name = item.children().eq(1).text();
    let area = item.children().eq(2).text();
    let testimonial = item.children().eq(3).text();
    $('#up-test-name').val(name);
    $('#up-test-area').val(area);
    $('#up-test-text').val(testimonial);
    $('#up-test-id').val(id);
  });

  // Turn display on submit to none when information has been submitted
  $('#up-blog-submit').click(function(){
    $('.update-div').css('display', 'none');
  });

  // Open Updating Modal and filling the form
  $('.up-gal-btn').click(function(){
    $('.update-div').css('display', 'flex');
    let item = $(this).parents('tr');
    let id = item.children().eq(0).text();
    let stylist = item.children().eq(1).text();
    $('#up-gallery-name').val(stylist);
    $('#up-test-id').val(id);
  });

  // Turn display on submit to none when information has been submitted
  $('#up-gallery-submit').click(function(){
    $('.update-div').css('display', 'none');
  });




  // Open Updating Modal and filling the form
  $('.up-users-btn').click(function(){
    $('.update-div').css('display', 'flex');
    let item = $(this).parents('tr');
    let id = item.children().eq(0).text();
    $('#up-users-id').val(id);
  });

  // Turn display on submit to none when information has been submitted
  $('#up-users-submit').click(function(){
    $('.update-div').css('display', 'none');
  });






  // Text length warning (focus and blur) for blog updating
  $('#up-blog-title').focus(function(){
    $('.form-warning').text("Title should be no longer than 30 characters");
  });
  $('#up-blog-title').blur(function(){
    $('.form-warning').text("");
  });

  // Author length warning (focus and blur) for blog updating
  $('#up-blog-author').focus(function(){
    $('.form-warning').text("Author should be no longer than 30 characters");
  });
  $('#up-blog-author').blur(function(){
    $('.form-warning').text("");
  });

  // Post length warning (focus and blur) for blog updating
  $('#up-blog-desc').focus(function(){
    $('.form-warning').text("Post should be no longer than 140 characters");
  });
  $('#up-blog-desc').blur(function(){
    $('.form-warning').text("");
  });




  // Text length warning (focus and blur) for gallery updating
  $('#up-gallery-name').focus(function(){
    $('.form-warning').text("Title should be no longer than 50 characters");
  });
  $('#up-gallery-name').blur(function(){
    $('.form-warning').text("");
  });

  // Text length warning (focus and blur) for gallery uploading
  $('#gallery-name').focus(function(){
    $('.form-warning').text("Title should be no longer than 50 characters");
  });
  $('#gallery-name').blur(function(){
    $('.form-warning').text("");
  });




  // Text length warning (focus and blur) for users updating
  $('#users-name').focus(function(){
    $('.form-warning').text("User should be no longer than 10 characters");
  });
  $('#users-name').blur(function(){
    $('.form-warning').text("");
  });

  // Text length warning (focus and blur) for users uploading
  $('#users-password').focus(function(){
    $('.form-warning').text("Password should be no longer than 06 characters");
  });
  $('#users-password').blur(function(){
    $('.form-warning').text("");
  });

  // Text length warning (focus and blur) for users updating
  $('#up-users-password').focus(function(){
    $('.form-warning').text("Password should be no longer than 06 characters");
  });
  $('#up-users-password').blur(function(){
    $('.form-warning').text("");
  });




  // Title length warning (focus and blur) for blog uploading
  $('#blog-title').focus(function(){
    $('.form-warning').text("Title should be no longer than 30 characters");
  });
  $('#blog-title').blur(function(){
    $('.form-warning').text("");
  });

  // Author length warning (focus and blur) for blog uploading
  $('#blog-author').focus(function(){
    $('.form-warning').text("Author should be no longer than 30 characters");
  });
  $('#blog-author').blur(function(){
    $('.form-warning').text("");
  });

  // Alt length warning (focus and blur) for blog uploading
  $('#blog-alt').focus(function(){
    $('.form-warning').text("Describe the image in less than 100 characters");
  });
  $('#blog-alt').blur(function(){
    $('.form-warning').text("");
  });

  // Post length warning (focus and blur) for blog uploading
  $('#blog-desc').focus(function(){
    $('.form-warning').text("Post should be no longer than 140 characters");
  });
  $('#blog-desc').blur(function(){
    $('.form-warning').text("");
  });







  // Closing Form Upload Divs
  $('.fa-close').click(function(){
    $(this).parents("[class*='upload-div']").css('display', 'none');
  });

  // Closing Form Update Divs
  $('.fa-close').click(function(){
    $(this).parents("[class*='update-div']").css('display', 'none');
  });

  // Open Uploading Form
  $('.upload-open').click(function(){
    $("[class*='upload-div']").css('display', 'flex');
  });

  // end of jquery
});
