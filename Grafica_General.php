<!DOCTYPE html>

<?php
  require_once 'conect/valid_admin.php'; $conn = getConn(); 
  
  $periodo = fopen("procesos/Dat/periodo.dat", "r");
    while (!feof($periodo)){
      $periodo_actual = fgets($periodo);
    }
    fclose($periodo);
  $InsertarChecar=$conn->query("SELECT round (sum(Cont_Excelente+Cont_Bueno+Cont_Regular+Cont_Deficiente)/count(Num_Pregunta)) 'total' FROM Resultados WHERE Periodo='$periodo_actual';") or die(mysqli_error());
  $mostrarContador=$InsertarChecar->fetch_array(); 

?>

<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 shrink-to-fit=no">
  <title>SMALIE</title>
  <link rel="icon" href="img/smalie.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/stile.css">  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css"> 
</head>
<body id="page-top">
  <div id="wrapper">

    <!-- ---------------------Menu Lateral----------------------------------------->
    <ul id="sidebar" class="sidebar navbar-nav aside aside" >          
      <div>            
        <br>
        <div class="sidebar-header">
          <h3><p>SMALIE</p></h3>
        </div> 
        <div class="menu">    
          <li class="nav-item active">
            <a class="nav-link" href="home.php">
              <i class="fas fa-fw fa fa-home"></i>
              <span>HOME</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-fw fa fa-tasks"></i>
              <span>Resultados</span>
            </a>
            <ul>
              <li class="nav-item">
                <a href="Grafica_General.php">
                  <i></i>
                  <span>Resultados/Graficas</span> 
                </a>
              </li>                          
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa fa-check-circle"></i>
              <span>Estatus</span>
            </a>
            <ul>
             <li class="nav-item">
              <a  href="estatus.php">
                <i class="fas "></i>
                <span>Checar Estatus</span>
              </a>
            </li>
            <li class="nav-item">
              <a  href="personal.php">
                <i class="fas "></i>
                <span>Personal</span>
              </a>
            </li>
          </ul>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-fw fa fa-cogs"></i>
              <span>Configuracion</span>
            </a>
            <ul>
              <li class="nav-item">
                <a  href="#" data-toggle="modal" data-target="#perido">
                  <i class="fas"></i>
                  <span>Periodo</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="preguntas.php">
                  <i class="fas"></i>
                  <span>Preguntas</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="borrador_encuesta.php">
                  <i class="fas"></i>
                  <span>Borrador Encuesta</span>
                </a>
              </li>
            </ul>
          </li>       
        </div>
      </div>
    </ul> 

    <div id="content-wrapper">
      <div class="container-fluid" >

        <!-- ----------------------------Barra Superior--------------------------------->
        <nav id="navbar" class="navbar navbar-nav navbar-expand-lg  static-top" style="background-color: transparent;" >
          <img src="img/banners.png" class="img-responsive" /> 
          <a class=" d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="procesos/funciones_query.php?funcion=logout"><img style="width:23%; margin-top: 5px;" src="img/close_vino.png"></><p class="d-lg-inline-block" style="color: #5d0227;  margin-top: 26px ; margin-left: 10px;">Logout</p></a>
        </nav> 
        
        <!-- ----------------------------Modal barra progresiva--------------------------------->
        <div class="modal modal-fullscreen fade" id="bar_progres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="margin-left: 25%;" id="myModalLabel">GENERANDO PDF</h4>
              </div>
              <div class="modal-body">
                <div class="col-lg-12">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                  </div>            
                </div> 
                <div style="margin-bottom: 2%;"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" style="background-color: white;" data-dismiss="modal">Aceptar</button>
              </div>
            </div>
          </div>
        </div>

        <!------------------Modal Funciones Periodo de Encuesta-------------------------------->
        <div class="container"> 
          <div class="modal fade" id="perido">
            <div  class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header" style=" background: #5d0227; opacity: 80%; color:white;">
                  <?php
                    $p_actual = fopen("procesos/Dat/periodo.dat", "r");
                    while (!feof($p_actual)){
                      $r_periodo = fgets($p_actual);
                    }
                    fclose($p_actual);
                  ?> 
                  <div>
                    <label style="font-size: 1rem;"> ENCUESTA DE AMBIENTE LABORAL</label>
                  </div> 
                  <div style=" margin-left: 30%;">
                    <label style="font-size:.9rem;"> Periodo Actual: <?php echo $r_periodo?></label>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" style="color:white;">X</button>
                </div>
                <div class="modal-body">                                     
                  <div class="input-group mb-5"> 
                    <label style="margin: 1%;">periodo:</label>
                    <div class="input-group-prepend">
                      <select id="list_periodo" name="list_periodo" class="form-control">
                      </select>
                    </div>
                    <div class = "col-sm-5">
                      <input id="Actualizar" name="Actualizar" class="" type="submit"  value="Actualizar"> 
                    </div>
                  </div>                
                  <form name="formular" method="post" style="margin-top: 7%;"> 
                    <div class="container">
                      <?php
                      $fecha_i = fopen("procesos/Dat/fecha_inicio.dat", "r");
                      while (!feof($fecha_i)){
                        $f_inicio = fgets($fecha_i);
                      }
                      fclose($fecha_i);

                      $fecha_t = fopen("procesos/Dat/fecha_termino.dat", "r");
                      while (!feof($fecha_t)){
                        $f_termino = fgets($fecha_t);
                      }
                      fclose($fecha_t);
                      ?> 
                      <div id="fecha_hbl">
                        <a style="margin-top: 5%;">PERIODO HABILITADO DE LA FECHA:  <?php echo $f_inicio?> AL <?php echo $f_termino?></a>
                      </div>  
                      <div id="fecha_desh">
                        <a style="margin-top: 5%;">SELECIONA UNA FECHA HABIL PARA RESPONDER LA ENCUESTA:</a>
                        <div>
                          <div class="input-daterange input-group " id="datepicker" style="margin-top:5%;" > 
                          <input type="text" class="input-sm form-control" value="" id="fecha_i" name="fecha_i" placeholder="Fecha de Inicio"/>
                          <span class="input-group-addon" style="padding-top:4px; margin-left: 0.1%;">al</span>
                          <input style="margin-left: 0.8%;" type="text" class="input-sm form-control" id="fecha_t"  name="fecha_t" placeholder="Fecha de Termino"/>
                        </div>
                      </div>                        
                      </div>
                      <center>
                        <div style="margin-top:4%;">
                          <input id="habilitar" name="habilitar" class="col-sm-4" type="button" value="HABILITAR">
                          <input  id="deshabilitar" class="col-sm-4" type="button" value="DESHABILITAR"> 
                        </div>                      
                      </center>                 
                    </div>     
                  </form>
                </div>                           
              </div>
            </div>
          </div> 
        </div>

        <div>
          <div class="input-group-prepend col-md-3" style="display: inline-block;">
            <select id="list" name="list" class="form-control"></select>
          </div>            
          <div class = "col-md-2" style="display: inline-block;">
            <input style="border-radius: 9px ; background-color:#ffff" id="filtra_Gra" name="filtra_Gra" class="form-control" type="submit"  value="Filtrar">
          </div>                                        
        </div>

        <div id = "show_graf_i"></div> 
        <div id="Graf_general">
          <div align="right"  >
            <input style="border-radius: 7px; " id="pdf" name="pdf" class="form-control col-md-3 pdf" type="button"  value="Generar PDF">
          </div> 
            
          <div id="fontt">
            <p> PERIODO: <?php echo$periodo_actual?></p>
            <p>TOTAL DE PERSONAL ENCUESTADO: <?php echo $mostrarContador['total'];?></p>
          </div>        
                    
          <div class="card mb-3">
            <div class="card-header" style=" background: #5d0227; opacity: 80%; color:white;">
            <i class="fas fa-table"></i>
            <a> Resultados</a>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>   
                      <th>Resultado</th>
                      <?php
                        $q_tipo= $conn->query("SELECT Tipo FROM  Tipos ") or die(mysqli_error());

                        while(  $result_tipo = $q_tipo->fetch_array()) {                        
                          ?>
                            <th><?php echo utf8_encode($result_tipo['Tipo']);?></th>                           
                          <?php 
                        }                  
                      ?>                         
                    </tr>
                  </thead>
                  <tbody> 
                    <tr>
                      <th>Excelente</th>                                             
                      <?php
                        $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());

                        while(  $result_id = $q_idtipo->fetch_array()) {
                          $id_Tipo = $result_id['Id_Tipo'];                         
                          $array_tipos = array( $id_Tipo);
                          $tipos = count($array_tipos); 

                          for($i=0; $i<$tipos; $i++) {  
                            $R_Exelente[$i] = $conn->query("SELECT sum(Cont_Excelente) 'Exelente' FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipos[$i]") or die(mysqli_error());
                            
                            while ($result_E = $R_Exelente[$i]->fetch_array()) {                             
                              ?>
                                <td><?php echo $result_E['Exelente'];?></td>
                              <?php  
                            } 
                          }
                        }                                            
                      ?>                                                                         
                    </tr>
                    <tr>
                      <th>Bueno</th>                                             
                      <?php
                        $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());

                        while(  $result_id = $q_idtipo->fetch_array()) {
                          $id_Tipo = $result_id['Id_Tipo'];                         
                          $array_tipos = array( $id_Tipo);
                          $tipos = count($array_tipos); 

                          for($i=0; $i<$tipos; $i++) { 
                            $R_Bueno[$i] = $conn->query("SELECT sum(Cont_Bueno)'Bueno'   FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipos[$i]") or die(mysqli_error());
                            
                             while ($result_B = $R_Bueno[$i]->fetch_array()) {                               
                              ?>
                                <td><?php echo $result_B['Bueno'];?></td>
                              <?php  
                            } 
                          }
                        }                                            
                      ?>                                                                         
                    </tr>
                    <tr>
                      <th>Regular</th>                                             
                      <?php
                       $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());

                        while(  $result_id = $q_idtipo->fetch_array()) {
                          $id_Tipo = $result_id['Id_Tipo'];                         
                          $array_tipos = array( $id_Tipo);
                          $tipos = count($array_tipos); 

                          for($i=0; $i<$tipos; $i++) { 
                              $R_Regular[$i] = $conn->query("SELECT sum(Cont_Regular)'Regular' FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipos[$i]") or die(mysqli_error());
                              
                              while ($result_R = $R_Regular[$i]->fetch_array()) {                               
                                ?>
                                <td><?php echo $result_R['Regular'];?></td>
                              <?php  
                            } 
                          }
                        }                                          
                      ?>                                                                         
                    </tr>
                    <tr>
                      <th>Deficiente</th>                                             
                      <?php
                        $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());

                        while(  $result_id = $q_idtipo->fetch_array()) {
                          $id_Tipo = $result_id['Id_Tipo'];                         
                          $array_tipos = array( $id_Tipo);
                          $tipos = count($array_tipos); 
     
                          for($i=0; $i<$tipos; $i++) {
                           
                            $R_Deficiente[$i] = $conn->query("SELECT sum(Cont_Deficiente) 'Deficiente'   FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipos[$i]") or die(mysqli_error());
                            
                            while ($result_D = $R_Deficiente[$i]->fetch_array()) {                                                      
                              ?>
                                <td><?php echo $result_D['Deficiente'];?></td>
                              <?php  
                            } 
                          }
                        }                                          
                      ?>                                                                         
                    </tr>                                                                        
                  </tbody>
                </table>
              </div>
            </div>
          </div>                 
            
          <div class=".col-md-3 .offset-md-3">
            <div class="card mb-5 ">
              <div class="card-header" style=" background: #5d0227; opacity: 80%; color:white;">
                <i class="fas fa-chart-bar"></i>
                <a>Grafica General</a>
              </div>
              <div class="card-body">
                <div id="cont-grap" ></div>                  
              </div>
            </div>
          </div> 
        </div> 
        
        <footer class="sticky-footer">
          <div class="container my-auto" >
            <div class="text-center my-auto" style="color:white">
              <a style="color: white" href="https://www.creative-solutions.com.mx" >© ITSAT</a>
            </div>
          </div>
        </footer>
      </div> 
    </div>  
  </div>    
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery-1.8.3.js'></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>  
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>  
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/highcharts-3d.js"></script>
<script type="text/javascript" src="js/jspdf.min.js"></script>
<script type="text/javascript" src="js/html2canvas.min.js"></script>
<script type="text/javascript" src="js/jspdf.plugin.autotable.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/canvg/dist/browser/canvg.min.js"></script>
<script type='text/javascript' src="js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/funcion_periodo.js"></script> 
<script type="text/javascript" src="js/funcion_preguntas.js" ></script>
<script type="text/javascript">
  $(function () {
    $('#cont-grap').highcharts({
      chart: {
        type: 'column',
        options3d: {
          enabled: true,
          alpha: 6,
          beta:13,
          viewDistance: 60,
          depth: 60
        },
        marginTop: 80,
        marginRight: 30
      },                          

      title: {
        text: 'GRAFICA GENERAL'
      },

      xAxis: {
        categories: [<?php
          $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());
          while(  $result_id = $q_idtipo->fetch_array()) {
            $id_Tipo = $result_id['Id_Tipo'];                         
            $array_tipo = array( $id_Tipo);
            $tipos = count($array_tipos);

            for($i=0; $i<$tipos; $i++) {
              ?>
              '<?php $R_Deficiente[$i] = $conn->query("SELECT Tipo  FROM Tipos where Id_Tipo= $array_tipo[$i]") or die(mysqli_error());                            
              $result_s = $R_Deficiente[$i]->fetch_array(); 
              echo utf8_encode($result_s['Tipo']);
              ?>',  
              <?php                
            }
          }?>
        ]
      },

      yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
          text: ''
        }
      },    

      plotOptions: {
        column: {
          stacking: 'normal',
          depth: 30
        }
      },

      series: [
        {
          name: 'Excelente',
          color: '#00961D',
          data: [<?php
            $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());
            while(  $result_id = $q_idtipo->fetch_array()) {                                                
              $array_tipo = array($result_id['Id_Tipo']);
              $tipo = count($array_tipo); 

              for($i=0; $i<$tipo; $i++) { 
                $R_Deficient[$i] = $conn->query("SELECT sum(Cont_Excelente) 'Exelente' FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipo[$i]") or die(mysqli_error()); 
                while ($result = $R_Deficient[$i]->fetch_array()) {  echo $result['Exelente'].',';}
              }
            }?>
          ],
          stack: 'Excelente'                       
        }, 
        {
          name: 'Bueno',
          color: '#00ACAF',
          data: [<?php
            $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());
            while(  $result_id = $q_idtipo->fetch_array()) {                                                
              $array_tipo = array($result_id['Id_Tipo']);
              $tipo = count($array_tipo); 

              for($i=0; $i<$tipo; $i++) { 
                $R_Deficient[$i] = $conn->query("SELECT sum(Cont_Bueno)'Bueno'  FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipo[$i]") or die(mysqli_error());                                                            
                while ($result = $R_Deficient[$i]->fetch_array()) {  echo $result['Bueno'].',';}
              }
            }?>
          ],
          stack: 'Bueno'                           
        },
        {
          name: 'Regular',
          color: '#FF6C0B',
          data: [<?php
            $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());
            while(  $result_id = $q_idtipo->fetch_array()) {                                                
              $array_tipo = array($result_id['Id_Tipo']);
              $tipo = count($array_tipo); 

              for($i=0; $i<$tipo; $i++) { 
                $R_Deficient[$i] = $conn->query("SELECT sum(Cont_Regular)'Regular' FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipo[$i]") or die(mysqli_error());                                                            
                while ($result = $R_Deficient[$i]->fetch_array()) {  echo $result['Regular'].',';}
              }
            }?>
          ],
          stack: 'Regular'
        },
        {
          name: 'Deficiente',
          color: '#FF1414',
          data: [<?php
            $q_idtipo= $conn->query("SELECT  Id_Tipo  FROM  Tipos ") or die(mysqli_error());
            while(  $result_id = $q_idtipo->fetch_array()) {                                                
              $array_tipo = array($result_id['Id_Tipo']);
              $tipo = count($array_tipo); 

              for($i=0; $i<$tipo; $i++) { 
                $R_Deficient[$i] = $conn->query("SELECT sum(Cont_Deficiente) 'Deficiente'   FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta where Id_Tipo= $array_tipo[$i]") or die(mysqli_error());                                                            
                while ($result = $R_Deficient[$i]->fetch_array()) {  echo $result['Deficiente'].',';}
              }
            } mysqli_close($conn);?>
          ],
          stack: 'Deficiente'
        }
      ]
    });
  });
</script>

<script>
  $("#pdf").click(function(){
    swal({
      title: "",
      text: "¿Desea generar reporte PDF?",
      icon: "img/question.png",
      buttons: ['No', "Si"],
      succes: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var doc = new jsPDF('portrait', 'pt', 'a4', true);
       doc.setFont("helvetica");
       doc.setFontType("Arial");
       doc.setFontSize(16);

       var logo = new Image();
       logo.src = 'img/banners.png';
       doc.addImage(logo, 'PNG', 35, 40, 530, 40);


       doc.text('REPORTE GENERAL ENCUESTA DE AMBIENTE LABORAL', 85, 130, ); 


       var elementHandler = {
          '#ignorePDF': function(element, renderer) {
          return true;
          }
        };
        doc.setFontType("Arial");
        doc.setFontSize(12);
        doc.text('PERIODO: <?php echo $periodo_actual?>', 210, 175, ); 
        doc.text('TOTAL DE PERSONAL ENCUESTADO: <?php echo $mostrarContador['total'];?>', 190, 190, ); 

        doc.autoTable({
          html: '#dataTable',
          headStyles: { 
            fillColor: [93, 2, 39], 
          },       
          styles: {
            lineColor: [0, 0, 0],
            lineWidth: .2,
          },     
          bodyStyles: {     
            textColor: 0,
          },            
          margin: { top: 245 }, 
        })  

        var svg = document.querySelector('svg');
        var canvas = document.createElement('canvas');
        var canvasIE = document.createElement('canvas');
        var context = canvas.getContext('2d');

        var data = (new XMLSerializer()).serializeToString(svg);
        canvg(canvas, data);
        var svgBlob = new Blob([data], {
          type: 'image/svg+xml;charset=utf-8'
        });

        var url = canvas.toDataURL(svgBlob);
        var img = new Image();
        img.onload = function() {
          context.canvas.width = $('#cont-grap').find('svg').width();;
          context.canvas.height = $('#cont-grap').find('svg').height();;
          context.drawImage(img, 0, 0);     

          var dataUrl;

          if (isIEBrowser()) { 
            var svg = $('#cont-grap').highcharts().container.innerHTML;
            canvg(canvasIE, svg);
            dataUrl = canvasIE.toDataURL('image/JPEG');
          } 
          else {
            dataUrl = canvas.toDataURL('image/jpeg');
          }
          doc.addImage(dataUrl, 'JPEG', 30, 450, 500, 300); 

          var porcent_ini = 0;    
          tiempo_carga = setInterval(function() {   

            porcent_ini += 10;            
            $('.progress-bar').css('width', porcent_ini+'%');
            $('.progress-bar').attr('aria-valuenow', porcent_ini);
            $('.progress-bar').text(porcent_ini+'%');
            $("#bar_progres").modal()
            if (porcent_ini == 100) {
              clearInterval(tiempo_carga);
              doc.output('dataurlnewwindow');
            }
          }, 1000);
        };
        img.src = url;
        return false;
      }
    });      
  });

  function isIEBrowser() {
    var ieBrowser;
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) 
    {
      ieBrowser = true;
    } else 
    {
      console.log('Other Browser');
      ieBrowser = false;
    }
    return ieBrowser;
  };
</script> 
</html>









