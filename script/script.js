$(function(){
    //console.log("jquery is ready");
    
    $("form").submit(function(event){
        event.preventDefault();
        if(fnameflag && lnameflag && unameflag && passflag){
            $(this).unbind('submit').submit();
        }
    });
    
    
    var fnameflag = false;
    var lnameflag = false;
    var unameflag = false;
    var passflag = false;
    $("input").on("keyup", function(){
        var currentInput = $(this);
        //console.log(currentInput.attr("name"));
        if(currentInput.attr("name") === "fname" && currentInput.val().length < 4){
            currentInput.css("background-color", "red");
            $("#fnameHelp").text("First name needs to be at leats 4 character long");
            fnameflag = false;
        }else if(currentInput.attr("name") === "fname" && currentInput.val().length >= 4){
            currentInput.css("background-color", "green");
            $("#fnameHelp").text("");
            fnameflag = true;
        }
        
        if(currentInput.attr("name") === "lname" && currentInput.val().length < 4){
            currentInput.css("background-color", "red");
            $("#fnameHelp").text("Last name needs to be at leats 4 character long");
            lnameflag = false;
        }else if(currentInput.attr("name") === "lname" && currentInput.val().length >= 4){
            currentInput.css("background-color", "green");
            $("#fnameHelp").text("");
            lnameflag = true;
        }
        
        if(currentInput.attr("name") === "uname" && currentInput.val().length < 4){
            currentInput.css("background-color", "red");
            $("#unameHelp").text("User name needs to be at leats 4 character long");
            unameflag = false;
        }else if(currentInput.attr("name") === "uname" && currentInput.val().length >= 4){
            currentInput.css("background-color", "green");
            $("#unameHelp").text("");
            unameflag = true;
        }
        
        if(currentInput.attr("name") === "pass1" && currentInput.val().length < 4){
            currentInput.css("background-color", "red");
            $("#p1Help").text("Password needs to be at leats 4 character long");
        }else if(currentInput.attr("name") === "pass1" && currentInput.val().length >= 4){
            currentInput.css("background-color", "green");
            $("#p1Help").text("");
        }
        
        if(currentInput.attr("name") === "pass2" && currentInput.val() !== $("#p1").val()){
            currentInput.css("background-color", "red");
            $("#p2Help").text("Confirmation needs to match with the above password");
            passflag = false;
        }else if(currentInput.attr("name") === "pass2" && currentInput.val() === $("#p1").val()){
            currentInput.css("background-color", "green");
            $("#p2Help").text("");
            passflag = true;
        }
    });
    
    
    
    
    
});//JQuery last line


