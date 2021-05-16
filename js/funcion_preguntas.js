
/*Funcion, manda llamar formulario Editar pregunta*/ 

$('#edit_p').click(function(){
  $edit_pre = $('#num_p').val()
  $('#show_bottom').show();
  $('#show_bottom').click(function(){
    $(this).hide();
    $('#edit_form').empty();
    $('#form_Enunciado').show();        
  });       
  $('#form_Enunciado').hide();
  $('#edit_form').load('procesos/editar_pregunta.php?edit_pre=' + $edit_pre);
});


/*---funcion, manda llamar el formulario agregar nueva pregunta---*/

$('#agregar_p').click(function(){
  $(this).hide();
  $('#show_bottom').show();
  $('#form_Enunciado').slideUp();
  $('#nueva_p').slideDown();
  $('#show_bottom').click(function(){
    $(this).hide();
    $('#agregar_p').show();
    $('#form_Enunciado').slideDown();
    $('#nueva_p').slideUp();
  });
});


/*----------- Funcion actualizar pregunta-----------------------*/
$(document).ready(function(){
$("#form_actualizar").validate({
  rules: {
    Num_Pregunta: {
      required: true,
      digits: true          
    },
    Enunciado: {
      required: true,               
    },
    list: {
      required: true               
    },
  },
  messages: {
    Num_Pregunta:{
      required: "Ingrese numero de pregunta ", 
      digits: "Este campo solo acepta numeros" 
    },
    Enunciado: {
      required: "Ingrese enunciado",
    },
    list:{
      required: "Seleccione tipo de pregunta",  
    }
  },
  submitHandler: submitForm 

})

function submitForm() {   
  var data = $("#form_actualizar").serialize();
  swal({
    title: "",
    text: "¿Guardar pregunta?",
    icon: "img/question.png",
    buttons: ['No', "Si"],      
  })
  .then((willDelete) => { 
    if (willDelete) {
      $.ajax({        
        type : 'POST',
        url  : 'procesos/funciones_query.php?funcion=actualizar',
        data : data,                    
        success : function(response){     
          if($.trim(response) == "actualizada"){              
            swal({
              title: "",
              text: "Se actualizo correctamente",
              icon: "success",
              buttons: [,"Aceptar"],          
            })
            .then((eceptar) => {
              if (eceptar) {
                window.location  = 'Preguntas.php';
              }
              else {
                return false;
              }
            });
          }
          else {
            swal({
              title: "Error al actualizar pregunta",
              text: "Verifique que los datos ingresados sean correctos",
              icon: "error",
              button: "Aceptar",
              dangerMode: true,
            });                  
          }
        }
      });
    }
    else{
      return false;
    }
  });
  return false;
} 
});

/*----------- Funcion agregar nueva pregunta-----------------------*/
$(document).ready(function(){
$("#form_guardar").validate({
  rules: {
    Num_Pregunta: {
      required: true,
      digits: true          
    },
    Enunciado: {
      required: true,               
    },
    list: {
      required: true               
    },
  },
  messages: {
    Num_Pregunta:{
      required: "Ingrese numero de pregunta ", 
      digits: "Este campo solo acepta numeros" 
    },
    Enunciado: {
      required: "Ingrese enunciado",
    },
    list:{
      required: "Seleccione tipo de pregunta",  
    }
  },
  submitHandler: submitForm 
}); 

function submitForm() {   
  var data = $("#form_guardar").serialize();
  swal({
    title: "",
    text: "¿Guardar pregunta?",
    icon: "img/question.png",
    buttons: ['No', "Si"],      
  })
  .then((willDelete) => { 
    if (willDelete) {
      $.ajax({        
        type : 'POST',
        url  : 'procesos/funciones_query.php?funcion=agregar',
        data : data,                    
        success : function(response){     
          if($.trim(response) == "existente"){ 
            swal({
              title: "Ya existe numero de pregunta",
              text: "Ingrese otro numero",
              icon: "error",
              button: "Aceptar",
              dangerMode: true,
            });
          }
          else if($.trim(response) == "guardada"){ 
            swal({
              title: "",
              text: "Se guardo correctamente",
              icon: "success",
              buttons: [,"Aceptar"],          
            })
            .then((eceptar) => {
              if (eceptar) {
                window.location  = 'Preguntas.php';
              }
              else {
                return false;
              }
            });
          }
          else {
            swal({
              title: "Error al agregar pregunta",
              text: "Verifique que los datos ingresados sean correctos",
              icon: "error",
              button: "Aceptar",
              dangerMode: true,
            });                  
          }
        }
      });
    }
    else{
      return false;
    }
  });
  return false;
} 
});

/*----------- Funcion eliminar pregunta-----------------------*/

$('#eliminar_p').click(function(){
  swal({
    title: "",
    text: "¿Eliminar Pregunta?",
    icon: "img/question.png",
    buttons: ['No', "Si"],      
  })
  .then((willDelete) => {
    if (willDelete) {
      var eliminar_preg = $('#num_p').val() 
      if (eliminar_preg > 0 ){
        $.ajax({
          type: 'POST',
          url: 'procesos/funciones_query.php?funcion=eliminar',
          data: {'eliminar_preg': eliminar_preg},

          success : function(response){     
            if($.trim(response) == "eliminada"){ 
              swal({
                title: "",
                text: "Pregunta Eliminada Correctamente",
                icon: "success",
                buttons: [,"Aceptar"],          
              })
              .then((eceptar) => {
                if (eceptar) {
                  window.location  = 'Preguntas.php';
                }
                else {
                  return false;
                }
              });
            }
            else {                  
              swal({
                title: "",
                text: "Error al eliminar pregunta",
                icon: "error",
                button: "Aceptar",
                dangerMode: true,
              });
            }
          }    
        })         
      }
      else  {  
        swal({
          title: "",
          text: "Pregunta Invalida",
          icon: "error",
          button: "Aceptar",
          dangerMode: true,
        });       
      }
    }
    else {
      return false;
    }
  }); 
});
