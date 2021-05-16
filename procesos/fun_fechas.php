 <?php
    
    require_once '../conect/valid_admin.php'; 
   
    $accion = $_REQUEST;
    $select_accion = $accion['funcion'] !='' ? $accion['funcion'] : '';


    switch($select_accion) {
        case 'act_periodo':     
            act_periodo();
            break;
        case 'staus_habilitado':
            status_habilitar();
            break;     
        case 'staus_deshabilitado':
            status_deshabilitar();
            break;
        default:
        return;
    }

    function act_periodo (){
        $conn = getConn(); 

        $actualizar_p = $_POST['periodo'];

        $val_p = $conn->query("SELECT id_periodo, fecha_p FROM `Periodos` WHERE  `id_periodo` = $actualizar_p " ) or die (mysql_error());
        $rslt_prd = $val_p->fetch_array();

        $r_p = $rslt_prd['fecha_p'];

        $val_c = $conn->query("SELECT Periodo FROM `Control` WHERE  `Periodo` = '$r_p' " ) or die (mysql_error());
        $rslt_c = $val_c->fetch_array();

        $rp_c = $rslt_c['Periodo'];             

        if ($r_p == $rp_c ){

           echo("error");          
        }
        else {

            $fil_p_txt = 'Dat/periodo.dat';
            $crear_txt_p = fopen($fil_p_txt , "w") or die("Error al crear archivo periodo.dat!");
            fwrite($crear_txt_p, $r_p); 
            fclose($crear_txt_p);

            $Act_Control = $conn->query("UPDATE `Control` SET  `Periodo` = '$r_p', `checar` = 'Pendiente'  ") or die(mysqli_error());  


            $Act_Resul = $conn->query("UPDATE `Resultados` SET  `Periodo` = '$r_p', `Cont_Excelente` = 0, `Cont_Bueno` = 0, `Cont_Regular` = 0, `Cont_Deficiente` = 0 ") or die(mysqli_error());

            $borrar_p = $conn->query("DELETE FROM `Periodos` WHERE `id_periodo` = $actualizar_p") or die(mysqli_error());
            
            echo "actualizado";      

        } mysqli_close($conn);  
    }
    
    function status_habilitar (){        
        $habilitar = $_POST['habi_encta'];
        $fecha_i=$_POST['fecha_inicio'];
        $fecha_t=$_POST['fecha_termino'];

        $fil_d_dat = 'Dat/val_periodo.dat';
        $fil_i_txt = 'Dat/fecha_inicio.dat';
        $fil_t_txt_f = 'Dat/fecha_termino.dat';

        if(!file_exists($fil_d_dat) && !file_exists( $fil_i_txt) && !file_exists($fil_t_txt_f)) {

        die("error");

        } 
        else { 
            
            $crear_dat_d = fopen($fil_d_dat , "w") or die("Error al crear archivo val_periodo.dat!");
            fwrite($crear_dat_d, $habilitar); 
            fclose($crear_dat_d);            
            
            $crear_txt_i = fopen($fil_i_txt , "w") or die("Error al crear archivo fecha_inicio.dat!");
            fwrite($crear_txt_i, $fecha_i); 
            fclose($crear_txt_i);  
            
            $crear_txt_f = fopen($fil_t_txt_f , "w") or die("Error al crear archivo fecha_termino.dat!");
            fwrite($crear_txt_f, $fecha_t); 
            fclose($crear_txt_f);

            echo "exito_v";
        }
    }


    function status_deshabilitar (){

        $deshabi = $_POST['deshabilitar'];

        $fil_p_dat = 'Dat/val_periodo.dat';

        if(!file_exists($fil_p_dat)) {

          die("error");

        } else {   

            $crear_dat_p = fopen($fil_p_dat , "w") or die("Error al crear archivo val_periodo.dat!");
            fwrite($crear_dat_p, $deshabi); 
            fclose($crear_dat_p);  

            $fil_i_txt = 'Dat/fecha_inicio.dat';        
            $crear_txt_i = fopen($fil_i_txt , "w") or die("Error al crear archivo fecha_inicio.dat!");
            fwrite($crear_txt_i, ''); 
            fclose($crear_txt_i);  
            
            $fil_t_txt_f = 'Dat/fecha_termino.dat';
            $crear_txt_f = fopen($fil_t_txt_f , "w") or die("Error al crear archivo fecha_termino.dat!");
            fwrite($crear_txt_f, ''); 
            fclose($crear_txt_f);

          echo "exito";
        }
        
    }
   

  

  