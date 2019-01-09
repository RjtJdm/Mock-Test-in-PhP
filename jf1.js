var a=0;
var c=0;
var q=0;
var stop;
var f=100;
var tpq=30;
function getStart(){
	$.ajax({
		url:"getStart.php",
		success:function(resp){
			a=parseInt(resp);
                        getNoq();
		},
                error:function(){
 
                }
	});
}

function getNoq(){
        $.ajax({
               url:"getNoq.php",
               success:function(resp){
                        q=parseInt(resp);
                        f=a+q*tpq;
                        createButtons();
                        stop=setInterval(getCurrentTime,1000);
               },
               error:function(){
 
               }
        });
}

function getCurrentTime()
{       $.ajax({
               url:"getCurrentTime.php",
               success:function(resp){
                       c=parseInt(resp);
                       if(c<=f)
                       {      var d=f-c;
                              var h=parseInt(d/3600);
                              var m=parseInt((parseInt(d%3600))/60);
                              var s=parseInt(d%60);
                              var t=h+":"+m+":"+s;
                              if(m<=4)
                              {      $("#t").css("color","red"); 
                              }
                              $("#t").html(t);
                             
                       }
                       else
                       {      timeOut();
                       }
               },
               error:function()
               {        
               }
        });
}

function timeOut()
{       $("#t").html("TIME UP");
        window.location.href="Result.html";
        clearInterval(stop);
}

function createButtons()
{       var i=1;
        var out="<table><tr>";
        for(i=1;i<=q;i++)
        {      out+="<td><button onclick='getQues("+i+")' class='qb'>"+i+"</button></td>";
               if(i%5==0)
               {      out+="</tr><tr>";
               }
        }
        out+="</tr></table>";
        $("#pb").html(out);       
}
$(function(){
    getStart();
});