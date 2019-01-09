$(function(){
    $("#b1").click(function(){
        var v=$("#i1").val();
        if(v==""){
            $("#div").html("Plaese Enter No. Of Question");
        }
        else{
            $("#div").html("");
            $.ajax({
                url:"setNoq.php?v="+v,
                success:function(resp){
                    if(resp=="true"){
                        check(v);
                    
                    }
                    else{
              
                    }
                },
                error:function(){
              
                }
            }); 
            
        }
    });
    function check(v){
        v=parseInt(v);
        $.ajax({
            url:"checkNum.php",
            success:function(resp){
                if(v<=resp){
                    window.location.href="mt1.html";    
                }
                else{
                    $("#divi").html("Question Limit Exceeded.");
                }
            },
            error:function(){
              
            }
        });
    }
});