<?php
   /*archivo requerido, para la conexion a la base de datos*/
    require_once '../conect/valid_admin.php';	$conn = getConn();
    
    /*consulta, compara el numero de pregunta solicitado y muestra resultados  */
    $q_preg = $conn->query("SELECT Num_Pregunta, Enunciado FROM `Preguntas` WHERE `Num_Pregunta` = '$_REQUEST[edit_pre]'") or die(mysqli_error());
	$r_preg = $q_preg->fetch_array();
	mysqli_close($conn);
?>
    <!-----script necesarios para las funciones a realizar -->
	<script type="text/javascript" src="js/funcion_periodo.js"></script>
	<script type="text/javascript" src="js/funcion_preguntas.js"></script>
	<br>

	<!--Formulario, edita una nueva pregunta, se muestra en el el archivo preguntas.php------->
	<div class = "col-lg-5">
		<form id="form_actualizar" name="form_actualizar" method = "POST" enctype = "multipart/form-data">
			<div class = "form-group">
				<label>Numero de pregunta: *</label>
				<input type = "text" value = "<?php echo $r_preg['Num_Pregunta']?>" name = "Num_Pregunta" style="background-color:#CDCDD3;" class = "form-control" readonly  />
			</div>
			<br>
			<div class = "form-group">
				<label>Enunciado: *</label>
				<input type = "text" value = "<?php echo utf8_encode($r_preg['Enunciado']);?>" name = "Enunciado" required = "required" class = "form-control" />
			</div>
			<br>
			 <div class="form-group">
	            <LABEL>Tipo: *</LABEL>
	            <select id="list" name="list"  class="form-control"></select>
	        </div>
	        <br>
		    <div class = "form-group">
		        <input  name="edit_pregunta" id="edit_pregunta" required="required"  class="form-control col-sm-5" type="submit" value="Guardar"> 
		    </div>
		</form>		
	</div>
	