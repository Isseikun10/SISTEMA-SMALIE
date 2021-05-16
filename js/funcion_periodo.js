
/*----------- Funcion Filtro  Buascar-----------------------*/

$('#filtrar').keyup(function() {
  var value = $('#filtrar').val().toLowerCase();
  $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });   
});

/*---------- Filtrado select tipo de preguntas, en el archivo preguntas.php  --------------*/
$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'procesos/funciones-filtrados.php?funcion=Tip-preg'
  })
  .done(function(select_tipo){
    $('#list_TipPreg').html(select_tipo)
  });
});

$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'procesos/funciones-filtrados.php?funcion=Tip-preg'
  })
  .done(function(select_tipo){
    $('#list').html(select_tipo)
  });
});

/*------- Filtrado select preguntas, en el archivo preguntas.php Y Grafica_General-------*/ 
$('#list_TipPreg').on('change', function(){
  var id = $('#list_TipPreg').val()
  $.ajax({
    type: 'POST',
    url: 'procesos/funciones-filtrados.php?funcion=Enunciado',
    data: {'Id_Tipo': id}
  })
  .done(function(select_enunciado){
    $('#Lista_Enunciado').html(select_enunciado)
  })
  .fail(function(){
    alert('Error lista de enunciados, verifique conexion a BD');
  })
});


/*-------Muestra pregunta en formulario--------*/
$('#Lista_Enunciado').on('change', function(){
  var cod = $('#Lista_Enunciado').val() 
  
  var combo = document.getElementById("Lista_Enunciado");
  var selected = combo.options[combo.selectedIndex].text;
  
  var combo1 = document.getElementById("list_TipPreg");
  var selected1 = combo1.options[combo1.selectedIndex].text;
  
  document.formulario.num_p.value = cod;
  document.formulario.enunciado.value = selected; 
  document.formulario.tipo.value = selected1;
});


/*-------- Select muestra el periodo actual, en el achivo home.php--------*/
$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'procesos/funciones-filtrados.php?funcion=list_periodo'
  })
  .done(function(select_periodo){
    $('#list_periodo').html(select_periodo)

  })
  .fail(function(){
    alert('Error al mostrar la lista de periodos, verifique conexion a BD')
  })
});

/*-------- funcion actualiza el periodo actual --------*/

$('#Actualizar').click(function(){
  swal({
    title: "¿ACTUALIZAR PERIODO?",
    text: "Se actualizara el periodo, se volverá a cero los resultados de la encuesta realizada en el perido actual.",
    icon: "img/question.png",
    buttons: ['No', "Si"],
  })
  .then((willDelete) => {
    if (willDelete) {
      var periodo = $('#list_periodo').val()
      
      if (periodo == "" ) {
        swal({
          title: "Error",
          text: "Seleccione periodo valido",
          icon: "error",
          button: "Aceptar",
          dangerMode: true,
        });
      } 
      else {  
        $.ajax({
          type: 'POST',
          url: 'procesos/fun_fechas.php?funcion=act_periodo',
          data: {'periodo': periodo},
          success : function(response){     
            if($.trim(response) == "actualizado"){ 
              swal({
                title: "",
                text: "Periodo actualizado",
                icon: "success",
                buttons: [,"Aceptar"],          
              })
              .then((eceptar) => {
                if (eceptar) {
                  window.location  = 'home.php';
                }
                else {
                  return false;
                }
              });
            }
            else if ($.trim(response) == "error") {                  
              swal({
                title: "",
                text: "Seleccione un periodo diferente al actual",
                icon: "error",
                button: "Aceptar",
                dangerMode: true,
              });
            }
            else {
                swal({
                title: "",
                text: "Error al actualiar periodo",
                icon: "error",
                button: "Aceptar",
                dangerMode: true,
              });
            }
          }    
        })                 
      } 
    }
    else {
      return false;
    }
  });
});


/*-------- funcion habilita periodo para resolver la encuesta, se manda al archivo fun_fechas.php --------*/

$('#habilitar').click(function(){
   swal({
    title: "",
    text: "¿HABILITAR PERIODO PARA RESOLVER ENCUESTA?",
    icon: "img/question.png",
    buttons: ['No', "Si"],
  })
   .then((willDelete) => {
    if (willDelete) {
      var fecha_inicio = $('#fecha_i').val() 
      var fecha_termino = $('#fecha_t').val()
      var habi_encta = "HABILITAR";  
      var date_a =  new Date();
      var y = date_a.getFullYear();
      var m = date_a.getMonth() + 1;
      var d = date_a.getDate();
      if(d < 10)
        d ='0'+d;
      if(m < 10)
        m ='0'+m;
      var date_a = d + "/" + m + "/" + y;
      if (fecha_inicio < date_a){
        swal({
          title: "Fecha Invalida",
          text: "Seleccione Una Fecha  Actual.",
          icon: "error",
          button: "Aceptar",
          dangerMode: true,
        });
      }
      else{
        $.ajax({
          type: 'POST',
          url: 'procesos/fun_fechas.php?funcion=staus_habilitado',
          data: {'fecha_inicio': fecha_inicio,'fecha_termino': fecha_termino, 'habi_encta': habi_encta},
          success : function(response){     
            if($.trim(response) == "exito_v"){ 
              swal({
                title: "",
                text: "Periodo para resolver encuesta habilitado",
                icon: "success",
                buttons: [,"Aceptar"],          
              })
              .then((eceptar) => {
                if (eceptar) {
                  window.location  = 'home.php';
                }
                else {
                  return false;
                }
              });
            }
            else {                  
              swal({
                title: "",
                text: "Error en la actualización del perido",
                icon: "error",
                button: "Aceptar",
                dangerMode: true,
              });
            }
          }    
        })      
      }    
    } 
    else {
      return false;
    }
  })   
 });

/*-------- funcion deshabilita el periodo para resolver la encuesta --------*/

$('#deshabilitar').click(function(){
  swal({
    title: "",
    text: "¿DESHABILITAR PERIODO PARA RESOLVER ENCUESTA?",
    icon: "warning",
    buttons: ['No', "Si"],
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var deshabilitar = "DESHABILITAR";      
      $.ajax({
        type: 'POST',
        url: 'procesos/fun_fechas.php?funcion=staus_deshabilitado',
        data: {'deshabilitar': deshabilitar},
        success : function(response){     
          if($.trim(response) == "exito"){ 
            swal({
              title: "",
              text: "Periodo deshabilitado",
              icon: "success",
              buttons: [,"Aceptar"],          
            })
            .then((eceptar) => {
              if (eceptar) {
                window.location  = 'home.php';
              }
              else {
                return false;
              }
            });
          }
          else {                  
            swal({
              title: "Error al deshabilitar periodo",
              text: "Pongase en contacto con el personal de TI",
              icon: "error",
              button: "Aceptar",
              dangerMode: true,
            });
          }
        }    
      })  
      return false;
    }
  });   
}); 

/*----------- Funciones, filtra grafica individual-----------------------*/

$('#filtra_Gra').click(function(){
  Tip_preg = $('#list').val()    
  if (Tip_preg == "" ) {
    swal({
      title: "Seleccione una opción",
      text: "",
      icon: "error",
      button: "Aceptar",
      dangerMode: true,
    });     
  }
  else {          
    $('#Graf_general').hide();
    $('#show_graf_i').load('procesos/grafica_individual.php?Tip_preg=' + Tip_preg);
  }
});

/*-----------datepicker Funcion muestra Fechas-----------------------*/

$(document).ready(function(){
  $('.input-daterange').datepicker({
   format: "dd/mm/yyyy",
 });
});


/*-----------Validacion de periodo-----------------------*/
$(document).ready(function () {

  var val_p = new XMLHttpRequest();
  val_p.open("GET", "procesos/Dat/val_periodo.dat", false);

  val_p.onreadystatechange = function () {
   
   var v_p = val_p.responseText;

   if(v_p == "HABILITAR"){

    $('#fecha_hbl').hide();
    $('#fecha_desh').show();
    $('#habilitar').show();
    $('#deshabilitar').attr("disable", true);          
  } 
  else{
               
  } 
}
val_p.send(null);

});








