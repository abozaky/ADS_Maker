// function to to send data to page re.php to validate data by ajax 
// $(document).ready(function(){
//   $(".inajx").keyup(function(){
//     var username = $('.inajx').val();
//     $.post("re.php",
//     {
//       name: username,
      
//     },
//     function(data,status){
//       $(".ajx").text(data);
//     });
//   });
// });


$(document).ready(function(){
  // function to hide form at category page by fadeToggle
  $(document).on('click', '.btn-category', function(){
    $('#from').fadeToggle();
  })
});