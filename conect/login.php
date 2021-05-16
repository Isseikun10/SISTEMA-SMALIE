<?php

require_once 'conect_bd.php'; 

if(isset($_POST['login-submit'])) {
    $conn = getConn();

    $num_control = $_POST['num_control'];
    $rfc = $_POST['rfc'];
    $t_usr = $_POST['usr'];


    $fechaActual = date('d/m/Y');  

    $fecha_termino = fopen("../procesos/Dat/fecha_termino.dat", "r");
    while (!feof($fecha_termino)){
        $r_fecha_f = fgets($fecha_termino);
    }
    fclose($fecha_termino); 

    $fecha_inicio = fopen("../procesos/Dat/fecha_inicio.dat", "r");
    while (!feof($fecha_inicio)){
        $r_fecha_i = fgets($fecha_inicio);
    }
    fclose($fecha_inicio);

    $val_periodo = fopen("../procesos/Dat/val_periodo.dat", "r");
    while (!feof($val_periodo)){
        $r_val_p = fgets($val_periodo);
    }
    fclose($val_periodo);


    if ($t_usr == "usr_admin") {

      admin($num_control,  $rfc);
    }
    else if ($t_usr == "usr_e"){

       user($num_control, $rfc);
    } 
    else {
        echo "error";
    }
}     

function admin($admin_nc, $admin_rfc){

  $conn = getConn();
  $q_admin = $conn->query("call validar_admin($admin_nc, '$admin_rfc')") or die(mysqli_error());
  $r_admin = $q_admin->fetch_array();

  if ($admin_nc == $r_admin['admin_nc']  && $admin_rfc == $r_admin['admin_rfc']  ) {

    echo "success_admin";
    session_start();
    $_SESSION['RFC'] = $r_admin['admin_rfc']; 

  }     
  else {
    echo "usuario o contraseña no son válidos";
  }
} 

function user($use_nc, $user_rfc){

    $conn = getConn();
    $q_user = $conn->query("call validar_user($use_nc, '$user_rfc')") or die(mysqli_error());
    $r_user = $q_user->fetch_array();

    if ($use_nc == $r_user['Num_Control']  && $user_rfc == $r_user['RFC']  ) {
            $i_user = $r_user['Num_Control'];
        val_periodo($i_user);     
    }
  else {

    echo "usuario o contraseña no son válidos";
  }

}

function val_periodo($r_userNC){

    $fechaActual = date('d/m/Y');  

    $fecha_termino = fopen("../procesos/Dat/fecha_termino.dat", "r");
    while (!feof($fecha_termino)){
        $r_fecha_f = fgets($fecha_termino);
    }
    fclose($fecha_termino); 

    $fecha_inicio = fopen("../procesos/Dat/fecha_inicio.dat", "r");
    while (!feof($fecha_inicio)){
        $r_fecha_i = fgets($fecha_inicio);
    }
    fclose($fecha_inicio);

    $val_periodo = fopen("../procesos/Dat/val_periodo.dat", "r");
    while (!feof($val_periodo)){
        $r_val_p = fgets($val_periodo);
    }
    fclose($val_periodo);

    if ( $r_fecha_i  >= $fechaActual &&  $fechaActual <= $r_fecha_f &&  $r_val_p == 'HABILITAR') {
       
        echo "success_user";
        session_start();
        $_SESSION['Num_Control'] = $r_userNC;        
    } 
    else {

        echo "periodo_invalido"; 
    }
}