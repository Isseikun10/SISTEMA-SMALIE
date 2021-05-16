<?php
require_once '../conect/valid_admin.php'; $conn = getConn();


$periodo = fopen("Dat/periodo.dat", "r");
while (!feof($periodo)){
  $periodo_actual = fgets($periodo);
}
fclose($periodo);

$InsertarChecar=$conn->query("SELECT round (sum(Cont_Excelente+Cont_Bueno+Cont_Regular+Cont_Deficiente)/count(Num_Pregunta)) 'total' FROM Resultados WHERE Periodo='$periodo_actual';") or die(mysqli_error());
$mostrarContador=$InsertarChecar->fetch_array();

?>

<div align="right"  >
  <input style="border-radius: 7px; " id="pdf-ind" name="pdf-ind" class="form-control col-md-3 pdf" type="button"  value="Generar PDF">
</div> 

<div id="fontt">
  <p> PERIODO: <?php echo$periodo_actual?></p>
  <p>TOTAL DE PERSONAL ENCUESTADO: <?php echo $mostrarContador['total'];?> </p>          
</div>

<div id="Graf_individual" >  
  <div class="card mb-3">
    <div class="card-header" style=" background: #5d0227; opacity: 80%; color:white;">
      <i class="fas fa-table"></i>
      <a> Resultados</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table style="text-align: center;" class="table table-bordered" id="datagrap" width="100%" cellspacing="0">
          <thead>
            <tr>                      
              <th>Resultado</th>
              <?php
              $q_tipo= $conn->query("SELECT Tipo FROM  Tipos WHERE Id_Tipo = '$_REQUEST[Tip_preg]' ") or die(mysqli_error());
              $result_tipo = $q_tipo->fetch_array(); 
              ?>
              <th><?php echo utf8_encode($result_tipo['Tipo']);?></th>
              <th>Porcentaje</th>                     
            </tr>
          </thead>                  
          <tbody>
            <?php 
            $q_pre = $conn->query(" SELECT  Id_Tipo FROM Preguntas where Id_Tipo = '$_REQUEST[Tip_preg]'") or die(mysqli_error());
            $resul = $q_pre->fetch_array();
            $r_tipo = $q_pre->num_rows;                       

            $Desempeño = $conn->query("SELECT sum(Cont_Excelente)/$r_tipo 'Exelente' , sum(Cont_Bueno)/$r_tipo 'Bueno', sum(Cont_Regular)/$r_tipo 'Regular', sum(Cont_Deficiente)/$r_tipo 'Deficiente'  FROM Resultados  INNER JOIN Preguntas ON Preguntas.Num_Pregunta = Resultados.Num_Pregunta WHERE Id_Tipo = '$_REQUEST[Tip_preg]' ") or die(mysqli_error());
            $result_D = $Desempeño->fetch_array();
            ?>  
            <tr>
              <td>Exelente</td>      
              <td><?php echo ROUND($result_D['Exelente'], 2)?></td>
              <?php 
                if ($mostrarContador['total'] == 0) { 
              ?>
                  <td>0%</td>
                <?php
                } else {                  

              ?>
                <td><?php echo ($result_D['Exelente']*100)/$mostrarContador['total']?>%</td>
              <?php 
               }
              ?>  
            </tr>
            <tr>
              <td>Bueno</td>
              <td><?php echo ROUND($result_D['Bueno'], 2)?></td>
              <?php 
                if ($mostrarContador['total'] == 0) { 
              ?>
                  <td>0%</td>
                <?php
                } else {                  

              ?>
                <td><?php echo ($result_D['Bueno']*100)/$mostrarContador['total']?>%</td>
              <?php 
               }
              ?>                     
            </tr>
            <tr>
              <td>Regular</td> 
              <td><?php echo ROUND($result_D['Regular'], 2)?></td>
              <?php 
                if ($mostrarContador['total'] == 0) { 
              ?>
                  <td>0%</td>
                <?php
                } else {                  

              ?>
                <td><?php echo ($result_D['Regular']*100)/$mostrarContador['total']?>%</td>
              <?php 
               }
              ?>  
            </tr>
            <tr>
              <td>Deficiente</td>  
              <td><?php echo ROUND($result_D['Deficiente'], 2)?></td>  
              <?php 
                if ($mostrarContador['total'] == 0) { 
              ?>
                  <td>0%</td>
                <?php
                } else {                  

              ?>
                <td><?php echo ($result_D['Deficiente']*100)/$mostrarContador['total']?>%</td>
              <?php 
               }
              ?>                
            </tr>
            <tr>
              <td>Total</td>  
              <td><?php echo $mostrarContador['total'];?></td>
              <?php 
                if ($mostrarContador['total'] == 0) { 
              ?>
                  <td>0%</td>
                <?php
                } else {                  

              ?>
                <td><?php echo ($mostrarContador['total']*100)/$mostrarContador['total']?>%</td>
              <?php 
               }
              ?>
            </tr>              
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class=".col-md-3 .offset-md-3">
    <div class=".col-md-3 .offset-md-3">
      <div class="card mb-5 ">
        <div class="card-header" style=" background: #5d0227; opacity: 80%; color:white;">
          <i class="fas fa-chart-bar"></i>
          <a>Grafica Individual</a>
        </div>
        <div class="card-body">
          <div id="mostrar" ></div>
        </div>
      </div>
    </div>
  </div> 
</div>  

<script type="text/javascript">
  $(function () {
    $('#mostrar').highcharts({
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
        text: '<?php echo utf8_encode($result_tipo['Tipo']);?>'
      },

      xAxis: {
        categories: ['<?php
        $q_idtipo= $conn->query("SELECT  Tipo  FROM  Tipos WHERE Id_Tipo = '$_REQUEST[Tip_preg]' ") or die(mysqli_error());
        $result_id = $q_idtipo->fetch_array();
        echo utf8_encode($result_id['Tipo']); 
        ?>'
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
        data: [<?php if ($mostrarContador['total'] == 0){ echo "0"; } else{ echo (($result_D['Exelente']*100)/$mostrarContador['total']);}?>],
        stack: 'Excelente'                       
      }, 
      {
        name: 'Bueno',
        color: '#00ACAF',
        data: [<?php if ($mostrarContador['total'] == 0){ echo "0"; } else{ echo (($result_D['Bueno']*100)/$mostrarContador['total']);}?>],
        stack: 'Bueno'                           
      },
      {
        name: 'Regular',
        color: '#FF6C0B',
        data: [<?php if ($mostrarContador['total'] == 0){ echo "0"; } else{ echo (($result_D['Regular']*100)/$mostrarContador['total']);}?>],                            
        stack: 'Regular'
      },
      {
        name: 'Deficiente',
        color: '#FF1414',
        data: [<?php if ($mostrarContador['total'] == 0){ echo "0"; } else{ echo (($result_D['Deficiente']*100)/$mostrarContador['total']);}?>],
        stack: 'Deficiente'
      }
      ]
    });
  });
</script>

<script>

  $("#pdf-ind").click(function(){
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


      doc.text('REPORTE ENCUESTA DE AMBIENTE LABORAL', 120, 130, ); 


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
        html: '#datagrap',
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
        context.canvas.width = $('#mostrar').find('svg').width();;
        context.canvas.height = $('#mostrar').find('svg').height();;
        context.drawImage(img, 0, 0);     

        var dataUrl;
        if (isIEBrowser()) { 
          var svg = $('#mostrar').highcharts().container.innerHTML;
          canvg(canvasIE, svg);
          dataUrl = canvasIE.toDataURL('image/JPEG');
        } else {
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