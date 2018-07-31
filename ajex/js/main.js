$(document).ready(function(){ 
   $('#username').blur(function(){
    var username = $(this).val();
    $.ajax({
    	url:"check/checkuser.php",
    	method:"POST",
    	data:{username:username},
    	dataType:"text",
    	success:function(data){
    		$('#userstatus').html(data);

    	}
    });

   });
   
    $("#liveserch").keyup(function(){

        var live = $(this).val();
        if (live != '') {
              $.ajax({
        url:"check/liveserch.php",
        method:"POST",
        data:{search:live},
        dataType:"text",
        success:function(data){
            $('#userstatus').html(data);

        }
    });
        }else{
            $('#userstatus').html("");
        }




    });



 });  