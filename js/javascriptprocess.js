
//this script for password view
$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));

  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});



//this script for getting data from tblcategory and tblservices using ajax goto file processofhomepage.php
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';

   if(action == "category"){
    result = 'service';
   }
   $.ajax({
    url:"control/processofhomepage.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});


//this script for for blocking the previous date in selecting date
$(function(){
		$("#select_date").datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
			todayHighlight: true,
			showOtherMonths: true,
			selectOtherMonths: true,
			selectOtherYears: true,
			showOtherYears: true,
			autoclose: true,
			changeMonth: true,
			minDate: new Date()

		});
	});


//this script for Slide show image in reservation
$("#slideshow > div:gt(0)").hide();
setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(2000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  3000);


//this script for file image view in myprofile.php - avatar icon
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e){
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
    });
});