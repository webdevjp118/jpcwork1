$(document).ready(function() {
    
});
$( function() {
    $( "#datepicker1,#datepicker2" ).datepicker( {
        dateFormat: 'yy年mm月dd日',
        monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"]
    });
});


function readURL(input, imgControlName) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // $(imgControlName).attr('src', e.target.result);
            $(imgControlName).css('background-image', 'url(' + e.target.result +')');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
  
$("#profile-fileinput").change(function() {
  // add your logic to decide which image control you'll use
  var imgControlName = "#photo-preview";
  readURL(this, imgControlName);
});
