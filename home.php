<!DOCTYPE html>
<?php
require_once 'conect/valid_admin.php';
?>
<html lang="es">
<head><meta charset="gb18030">
  
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
    
    <div  id="content-wrapper" class="imgb">
      <div class="container-fluid" >

        <nav id="navbar" class="navbar navbar-nav navbar-expand-lg  static-top" style="background-color: transparent;" >
          <img src="img/banners.png" class="img-responsive" /> 
          <a class=" d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="procesos/funciones_query.php?funcion=logout"><img style="width:23%; margin-top: 5px;" src="img/close_vino.png"></><p class="d-lg-inline-block" style="color: #5d0227;  margin-top: 26px ; margin-left: 10px;">Logout</p></a>
        </nav> 

        <div class="font">
          <h3>SMALIE</h3>
          <h2 class="font">"Sistema Para La Mejora de Ambiente Laboral En Una Institución Educativa"</h2>
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
                        <a style="margin-top: 7%;">PERIODO HABILITADO DE LA FECHA:  <?php echo $f_inicio?> AL <?php echo $f_termino?></a>
                      </div>  
                      <div id="fecha_desh">
                        <a style="margin-top: 7%;">SELECIONA UNA FECHA HABIL PARA RESPONDER LA ENCUESTA:</a>
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
                      <div style="margin-top: 5%;"></div>                 
                    </div>     
                  </form>
                </div>                           
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
<script type='text/javascript' src='js/jquery-1.8.3.js'></script
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type='text/javascript' src="js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funcion_periodo.js"></script> 
<script type="text/javascript" src="js/funcion_preguntas.js"></script>




</html>
