$(document).ready(function(){
    
    $("#cliente").hide();
  
    $("#show").click(function(){
        $("#cliente").toggle();
        $("#ex-client").val('');
         $("#ex-client").toggle();
    });
});

$(document).ready(function(){
    $('#a1').keyup(calculate);
    $('#a2').keyup(calculate);
});

function calculate(e)
{
    $('#a3').val($('#a1').val() * $('#a2').val());
}





