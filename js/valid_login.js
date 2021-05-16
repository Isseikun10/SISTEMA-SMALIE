
$(document).ready(function() {

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[A-Z0-9]+$/i.test(value);
    }, 
    "Este campo sólo admite letras y numeros");

    $("#valid_login").validate( {
	    rules: {
	      num_control: {
	        required: true,
	        digits: true
	      },
	      rfc: {
	        required: true,
	        lettersonly: true,        
	      },
	    },
	    messages: {
	     	num_control: {
	        required: "Ingrese numero de control",
	        digits:  "Este campo sólo admite numeros",
	      
	      },
	      rfc: {
	        required: "Ingrese RFC",
	      }
	    },
	    submitHandler: submitForm 
    }); 

  
    function submitForm() {   
	    var data = $("#valid_login").serialize();
	    $.ajax({        
	        type : 'POST',
	        url  : 'conect/login.php',
	        data : data,
	        beforeSend: function(){	
				$("#error").fadeOut();
			},
	     
            success: function (response) {    
                
		        if($.trim(response) == "success_admin") { 
		          $("#login-submit").html('Ingresando...');
		          setTimeout(' window.location.href = "home.php"; ',1500);
		        }

		        else if($.trim(response) == "success_user") {          
		          $("#login-submit").html('Ingresando...');
		          setTimeout(' window.location.href = "encuesta.php"; ',1500);
		        }

		         else if($.trim(response) == "periodo_invalido") {               
		              $("#login-submit").html('Ingresando...');
		              setTimeout(' window.location.href = "periodo_invalido.php"; ',1500);
		         }

		        else  {                  
		             $("#error").fadeIn(1000, function(){$("#error").html(response).show();});
		        }
	        }
	    });
	    return false;
    } 
});


