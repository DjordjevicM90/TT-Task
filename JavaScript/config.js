$(function(){

    $("#btn-login").click(function(){                   /* LOGIN BUTTON */

        $.post("login.php?login", function(response){

            let answer = JSON.parse(response);

            if(answer.error != "")
            {
                $("#answer").html(answer.error);
            }
            else
			{
                window.location.assign(answer.data);
			}

        });

    });

    $("#btn-add").click(function(){                     /* ADD BUTTON */

        let symbolName = $("#btn-add").data("symbol");

        $.post("manageFavorites.php?add-symbolName", {symbolName:symbolName}, function(response){
            let obj = JSON.parse(response);

            if(obj.error !== "")
            {
                $("#answer-details").html(obj.error);
            }
            else
            {
                window.location.assign(obj.data); 
            }
        });
    })

    $("#btn-remove").click(function(){                  /* REMOVE BUTTON */

        let symbolName = $("#btn-remove").data("symbol");

        $.post("manageFavorites.php?remove-symbolName", {symbolName:symbolName}, function(response){
            let obj = JSON.parse(response);

            if(obj.error !== "")
            {
                $("#answer-details").html(obj.error);
            }
            else
            {
                window.location.assign(obj.data); 
            }
        });
    })

});