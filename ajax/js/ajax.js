$(document).ready(function(){
    $('#myForm').submit(function(){
        $.post("check/insert.php", $("#myForm").serialize(), function(data){
            $("#show").html(data);
        });

        return false;
       
    });
});
