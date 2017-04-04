<?php 
class EnLetras { 
  var $Void = ""; 
  var $SP = " "; 
  var $Dot = "."; 
  var $Zero = "0"; 
  var $Neg = "Menos";    
  function ValorEnLetras($x, $Moneda){ 
    $s=""; 
    $Ent=""; 
    $Frc=""; 
    $Signo="";         
    if(floatVal($x) < 0) 
     $Signo = $this->Neg . " "; 
    else 
     $Signo = "";       
    if(intval(number_format($x,2,'.','') )!=$x) //<- averiguar si tiene decimales 
      $s = number_format($x,2,'.',''); 
    else 
      $s = number_format($x,2,'.','');        
    $Pto = strpos($s, $this->Dot);         
    if ($Pto === false){ 
      $Ent = $s; 
      $Frc = $this->Void; 
    } 
    else{ 
      $Ent = substr($s, 0, $Pto ); 
      $Frc =  substr($s, $Pto+1); 
    }
    //echo $Ent."<br>";
    if($Ent == $this->Zero || $Ent == $this->Void) 
       $s = "Cero "; 
    elseif((strlen($Ent) == 13)&&(intval(substr($Ent, 0,  strlen($Ent) - 12)) == 1)){ 
       $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 12))) . "Billón " . $this->SubValLetra(intval(substr($Ent,-12, 12))); 
    }
    elseif(strlen($Ent) > 12){ 
       $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 12))) . "Billones " . $this->SubValLetra(intval(substr($Ent,-12, 12))); 
    }
    elseif((strlen($Ent) > 7)){ 
       $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 6))) . "Millones " . $this->SubValLetra(intval(substr($Ent,-6, 6))); 
    }
    elseif((strlen($Ent) == 7)&&(intval(substr($Ent, 0,  strlen($Ent) - 6)) == 1)){ 
       $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 6))) . "Millón " . $this->SubValLetra(intval(substr($Ent,-6, 6))); 
    }
    else{ 
      $s = $this->SubValLetra(intval($Ent)); 
    }
    if (substr($s,-9, 9) == "Millones " || substr($s,-7, 7) == "Millón " || substr($s,-8, 8) == "Millón " || substr($s,-8, 8) == "Billón " || substr($s,-9, 9) == "Billones ")
       $s = $s . "de ";
    $s = $s . $Moneda;
    /*if($Frc != $this->Void){ 
       $s = $s . " " . $Frc. "/100"; 
       $s = $s . " " . $Frc . "/100"; 
    }*/
    //$letrass=$Signo . $s . " M.N."; 
    return ($Signo . $s . " M/CTE.");
  }
  function SubValLetra($numero){ 
    $Ptr=""; 
    $n=0; 
    $i=0; 
    $x =""; 
    $Rtn =""; 
    $Tem ="";
    $x = trim($numero);
    $n = strlen($x);
    $Tem = $this->Void;
    $i = $n;
    while( $i > 0){ 
      $Tem = $this->Parte(intval(substr($x, $n - $i, 1).str_repeat($this->Zero, $i - 1 ))); 
      //echo intval(substr($x, $n - $i, 1).str_repeat($this->Zero, $i - 1 ))." - ".$x."<br>";
      if( $Tem != "Cero" )
        $Rtn .= $Tem . $this->SP; 
      $i = $i - 1; 
    }     
    //--------------------- GoSub FiltroMil ------------------------------ 
    $Rtn=str_replace("Mil Mil", " Un Mil", $Rtn );
    $Rtn=str_replace("Diez Un", "Once", $Rtn );
    $Rtn=str_replace("Diez Dos", "Doce", $Rtn ); 
    $Rtn=str_replace("Diez Tres", "Trece", $Rtn ); 
    $Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn ); 
    $Rtn=str_replace("Diez Cinco", "Quince", $Rtn ); 
    $Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn ); 
    $Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn ); 
    $Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn ); 
    $Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn ); 
    $Rtn=str_replace("Veinte Un", "Veintiun", $Rtn ); 
    $Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn ); 
    $Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn ); 
    $Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn ); 
    $Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn ); 
    $Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn ); 
    $Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn ); 
    $Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn ); 
    $Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );
    while(1){ 
      $Ptr = strpos($Rtn, "Mil ");        
      if(!($Ptr===false)){ 
        if(! (strpos($Rtn, "Mil ",$Ptr + 1) === false )) 
          $this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr); 
        else 
          break; 
      } 
      else break; 
    }
    //--------------------- GoSub FiltroCiento ------------------------------ 
    $Ptr = -1; 
    do{ 
       $Ptr = strpos($Rtn, "Cien ", $Ptr+1); 
       if(!($Ptr===false)){ 
          $Tem = substr($Rtn, $Ptr + 5 ,1); 
          if( $Tem == "M" || $Tem == $this->Void) 
             ;
          else           
            $this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr); 
       } 
    }while(!($Ptr === false));
    //--------------------- FiltroEspeciales ------------------------------ 
    $Rtn=str_replace("Diez Un", "Once", $Rtn ); 
    $Rtn=str_replace("Diez Dos", "Doce", $Rtn ); 
    $Rtn=str_replace("Diez Tres", "Trece", $Rtn ); 
    $Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn ); 
    $Rtn=str_replace("Diez Cinco", "Quince", $Rtn ); 
    $Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn ); 
    $Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn ); 
    $Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn ); 
    $Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn ); 
    $Rtn=str_replace("Veinte Un", "Veintiun", $Rtn ); 
    $Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn ); 
    $Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn ); 
    $Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn ); 
    $Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn ); 
    $Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn ); 
    $Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn ); 
    $Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn ); 
    $Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );
    $Rtn=str_replace("Un Mil", "Mil", $Rtn );
    //--------------------- FiltroUn ------------------------------ 
    if(substr($Rtn,0,1) == "M") $Rtn = "" . $Rtn; 
    //--------------------- Adicionar Y ------------------------------ 
    for($i=65; $i<=88; $i++){ 
      if($i != 77) 
        $Rtn=str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn); 
    } 
    $Rtn=str_replace("*", "a" , $Rtn); 
    return($Rtn); 
  }
  function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr){ 
    $x = substr($x, 0, $Ptr)  . $NewWrd . substr($x, strlen($OldWrd) + $Ptr); 
  }
  function Parte($x){ 
    $Rtn=''; 
    $t=''; 
    $i=''; 
    do{ 
      switch($x){ 
        Case 0:  $t = "Cero";break; 
        Case 1:  $t = "Un";break; 
        Case 2:  $t = "Dos";break; 
        Case 3:  $t = "Tres";break; 
        Case 4:  $t = "Cuatro";break; 
        Case 5:  $t = "Cinco";break; 
        Case 6:  $t = "Seis";break; 
        Case 7:  $t = "Siete";break; 
        Case 8:  $t = "Ocho";break; 
        Case 9:  $t = "Nueve";break; 
        Case 10: $t = "Diez";break; 
        Case 20: $t = "Veinte";break; 
        Case 30: $t = "Treinta";break; 
        Case 40: $t = "Cuarenta";break; 
        Case 50: $t = "Cincuenta";break; 
        Case 60: $t = "Sesenta";break; 
        Case 70: $t = "Setenta";break; 
        Case 80: $t = "Ochenta";break; 
        Case 90: $t = "Noventa";break; 
        Case 100: $t = "Cien";break; 
        Case 200: $t = "Doscientos";break; 
        Case 300: $t = "Trescientos";break; 
        Case 400: $t = "Cuatrocientos";break; 
        Case 500: $t = "Quinientos";break; 
        Case 600: $t = "Seiscientos";break; 
        Case 700: $t = "Setecientos";break; 
        Case 800: $t = "Ochocientos";break; 
        Case 900: $t = "Novecientos";break;
        Case 1000: $t = "Mil";break;
        Case 1000000: $t = "Millón";break;
        Case 1000000000000: $t = "Billón";break;
      }
      if($t == $this->Void){ 
        $i = $i + 1; 
        $x = $x / 1000; 
        if($x== 0) $i = 0; 
      } 
      else 
        break;            
    }while($i != 0); 
    
    $Rtn = $t; 
    switch($i){ 
      Case 0: $t = $this->Void;break; 
      Case 1: $t = " Mil";break; 
      Case 2: $t = " Millones";break; 
      Case 3: $t = " Billones";break; 
    } 
    return($Rtn . $t); 
  }
}
########### muestra el select de los grupos para ser seleccionado ############
function Maestros(){
  $array = false;
	$sql = ("SELECT * FROM rmb_maestros ORDER BY rmb_maestros_nom ASC");
	$query = mysql_query($sql, conexion());
  if($query){
    return $query;
  }
}
########### Trae los datos de los partidos y devuelve el query rmas2784_admon ###########
function ColumnasTabla($tabla){
	$partidos = "";
	$sql = ("SELECT COLUMN_NAME, COLUMN_COMMENT FROM information_schema.columns WHERE table_schema = 'rmb_admon' AND table_name = '$tabla' ORDER BY ORDINAL_POSITION ASC");
  // echo $sql;
	$query = mysql_query($sql, conexion());
  if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### Trae los datos de los partidos y devuelve el query ###########
function DatosTabla($tabla, $campos){
	$partidos = "";
	$sql = ("SELECT $campos FROM $tabla");
	// echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### Trae los datos de los partidos y devuelve el query ###########
function ColumnasTabla2($tabla){
	$partidos = "";
	$sql = ("SELECT COLUMN_NAME, IS_NULLABLE, DATA_TYPE, CHARACTER_MAXIMUM_LENGTH, COLUMN_KEY, COLUMN_COMMENT FROM information_schema.columns WHERE table_schema = 'rmb_admon' AND table_name = '$tabla' ORDER BY ORDINAL_POSITION ASC");
  // echo $sql;
	$query = mysql_query($sql, conexion());
  if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### muestra el select de los perfiles para ser seleccionado ############
function TablasBaseDatos($nom_tabla){
  $sql = ("SELECT table_name FROM information_schema.tables WHERE table_schema = 'rmb_admon' ORDER BY table_name ASC");
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="rmb_maestros_tabla"  id="rmb_maestros_tabla">
    <option value="" <?php if($$nom_tabla == ''){echo ' selected="selected"';} ?>>Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($nom_tabla == $array[0]){echo ' selected="selected"';} ?>><?php echo $array[0];?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### Trae los datos de los usuarios y devuelve el query ###########
function UsuariosPerfil($perfil){
	if(($perfil != '')&&($perfil != '*')){$where = " WHERE rmb_perf_id = $perfil";}
	else{$where = "";}
	$partidos = "";
	$sql = ("SELECT rmb_residente_id, rmb_residente_nom, rmb_residente_ape, rmb_residente_email, rmb_carg_id, rmb_tdoc_id, rmb_residente_doc, rmb_residente_dir, rmb_residente_tel, rmb_residente_cel, rmb_residente_obs, rmb_residente_foto FROM rmb_residente $where");
	//echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### muestra el select de los Cargos para ser seleccionado o marca el que ya se a seleccionado ############
function CargosResidente($id_cargo){
	if($id_cargo != '*'){$where = " WHERE rmb_carg_id = $id_cargo ";}
	else{$where = "";}
	$sql = ("SELECT * FROM rmb_carg ".$where." ORDER BY rmb_carg_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_carg_id"  id="rmb_carg_id">
		<option value="" <?php if($id_cargo == '*'){echo ' selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($id_cargo == $array[0]){echo ' selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### muestra el select de los Perfiles para ser seleccionado o marca el que ya se a seleccionado ############
function PerfilResidente($id_perfil){
	if($id_perfil != '*'){$where = " WHERE rmb_perf_id = $id_perfil ";}
	else{$where = "";}
	$sql = ("SELECT * FROM rmb_perf ".$where." ORDER BY rmb_perf_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_perf_id"  id="rmb_perf_id">
		<option value="" <?php if($id_perfil == '*'){echo ' selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($id_perfil == $array[0]){echo ' selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### muestra el select de los Tipos de Documento para ser seleccionado o marca el que ya se a seleccionado ############
function TipoDocResidente($id_tdoc){
	if($id_tdoc != '*'){$where = " WHERE rmb_tdoc_id = $id_tdoc ";}
	else{$where = "";}
	$sql = ("SELECT * FROM rmb_tdoc ".$where." ORDER BY rmb_tdoc_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_tdoc_id"  id="rmb_tdoc_id">
		<option value="" <?php if($id_tdoc == '*'){echo ' selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($id_tdoc == $array[0]){echo ' selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### muestra el select de los Estados para ser seleccionado o marca el que ya se a seleccionado ############
function EstadoResidente($id_est){
	$sql = ("SELECT * FROM rmb_est ORDER BY rmb_est_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_est_id"  id="rmb_est_id">
		<option value="" <?php if($id_est == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($id_est == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### Trae los datos de los usuarios y devuelve el query ###########
function Documentos($doc){
	if(($doc != '')&&($doc != '*')){$where = " WHERE rmb_cdoc_id = $doc";}
	else{$where = "";}
	$partidos = "";
	$sql = ("SELECT rmb_document_id, rmb_document_nom, rmb_document_fini FROM rmb_document $where ORDER BY rmb_document_fini DESC");
	//echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### muestra el select de los Tipos de documento (actas, reglamento, etc.) para ser seleccionado en form_u ############
function TipoDocForm($id_tdoc){
	$sql = ("SELECT * FROM rmb_cdoc ORDER BY rmb_cdoc_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_cdoc_id"  id="rmb_cdoc_id">
		<option value="" <?php if($id_est == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($array[0] == $id_tdoc){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### muestra el select de los contextos (mi barrio, torre, etc.) para ser seleccionado en form_u ############
function TipoContextForm($id_cont){
	$sql = ("SELECT * FROM rmb_context ORDER BY rmb_context_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_context_id"  id="rmb_context_id">
		<option value="" <?php if($id_cont == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($array[0] == $id_cont){echo 'selected="selected"';} ?>><?php echo utf8_encode($array[1]);?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### muestra el select de los tipos de proyecto para ser seleccionado en form en master maestros ############
function TipoProyecto($id_proyecto){
  $sql = ("SELECT * FROM rmb_tproyecto ORDER BY rmb_tproyecto_nom ASC");
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="rmb_tproyecto_id"  id="rmb_tproyecto_id">
    <option value="" <?php if($id_proyecto == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($array[0] == $id_proyecto){echo 'selected="selected"';} ?>><?php echo utf8_encode($array[1]);?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### muestra el select de los tipos de proyecto para ser seleccionado en form en master maestros ############
function TipoDocumento($id_doc){
  $sql = ("SELECT * FROM rmb_tdoc ORDER BY rmb_tdoc_nom ASC");
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="rmb_tdoc_id"  id="rmb_tdoc_id">
    <option value="" <?php if($id_doc == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($array[0] == $id_doc){echo 'selected="selected"';} ?>><?php echo utf8_encode($array[1]);?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### Trae los datos del calendario y devuelve el query ###########
function Tareas($buscar){
	$busca = str_replace("\\","",$buscar);
	$partidos = "";
	$sql = ("SELECT d.rmb_calendario_id, d.rmb_calendario_nom, d.rmb_calendario_desc, d.rmb_calendario_fini, d.rmb_est_id FROM rmb_calendario d $busca");
	//echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### Trae los datos de los usuarios y devuelve el query ###########
function NumObsTareas($tarea){
	$partidos = 0;
	$sql="SELECT count(rmb_obs_cal_id) FROM rmb_obs_cal WHERE rmb_calendario_id = $tarea";
	//echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
    	if(mysql_num_rows($query) > 0){
    		$row_query = mysql_fetch_array($query);
    		$partidos = $row_query[0];
    	}
	}
	return $partidos;
}
########### muestra el select de los Modulos para ser seleccionado o marca el que ya se a seleccionado ############
function Modulos($id_est){
	$sql = ("SELECT * FROM rmb_mod ORDER BY rmb_mod_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control" name="rmb_mod_id"  id="rmb_mod_id">
		<option value="" <?php if($id_est == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($id_est == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### Trae los datos de los usuarios y devuelve el query ###########
function ObsTareas($id_tarea){
	$partidos = "";
	if($id_tarea <> ''){
		$sql = ("SELECT o.rmb_obs_cal_obs, o.rmb_obs_cal_fini, r.rmb_residente_nom, r.rmb_residente_nom FROM rmb_obs_cal o LEFT JOIN rmb_residente r ON r.rmb_residente_id = o.rmb_obs_cal_user WHERE rmb_calendario_id = $id_tarea");
		//echo $sql;
		$query = mysql_query($sql, conexion());
	    if($query){
			$partidos = $query;
		}
	}
	return $partidos;
}
########### Trae los datos de los perfiles de los usuarios y devuelve el query ###########
function PerfilId($id_usu){
	$partidos = "";
	if($id_usu <> ''){
		$sql = ("SELECT p.rmb_perf_nom FROM rmb_residente r LEFT JOIN rmb_perf p ON p.rmb_perf_id = r.rmb_perf_id WHERE r.rmb_residente_id = $id_usu");
		//echo $sql;
		$query = mysql_query($sql, conexion());
	    if($query){
	    	if(mysql_num_rows($query) > 0){
	    		$row_sql = mysql_fetch_array($query);
	    		$partidos = $row_sql[0];
	    	}			
		}
	}
	return $partidos;
}
########### Trae los datos de los usuarios y devuelve las filas ###########
function ResidenteDatosId($id_usu){
	if(($id_usu <> '')&&($id_usu <> '*')){$where = " WHERE rmb_residente_id = '$id_usu'";}
	else{$where = "";}
	$partidos = "";
	$sql = ("SELECT rmb_residente_id, rmb_residente_nom, rmb_residente_ape, rmb_residente_email FROM rmb_residente $where");
	// echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
    	if(mysql_num_rows($query) > 0){
    		$partidos = mysql_fetch_array($query);
    	}		
	}	
	return $partidos;
}
########### muestra el select de los tipos de vehiculo para ser seleccionado ############
function TipoVehiculo(){
	$sql = ("SELECT * FROM rmb_tveh ORDER BY rmb_tveh_nom ASC");
	$query = mysql_query($sql, conexion());?>
	<select class="form-control input_veh" name="rmb_tveh_id" id="rmb_tveh_id">
		<option value="">Seleccione...</option><?php 
		while($array = mysql_fetch_array($query)){?>
		<option value="<?php echo $array[0]?>"><?php echo $array[1];?></option><?php
		}?>
	</select><?php
}
########### Trae los datos de los vehiculos de los usuarios y devuelve el query ###########
function Vehiculos_Usu($id_usu){
	$partidos = "";
	if($id_usu <> ''){
		$sql = ("SELECT v.rmb_veh_id, tv.rmb_tveh_nom, v.rmb_veh_placa, v.rmb_veh_marca, v.rmb_veh_nparq, v.rmb_veh_obs, v.rmb_residente_id, v.rmb_veh_fecha, v.rmb_veh_user  FROM rmb_veh v LEFT JOIN rmb_tveh tv ON tv.rmb_tveh_id = v.rmb_tveh_id WHERE v.rmb_residente_id = $id_usu");
		$query = mysql_query($sql, conexion());
	    if($query){
	    	$partidos = $query;
		}
	}
	return $partidos;
}
########### Trae los datos de los inmuebles de los usuarios y devuelve el query ###########
function Inmuebles_Usu($id_usu){
	$partidos = false;
	if($id_usu <> ''){$where = " WHERE a.rmb_residente_id = $id_usu";}
	else{$where = "";}
	$sql = ("SELECT a.rmb_aptos_id, a.rmb_aptos_nom, a.rmb_aptos_area, a.rmb_aptos_priv, a.rmb_aptos_banos, a.rmb_aptos_coc, a.rmb_aptos_hab, a.rmb_aptos_balc, a.rmb_residente_id, e.rmb_est_nom, ta.rmb_taptos_nom, a.rmb_aptos_obs, a.rmb_aptos_dir, a.rmb_aptos_tel FROM rmb_aptos a LEFT JOIN rmb_taptos ta ON ta.rmb_taptos_id = a.rmb_aptos_tipo LEFT JOIN rmb_est e ON e.rmb_est_id = a.rmb_aptos_est $where");
	$query = mysql_query($sql, conexion());
    if($query){$partidos = $query;}
	return $partidos;
}
########### muestra el select de los tipos de inmueble para ser seleccionado ############
function TipoInmueble(){
	$sql = ("SELECT * FROM rmb_taptos ORDER BY rmb_taptos_nom ASC");
	$query = mysql_query($sql, conexion());?>
	<select class="form-control input_veh" name="rmb_aptos_tipo" id="rmb_aptos_tipo">
		<option value="">Seleccione...</option><?php 
		while($array = mysql_fetch_array($query)){?>
		<option value="<?php echo $array[0]?>"><?php echo $array[1];?></option><?php
		}?>
	</select><?php
}
########### muestra el select de los Estados para ser seleccionado o marca el que ya se a seleccionado ############
function Estados($id_est, $mod){
	if($mod <> ''){$where = " WHERE rmb_est_mod = $mod ";}
	else{$where = "";}
	$sql = ("SELECT * FROM rmb_est $where ORDER BY rmb_est_nom ASC");
	$query = mysql_query($sql, conexion());
	$array=mysql_fetch_array($query);
	?>
	<select class="form-control input_veh" name="rmb_est_id"  id="rmb_est_id">
		<option value="" <?php if($id_est == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
		<?php do {  ?>
			<option value="<?php echo $array[0];?>" <?php if($id_est == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
		<?php } while ($array = mysql_fetch_array($query));
			$rows = mysql_num_rows($query);
			if($rows > 0) {
			  mysql_data_seek($query, 0);
			  $array = mysql_fetch_array($query);
			}
		?>
    </select>
	<?php
}
########### Trae los datos de los mensajes recibidos y devuelve el query ###########
function MensajesRecibidos($id_usu){
	$partidos = "";
	$sql = ("SELECT m.rmb_mens_id, (SELECT CONCAT(r.rmb_residente_nom,' ', r.rmb_residente_ape) FROM rmb_mens_dest d LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE d.rmb_mens_id = m.rmb_mens_id AND d.rmb_mens_dest_tipo = 'de' AND d.rmb_residente_id <> $id_usu) AS residente, 'r.rmb_residente_ape', m.rmb_mens_asunto, m.rmb_mens_mens, m.rmb_mens_fenv, m.rmb_mens_frec, m.rmb_est_id, m.rmb_mens_flee, r.rmb_residente_id FROM rmb_mens m LEFT JOIN rmb_mens_dest d USING(rmb_mens_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE (d.rmb_residente_id = '$id_usu') AND d.rmb_mens_dest_tipo = 'para' AND rmb_mens_pad = 0 ORDER BY m.rmb_mens_fenv DESC");
	// echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### Trae los datos de los mensajes enviados y devuelve el query ###########
function MensajesEnviados($id_usu){
  $partidos = "";
  $sql = ("SELECT m.rmb_mens_id, (SELECT GROUP_CONCAT(r.rmb_residente_nom,' ', r.rmb_residente_ape SEPARATOR ', ') FROM rmb_mens_dest d LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE d.rmb_mens_id = m.rmb_mens_id AND d.rmb_residente_id <> $id_usu) AS id_residente, 'r.rmb_residente_ape', m.rmb_mens_asunto, m.rmb_mens_mens, m.rmb_mens_fenv, m.rmb_mens_frec, m.rmb_est_id, m.rmb_mens_flee, r.rmb_residente_id FROM rmb_mens m LEFT JOIN rmb_mens_dest dest USING(rmb_mens_id) LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE dest.rmb_residente_id = '$id_usu' AND dest.rmb_mens_dest_tipo = 'de' ORDER BY m.rmb_mens_fenv DESC");
  // echo $sql;
  $query = mysql_query($sql, conexion());
    if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### muestra el select de los tipos de equipo para ser seleccionado ############
function TipoEquipo($id_eq){
	$sql = ("SELECT * FROM rmb_teq ORDER BY rmb_teq_nom ASC");
	$query = mysql_query($sql, conexion());?>
	<select class="form-control" name="rmb_teq_id" id="rmb_teq_id">
		<option value=""<?php if($id_eq == ''){echo 'selected="selected"';} ?>>Seleccione...</option><?php 
		while($array = mysql_fetch_array($query)){?>
		<option value="<?php echo $array[0]?>" <?php if($id_eq == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option><?php
		}?>
	</select><?php
}
########### Trae los datos de los equipos y devuelve el query ###########
function Equipos(){
	$partidos = "";
	$sql = ("SELECT eq.rmb_equipos_id, eq.rmb_equipos_nom, eq.rmb_equipos_marc, eq.rmb_equipos_mod, eq.rmb_equipos_fab, eq.rmb_equipos_fcom, eq.rmb_equipos_val, e.rmb_est_nom, eq.rmb_equipos_obs, eq.rmb_teq_id, eq.rmb_equipos_foto, eq.rmb_equipos_fecha, eq.rmb_equipos_user FROM rmb_equipos eq LEFT JOIN rmb_est e ON e.rmb_est_id = eq.rmb_est_id ORDER BY eq.rmb_est_id, eq.rmb_equipos_nom ASC");
	//echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### Trae los datos de los equipos por id y devuelve el query ###########
function EquiposId($id_eq){
	$partidos = "";
	$sql = ("SELECT eq.rmb_equipos_id, eq.rmb_equipos_nom, eq.rmb_equipos_marc, eq.rmb_equipos_mod, eq.rmb_equipos_fab, eq.rmb_equipos_fcom, eq.rmb_equipos_val, eq.rmb_est_id, eq.rmb_equipos_obs, eq.rmb_teq_id, eq.rmb_equipos_foto, eq.rmb_equipos_fecha, eq.rmb_equipos_user FROM rmb_equipos eq LEFT JOIN rmb_est e ON e.rmb_est_id = eq.rmb_est_id WHERE eq.rmb_equipos_id = $id_eq");
	// echo $sql;
	$query = mysql_query($sql, conexion());
    if($query){
		$partidos = $query;
	}	
	return $partidos;
}
########### Trae los datos de las facturas de los usuarios y devuelve el query ###########
function Facturas_Usu($id_usu){
	$partidos = false;
	if($id_usu <> ''){
		$sql = ("SELECT t.rmb_tesoreria_id, t.rmb_tesoreria_val, e.rmb_est_nom, t.rmb_tesoreria_fpag FROM rmb_tesoreria t LEFT JOIN rmb_est e ON e.rmb_est_id = t.rmb_est_id  WHERE t.rmb_residente_id = $id_usu ORDER BY rmb_tesoreria_fecha DESC");
		$query = mysql_query($sql, conexion());
	    if($query){
	    	$partidos = $query;
		}
	}
	return $partidos;
}
########### Trae los datos de las facturas de los usuarios y devuelve el query ###########
function DatosProyecto($id_pro){
	$partidos = false;
	if($id_pro <> ''){$where = "WHERE rmb_proyecto_id = $id_pro";}
	else{$where = "";}
	$sql = ("SELECT p.*, td.rmb_tdoc_nom FROM rmb_proyecto p LEFT JOIN rmb_tdoc td ON td.rmb_tdoc_id = p.rmb_proyecto_tdoc $where");
	$query = mysql_query($sql, conexion());
    if($query){
    	$partidos = $query;
	}
	return $partidos;
}
########### Trae los datos de las facturas de los usuarios y devuelve el query ###########
function NextID($base, $tabla){
	$partidos = "";
	$sql = ("SELECT auto_increment FROM information_schema.tables WHERE table_schema='$base' and table_name='$tabla'");
	$query = mysql_query($sql, conexion());
    if($query){
    	if(mysql_num_rows($query) > 0){
    		$row_query = mysql_fetch_array($query);
    		$partidos = $row_query[0];
    	}    	
	}
	return $partidos;
}
########### muestra el select de los tipos de pago para ser seleccionado ############
function TipoPago($id_eq, $id_name){
	$sql = ("SELECT * FROM rmb_tpago ORDER BY rmb_tpago_nom ASC");
	$query = mysql_query($sql, conexion());?>
	<select class="form-control" name="rmb_tpago_id<?php echo $id_name;?>" id="rmb_tpago_id<?php echo $id_name;?>">
		<option value=""<?php if($id_eq == ''){echo 'selected="selected"';} ?>>Seleccione...</option><?php 
		while($array = mysql_fetch_array($query)){?>
		<option value="<?php echo $array[0]?>" ope="<?php echo $array[2]?>" <?php if($id_eq == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option><?php
		}?>
	</select><?php
}
########### Trae los datos de las facturas de los usuarios y devuelve el query ###########
function Facturas_Id($id_fact){
  $partidos = false;
  if($id_fact <> ''){
    $sql = ("SELECT * FROM rmb_tesoreria WHERE rmb_tesoreria_id = $id_fact");
    $query = mysql_query($sql, conexion());
      if($query){
        $partidos = $query;
    }
  }
  return $partidos;
}
########### muestra el select de los tipos de pago para ser seleccionado ############
function FormaPago($id_fpago){
  $sql = ("SELECT * FROM rmb_fpago ORDER BY rmb_fpago_nom ASC");
  $query = mysql_query($sql, conexion());?>
  <select class="form-control" name="rmb_fpago_id" id="rmb_fpago_id">
    <option value="" <?php if($id_fpago == ''){echo 'selected="selected"';} ?>>Seleccione...</option><?php 
    while($array = mysql_fetch_array($query)){?>
    <option value="<?php echo $array[0]?>" <?php if($id_fpago == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option><?php
    }?>
  </select><?php
}
########### Trae los datos de los conceptos de la factura y devuelve el query ###########
function Concept_fact($id_fact){
  $partidos = false;
  if($id_fact <> ''){
    $sql = ("SELECT * FROM rmb_tes_concep WHERE rmb_tesoreria_id = $id_fact");
    $query = mysql_query($sql, conexion());
    if($query){
      $partidos = $query;
    }
  }
  return $partidos;
}
########### Trae los datos de las facturas de los usuarios y devuelve el query ###########
function TipoPagoId($id_tpago){
  $partidos = false;
  if($id_tpago <> ''){
    $sql = ("SELECT * FROM rmb_tpago WHERE rmb_tpago_id = $id_tpago");
    $query = mysql_query($sql, conexion());
    if($query){
      if(mysql_num_rows($query) > 0){
        $row_query = mysql_fetch_array($query);
        $partidos = $row_query;
      }
    }
  }
  return $partidos;
}
########### Trae los datos de los mantenimientos de los equipos y devuelve el query ###########
function Mantenimientos($id_equipo){
  $partidos = false;
  if($id_equipo <> ''){
    $sql = ("SELECT * FROM rmb_mant WHERE rmb_equipos_id = $id_equipo ORDER BY rmb_mant_fmant DESC");
    $query = mysql_query($sql, conexion());
    if($query){
      $partidos = $query;
    }
  }
  return $partidos;
}
########### Trae los datos del mantenimiento y devuelve el query ###########
function DatosMantenimiento($id_mantenimiento){
  $partidos = false;
  if($id_mantenimiento <> ''){
    $sql = ("SELECT * FROM rmb_mant WHERE rmb_mant_id = $id_mantenimiento ORDER BY rmb_mant_fmant DESC");
    $query = mysql_query($sql, conexion());
    if($query){
      $partidos = $query;
    }
  }
  return $partidos;
}
########### Trae el nombredel registro de la tabla solicitada y devuelve el query ###########
function Nombre_Registro($id, $tabla){
  $partidos = false;
  if(($id <> '')&&($tabla <> '')){
    $sql = ("SELECT * FROM ".$tabla." WHERE ".$tabla."_id = $id");
    $query = mysql_query($sql, conexion());
    if($query){
      if(mysql_num_rows($query) > 0){
        $row_query = mysql_fetch_array($query);        
        $partidos = $row_query[1];
      }
    }
  }
  return $partidos;
}
########### Trae los datos del calendario para el residene y devuelve el query ###########
function DatosCalendario($id_usu, $id_perfil){
  $partidos = false;
  $sql = ("SELECT * FROM rmb_calendario WHERE rmb_context_id = $id_perfil OR rmb_calendario_user = $id_usu ORDER BY rmb_calendario_fini DESC");
  // echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### muestra el select de los Estados para ser seleccionado o marca el que ya se a seleccionado ############
function TipoCalendar($id_tcal){
  $sql = ("SELECT * FROM rmb_tcal ORDER BY rmb_tcal_nom ASC");
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control input_veh" name="rmb_tcal_id"  id="rmb_tcal_id">
    <option value="" <?php if($id_tcal == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($id_tcal == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### Trae los datos del calendario para el residene y devuelve el query ###########
function DatosEvento($id_evento){
  $partidos = false;
  if($id_evento <> ''){$where = " WHERE rmb_calendario_id = $id_evento";}
  else{$where = "";}
  $sql = ("SELECT * FROM rmb_calendario $where ORDER BY rmb_calendario_fini DESC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### Trae los datos del calendario para el residene y devuelve el query ###########
function Documents($id_tdoc){
  $partidos = false;
  if($id_tdoc <> ''){$where = " AND rmb_cdoc_id = $id_tdoc";}
  else{$where = "";}
  $sql = ("SELECT * FROM rmb_document WHERE rmb_context_id = 1 AND rmb_est_id = 1 $where ORDER BY rmb_document_fini DESC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### Trae los datos del calendario para el residene y devuelve el query ###########
function Aptos_Id($id_res, $id_apto){
  $partidos = false;
  $where = "";
  if($id_res <> ''){
    $where = " WHERE rmb_residente_id = $id_res";
    if($id_apto <> ''){$where .= " AND rmb_aptos_id = $id_apto";}
  }
  else{
    if($id_apto <> ''){$where = " WHERE rmb_aptos_id = $id_apto";}
  }
  $sql = ("SELECT * FROM rmb_aptos $where ORDER BY rmb_aptos_id ASC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### Trae los datos del calendario para el residene y devuelve el query ###########
function Contac_Admin($id_perfil){
  $partidos = false;
  $where = "";
  if($id_perfil <> ''){
    // $where = "AND r.rmb_residente <> $id_perfil";
  }
  $sql = ("SELECT c.* FROM rmb_contac c LEFT JOIN rmb_residente r ON r.rmb_residente_id = c.rmb_residente_id WHERE c.rmb_context_id = 1 $where ORDER BY c.rmb_contac_titulo ASC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### Trae los datos del contacto para el residente y devuelve el query ###########
function Contac_Id($id_res){
  $partidos = false;
  $where = "";
  if($id_res <> ''){
    $where = "AND rmb_residente_id = $id_res";
  }
  $sql = ("SELECT * FROM rmb_contac WHERE rmb_context_id = 2 $where ORDER BY rmb_contac_nom ASC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### Trae los datos del calendario para el residene y devuelve el query ###########
function Tipo_Contac_Id($id_contac){
  $partidos = "";
  $where = "";
  if($id_contac <> ''){
    $where = " WHERE rmb_tcont_id = $id_contac";
  }
  $sql = ("SELECT * FROM rmb_tcont $where ORDER BY rmb_tcont_nom ASC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    if(mysql_num_rows($query) > 0){
      $row_query = mysql_fetch_array($query);
      $partidos = $row_query[2];
    }
  } 
  return $partidos;
}
########### muestra el select de los usuarios registrados en la aplicacion ############
function UserRegistrados($id_user){
  $sql = ("SELECT * FROM rmb_residente ORDER BY rmb_residente_nom ASC");
  $query = mysql_query($sql, conexion());?>
  <select class="form-control" name="rmb_residente_id" id="rmb_residente_id">
    <option value=""<?php if($id_user == ''){echo 'selected="selected"';} ?>>Seleccione...</option><?php 
    while($array = mysql_fetch_array($query)){?>
    <option value="<?php echo $array[0]?>" <?php if($id_user == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[4]." ".$array[5];?></option><?php
    }?>
  </select><?php
}
########### muestra el select de los tipos de Contacto para ser seleccionado en form_u ############
function TipoContacto($id_tcont){
  $sql = ("SELECT * FROM rmb_tcont ORDER BY rmb_tcont_nom ASC");
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="rmb_tcont_id"  id="rmb_tcont_id">
    <option value="" <?php if($id_tcont == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($array[0] == $id_tcont){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### Trae los datos del contacto por id y devuelve el query ###########
function Id_Contac($id_contac){
  $partidos = false;
  $where = "";
  if($id_contac <> ''){
    $where = " WHERE rmb_contac_id = $id_contac";
  }
  $sql = ("SELECT * FROM rmb_contac $where ORDER BY rmb_contac_nom ASC");
  //echo $sql;
  $query = mysql_query($sql, conexion());
  if($query){
    $partidos = $query;
  } 
  return $partidos;
}
########### Funcion que recorta el texto para mostrar en elemento dom ##########
function cortarTexto($texto, $numMaxCaract){
  if (strlen($texto) <  $numMaxCaract){
    $textoCortado = $texto;
  }else{
    $textoCortado = substr($texto, 0, $numMaxCaract);
    $ultimoEspacio = strripos($textoCortado, " ");
 
    if ($ultimoEspacio !== false){
      $textoCortadoTmp = substr($textoCortado, 0, $ultimoEspacio);
      if (substr($textoCortado, $ultimoEspacio)){
        $textoCortadoTmp .= '...';
      }
      $textoCortado = $textoCortadoTmp;
    }elseif (substr($texto, $numMaxCaract)){
      $textoCortado .= '...';
    }
  } 
  return $textoCortado;
}
########### muestra el select de los Modulos para ser seleccionado o marca el que ya se a seleccionado ############
function iconos($id){
  $sql = ("SELECT * FROM rmb_icono ORDER BY rmb_icono_nom ASC");
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="rmb_icono_id"  id="rmb_icono_id">
    <option value="" <?php if($id_est == ''){echo 'selected="selected"';} ?>>Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($id == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
######## trae el campo especifico de la tabla dada con el id enviado ########
function campoTabla($id, $tabla, $campo)
{
  $result = "";
  $sql = "SELECT $campo FROM $tabla WHERE ".$tabla."_id = $id";
  $query = mysql_query($sql, conexion());
  if($query){
    if(mysql_num_rows($query) > 0){
      $row_query = mysql_fetch_array($query);
      $partidos = $row_query[0];
    }
  } 
  return $partidos;
}
### Consultar registros de un valor en un campo de una tabla dada ###
function registroCampo($tabla, $campos, $where, $group, $order)
{
  $result = false;
  $sql = "SELECT $campos FROM $tabla $where $group $order";
  // echo $sql."<br />";
  $query = mysql_query($sql, conexion());
  if($query){
    $result = $query;
  }
  return $result;
}
########### muestra un menu lista para ser seleccionado ############
function campoSelect($tdoc, $tabla, $deshabilitar = "")
{
  $sql = "SELECT * FROM $tabla ORDER BY ".$tabla."_nom ASC";
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="<?php echo $tabla.'_id';?>"  id="<?php echo $tabla.'_id';?>" <?php echo $deshabilitar;?>>
    <option value="" <?php if($tdoc == ''){echo 'selected="selected"';} ?> >Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($tdoc == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### muestra el select de los usuarios registrados segun parametro enviado para ser seleccionado ############
function campoSelectMaster($tabla, $id, $campos, $where, $group, $order, $deshabilitar = ""){
  $sql = "SELECT $campos FROM $tabla $where $group $order";
  // echo $sql;
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  if($tabla == 'rmb_parq p'){
    $name = "rmb_parq_id";
  }
  elseif($tabla == 'rmb_zonas z'){
    $name = "rmb_zonas_id";
  }
  elseif($tabla == 'rmb_depos d'){
    $name = "rmb_depos_id";
  }
  elseif(($tabla == 'rmb_residente para') || ($tabla == 'rmb_residente residente')){
    $name = "rmb_residente_id";
  }
  else{
    $name = $tabla."_id";
  }
  ?>
  <select name="<?php echo $name;?>"  id="<?php echo $name;?>" class="form-control" alt="Seleccione una opción" title="Seleccione una opción" <?php echo $deshabilitar;?>>
    <option value="" <?php if($id == ''){echo 'selected="selected"';} ?> >Seleccione...</option><?php 
    do { 
      $value = $array[0];
      if(($tabla == 'rmb_parq p') || ($tabla == 'rmb_depos d')){
        // $valor = "Nº ".$array[1]." - ".$array[2]." - ".$array[3];
        $valor = $array[1];
      }
      elseif($tabla == 'rmb_zonas z'){
        $valor = $array[2]." ".$array[1];
      }
      elseif($tabla == 'rmb_residente para'){
        $valor = $array[1]." - ".$array[2]." ".$array[3];
      }
      elseif($tabla == 'rmb_residente residente'){
        $valor = $array[1]." ".$array[2];
      }
      elseif($tabla == 'rmb_tesoreria'){
        $fechapago = $array[1];
        $valor = date('Y', strtotime($array[1]))." - ".mesesLetras(date('m', strtotime($array[1])));
      }
      else{
        $valor = $array[1];
      }
      // mb_strtoupper(utf8_encode($valor))
      if(mysql_num_rows($query) > 0){?>
        <option value="<?php echo $value;?>" <?php if(($id == $value) && ($id <> '')){echo 'selected="selected"';} ?>><?php echo utf8_encode(ucwords(strtolower(utf8_decode($valor))));?></option><?php 
      }
    } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
########### Realiza la consulta a la base de datos para traer el tipo de documento correspondiente ###########
function DocumentoTipoSQL($orden, $asc, $tipo) {
  $ordenar = "";
  $where = "";
  $partidos = "";
  if (($orden != '') && ($orden != '*')) {
      $ordenar = " ORDER BY $orden $asc";
  }
  if($tipo <> ''){
    $where = "WHERE rmb_cdoc_id = '$tipo'";
  }

  $sql = ("SELECT rmb_document_id, rmb_document_nom, rmb_document_desc,rmb_document_fini,rmb_document_img FROM `rmb_document` $where");
  //  echo $sql;
  $query = mysql_query($sql, conexion());
  if ($query) {
      $partidos = $query;
  }
  return $partidos;
}
########### muestra el select de los Tipos de documento (actas, reglamento, etc.) para ser seleccionado en perfil Administrador ############
function DocumentoTipo($tipo) {
  $res_val = DocumentoTipoSQL("rmb_document_nom", "ASC", $tipo);
  // Tabla Estado Propietario
  if ($res_val) {
    if (mysql_num_rows($res_val) > 0) {?>
      <table class="table table-hover" id="tabla">
        <tfoot style="display: table-header-group;">
          <tr>
            <th></th>
            <th class="hidden-xs hidden-sm"></th>
            <th class="hidden-xs"></th>
          </tr>
        </tfoot>
        <thead>
          <tr>
            <th class="col-xs-8 col-sm-6 col-md-3 col-lg-3 text-nowrap">Nombre</th>
            <th class="hidden-xs hidden-sm col-md-4 col-lg-5 text-nowrap">Descripción</th>
            <th class="hidden-xs col-sm-3 col-md-2 col-lg-1 text-nowrap">Fecha</th>
            <th class="col-xs-4 col-sm-3 col-md-3 col-lg-3"></th>
          </tr>
        </thead>
        <tbody><?php
          for ($i = 0; $i < mysql_num_rows($res_val); $i++) {
            list($id[$i], $nombre[$i], $descripcion[$i], $fecha[$i], $acta[$i]) = mysql_fetch_array($res_val);
            $perfil = PerfilId($id[$i]);
            echo "<tr>
            <td class='text-nowrap'>" . $nombre[$i] . "</td>
            <td class='text-nowrap'>" . $descripcion[$i] . "</td>
            <td class='hidden-xs text-nowrap'>" . $fecha[$i] . "</td>
            <td class='text-nowrap' name='".$id[$i]."'>
              <a href='".$acta[$i]."' target='_blank' title='Descargar'><button type='button' class='btn btn-default'><i class='glyphicon glyphicon-save'></i></button></a>
              <button type='button' class='btn btn-info' title='Ver'><i class='glyphicon glyphicon-eye-open'></i></button>
              <button type='button' class='btn btn-success' title='Editar'><i class='glyphicon glyphicon-pencil'></i></button>
              <button type='button' class='btn btn-danger' title='Eliminar'><i class='glyphicon glyphicon-remove'></i></button>
            </td>
            </tr>";
          }
    }
    else {?>
      <table style='width:100%;margin:auto;z-index:103;' id='tabla'><tr><td class='datos-tabla' colspan='5'>No hay registros</span></td></tr></table><?php 
    }
  }
  else {?>
    <table style='width:100%;margin:auto;z-index:103;' id='tabla'><tr><td class='datos-tabla' colspan='5'>Error en la consulta</span></td></tr></table><?php 
  }?>
  </tbody>
  </table><?php
}
########### muestra el select de los Tipos de documento (actas, reglamento, etc.) para ser seleccionado en perfil residente ############
function DocumentoTipo2($tipo) {
  $res_val = DocumentoTipoSQL("rmb_document_nom", "ASC", $tipo);
  // Tabla Estado Propietario
  if ($res_val) {
    if (mysql_num_rows($res_val) > 0) {?>
      <table style='width:100%;margin:auto;z-index:103;' id='tabla'>
        <tfoot style="display: table-header-group;">
          <tr>
            <th></th>
            <th class="hidden-xs hidden-sm"></th>
            <th class="hidden-xs"></th>
          </tr>
        </tfoot>
        <thead>
          <tr>
            <th class="col-xs-9 col-sm-6 col-md-3 col-lg-3">Nombre</th>
            <th class="hidden-xs hidden-sm col-md-5 col-lg-6">Descripción</th>
            <th class="hidden-xs col-sm-4 col-md-2 col-lg-1">Fecha</th>
            <th class="col-xs-3 col-sm-2 col-md-2 col-lg-2"></th>
          </tr>
        </thead>
        <tbody><?php
          for ($i = 0; $i < mysql_num_rows($res_val); $i++) {
            list($id[$i], $nombre[$i], $descripcion[$i], $fecha[$i], $acta[$i]) = mysql_fetch_array($res_val);
            $perfil = PerfilId($id[$i]);
            echo "<tr>
            <td class='text-nowrap'>" . $nombre[$i] . "</td>
            <td class='text-nowrap'>" . $descripcion[$i] . "</td>
            <td class='hidden-xs text-nowrap'>" . $fecha[$i] . "</td>
            <td class='text-nowrap' name='".$id[$i]."'>
              <a href='".$acta[$i]."' target='_blank' title='Descargar'><button type='button' class='btn btn-default'><i class='glyphicon glyphicon-save'></i></button></a>
              <button type='button' class='btn btn-info' title='Ver'><i class='glyphicon glyphicon-eye-open'></i></button>
            </td>
            </tr>";
          }
    }
    else {
      $table .= "<tr><td class='datos-tabla' colspan='5'>No hay registros</span></td></tr>";
    }
  }
  else {
    $table .= "<tr><td class='datos-tabla' colspan='5'>Error en la consulta</span></td></tr>";
  }?>
  </tbody>
</table><?php
}
########### Trae los datos de los contactos y devuelve el query ###########
function nombreCampo($id, $tabla){
  $result = "";
  if(($id <> '') && ($tabla <> '')){
    $sql = ("SELECT ".$tabla."_nom FROM ".$tabla." WHERE ".$tabla."_id = '".$id."' ORDER BY ".$tabla."_nom ASC");
    //echo $sql;
    $query = mysql_query($sql, conexion());
    if($query){
      if(mysql_num_rows($query) > 0){
        $row = mysql_fetch_array($query);
        $result = $row[0];
      }
    }
  }
  else{$result = "Sin información";}
  return $result;
}
########### muestra un menu lista de los estado dependiendo del modulo al que es llamado para ser seleccionado ############
function campoSelectEst($tdoc, $tabla, $mod, $deshabilitar = ""){
  $sql = "SELECT * FROM $tabla WHERE ".$tabla."_mod = '$mod' ORDER BY ".$tabla."_nom ASC";
  // echo $sql;
  $query = mysql_query($sql, conexion());
  $array=mysql_fetch_array($query);
  ?>
  <select class="form-control" name="<?php echo $tabla.'_id';?>"  id="<?php echo $tabla.'_id';?>" <?php echo $deshabilitar;?>>
    <option value="" <?php if($tdoc == ''){echo 'selected="selected"';} ?> >Seleccione...</option>
    <?php do {  ?>
      <option value="<?php echo $array[0];?>" <?php if($tdoc == $array[0]){echo 'selected="selected"';} ?>><?php echo $array[1];?></option>
    <?php } while ($array = mysql_fetch_array($query));
      $rows = mysql_num_rows($query);
      if($rows > 0) {
        mysql_data_seek($query, 0);
        $array = mysql_fetch_array($query);
      }
    ?>
    </select>
  <?php
}
// funcion que devuelve los dias en letras 3
function diasTodos($ndia)
{
  $dias = array("", "Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
  $dia = $dias[$ndia];
  return $dia;
}
// funcion que devuelve los mese en letras todas
function mesesLetras($nmes)
{
  $meses = array("", "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  $mes = $meses[(int) $nmes];
  return $mes;
}
// funcion que devuelve una imagen en base 64 default para cuando no tiene imagen o foto los registros
function imagenDefault()
{
  $src = "../images/noimage.png";
  return $src;
}
// funcion para calcular edad
function calculaedad($fechanac){
  list($ano,$mes,$dia) = explode("-", $fechanac);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
}
// Funcion que realiza la consulta a tota la información de un apartamento y calcula el porcentaje de llenado de cada formulario y totaliza los porcentajes para colocar un color de estado general al boton de detalle apto en la lista de apartamentos.
function estadoApto($id_apto)
{
  if($id_apto){
    $num_pest = 0;
    $total_pestana = 0;
    $total_pest = 0;
    $num_pest = 0;
    $total_porc_apto = 0;
    // Datos del apartamento
    $res_apto = registroCampo("rmb_aptos a", "a.rmb_aptos_nom, a.rmb_torres_id, a.rmb_taptos_id, a.rmb_aptos_tel, a.rmb_aptos_area, a.rmb_aptos_priv, a.rmb_aptos_banos, a.rmb_aptos_hab, a.rmb_aptos_balc, a.rmb_aptos_inm, a.rmb_aptos_habita, a.rmb_aptos_parq, a.rmb_aptos_dep, a.rmb_aptos_coef, a.rmb_aptos_terr, a.rmb_aptos_vul, a.rmb_aptos_banco, a.rmb_aptos_serv, a.rmb_aptos_est, a.rmb_aptos_propio, a.rmb_aptos_numhab, a.rmb_aptos_masc, a.rmb_aptos_arrend", "WHERE a.rmb_aptos_id = '$id_apto'", "", "");
    if($res_apto){
      if(mysql_num_rows($res_apto) > 0){
        $row_apto = mysql_fetch_array($res_apto);
        if($row_apto[0] <> ''){$total_porc_apto += 4.55;$nom_apto = $row_apto[0];}
        if($row_apto[1] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[2] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[3] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[4] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[5] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[6] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[7] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[8] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[9] <> ''){$total_porc_apto += 4.55;$apto_inm = $row_apto[9];}
        if($row_apto[10] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[11] <> ''){$total_porc_apto += 4.55;$apto_parq = $row_apto[11];}
        if($row_apto[12] <> ''){$total_porc_apto += 4.55;$apto_dep = $row_apto[12];}
        if($row_apto[13] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[14] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[15] <> ''){$total_porc_apto += 4.55;$apto_vul = $row_apto[15];}
        if($row_apto[16] <> ''){$total_porc_apto += 4.55;$apto_banco = $row_apto[16];}
        if($row_apto[17] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[18] <> ''){$total_porc_apto += 4.55;}
        if($row_apto[19] <> ''){$total_porc_apto += 4.55;$apto_propio = $row_apto[19];}
        $num_hab = $row_apto[20];
        if($row_apto[21] <> ''){$total_porc_apto += 4.55;$apto_masc = $row_apto[21];}
        if($row_apto[22] <> ''){$total_porc_apto += 4.55;$apto_arrend = $row_apto[22];}
      }
    }
    // Datos de los residentes y otros
    $res_resd = registroCampo("rmb_residente_x_aptos rxa", "rxa.rmb_tres_id, r.rmb_residente_nom, r.rmb_residente_ape, r.rmb_residente_doc, r.rmb_residente_dir, r.rmb_residente_tel, r.rmb_residente_cel, r.rmb_residente_pass, r.rmb_residente_email, r.rmb_residente_fnac, r.rmb_residente_nom2, r.rmb_residente_obs, r.rmb_residente_fini, r.rmb_residente_ffin, r.rmb_residente_foto, r.rmb_gen_id, r.rmb_residente_hijo, r.rmb_residente_vive, r.rmb_residente_perm, r.rmb_perf_id, r.rmb_carg_id, r.rmb_vinculo_id, r.rmb_tdoc_id, r.rmb_est_id, r.rmb_residente_cert, r.rmb_residente_fcert", "LEFT JOIN rmb_residente r USING(rmb_residente_id) WHERE rxa.rmb_aptos_id = '$id_apto' AND (rxa.rmb_tres_id = 1 OR rxa.rmb_tres_id = 2 OR rxa.rmb_tres_id = 3 OR rxa.rmb_tres_id = 5 OR rxa.rmb_tres_id = 6 OR rxa.rmb_tres_id = 7 OR rxa.rmb_tres_id = 8 OR rxa.rmb_tres_id = 9)", "", "");
    $total_porc_prop = 0;
    $total_porc_hab  = 0;
    $total_porc_arren = 0;
    $total_porc_serv = 0;
    $total_porc_ban = 0;
    $total_porc_aut = 0;
    $total_porc_inm = 0;
    $total_porc_emer = 0;
    $total_porc_veh = 0;
    $total_porc_masc = 0;
    $total_porc_parq = 0;
    $total_porc_dep = 0;
    $total_porc_vuln = 0;
    if($res_resd){
      if(mysql_num_rows($res_resd) > 0){
        while($row_resd = mysql_fetch_array($res_resd)){
          // Propietario
          if($row_resd[0] == 1){
            $num_prop += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_prop += 5.9;}
            // Apellidos
            if($row_resd[2] <> ''){$total_porc_prop += 5.9;}
            // Numero documento
            if($row_resd[3] <> ''){$total_porc_prop += 5.9;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_prop += 5.9;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_prop += 5.9;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_prop += 5.9;}
            // Password
            if($row_resd[7] <> ''){$total_porc_prop += 5.9;}
            // Email
            if($row_resd[8] <> ''){$total_porc_prop += 5.9;}
            // Fecha nacimiento
            if($row_resd[9] <> ''){$total_porc_prop += 5.9;}
            // Razon social
            // Observación
            // Fecha Inicial
            // Fecha final
            // Foto
            // Genero
            if($row_resd[15] <> ''){$total_porc_prop += 5.9;}
            // hijo
            if($row_resd[16] <> ''){$total_porc_prop += 5.9;}
            // Vive
            if($row_resd[17] <> ''){
              $prop_vive = $row_resd[17];
              $total_porc_prop += 5.9;
              if($prop_vive == 1){
                // Nombres
                if($row_resd[1] <> ''){$total_porc_hab += 11.2;}
                // Apellidos
                if($row_resd[2] <> ''){$total_porc_hab += 11.2;}
                // Numero documento
                if($row_resd[3] <> ''){$total_porc_hab += 11.2;}
                // Fecha nacimiento
                if($row_resd[9] <> ''){$total_porc_hab += 11.2;}
                // Genero
                if($row_resd[15] <> ''){$total_porc_hab += 11.2;}
                // hijo
                if($row_resd[16] <> ''){$total_porc_hab += 11.2;}
                // Vinculo
                if($row_resd[21] <> ''){$total_porc_hab += 11.2;}
                // Tipo documento
                if($row_resd[22] <> ''){$total_porc_hab += 11.2;}
                // Estado
                if($row_resd[23] <> ''){$total_porc_hab += 11.2;}
              }
            }
            // Permisos
            // Perfil
            if($row_resd[19] <> ''){$total_porc_prop += 5.9;}
            // Cargo
            // Vinculo
            // Tipo documento
            if($row_resd[22] <> ''){$total_porc_prop += 5.9;}
            // Estado
            if($row_resd[23] <> ''){$total_porc_prop += 5.9;}
            // Certificado de tradicion
            if($row_resd[24] <> ''){$total_porc_prop += 5.9;}
            // Fecha certificado de tradición
            if($row_resd[25] <> ''){$total_porc_prop += 5.9;}
          }
          // Residente / Habitantes
          if($row_resd[0] == 2){
            // Nombres
            if($row_resd[1] <> ''){$total_porc_hab += 11.2;}
            // Apellidos
            if($row_resd[2] <> ''){$total_porc_hab += 11.2;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_hab += 11.2;}
            // fecha nacimiento
            if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_hab += 11.2;}
            // Genero
            if($row_resd[15] <> ''){$total_porc_hab += 11.2;}
            // tiene hijos
            if($row_resd[16] <> ''){$total_porc_hab += 11.2;}
            // Vínculo
            if($row_resd[21] <> ''){$total_porc_hab += 11.2;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_hab += 11.2;}
            // estado
            if($row_resd[23] <> ''){$total_porc_hab += 11.2;}
          }
          // Arrendatario
          if($row_resd[0] == 3){
            $num_arren += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_arren += 6.7;}
            // Apellidos
            if($row_resd[2] <> ''){$total_porc_arren += 6.7;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_arren += 6.7;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_arren += 6.7;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_arren += 6.7;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_arren += 6.7;}
            // Email
            if($row_resd[8] <> ''){$total_porc_arren += 6.7;}
            // fecha nacimiento
            if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_arren += 6.7;}
            // Genero
            if($row_resd[15] <> ''){$total_porc_arren += 6.7;}
            // tiene hijos
            if($row_resd[16] <> ''){$total_porc_arren += 6.7;}
            // Vive en el apto
            if($row_resd[17] <> ''){$total_porc_arren += 6.7;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_arren += 6.7;}
            // estado
            if($row_resd[23] <> ''){$total_porc_arren += 6.7;}
          }
          // Empleados Servicio
          if($row_resd[0] == 5){
            $num_serv += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_serv += 6.7;}
            // Apellidos
            if($row_resd[2] <> ''){$total_porc_serv += 6.7;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_serv += 6.7;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_serv += 6.7;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_serv += 6.7;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_serv += 6.7;}
            // Email
            if($row_resd[8] <> ''){$total_porc_serv += 6.7;}
            // fecha nacimiento
            if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_serv += 6.7;}
            // Foto
            if($row_resd[14] <> ''){$total_porc_serv += 6.7;}
            // Genero
            if($row_resd[15] <> ''){$total_porc_serv += 6.7;}
            // Vive en el apto
            if($row_resd[17] <> ''){
              $serv_vive = $row_resd[17];
              $total_porc_serv += 6.7;
              if($serv_vive == 1){
                // Nombres
                if($row_resd[1] <> ''){$total_porc_hab += 11.2;}
                // Apellidos
                if($row_resd[2] <> ''){$total_porc_hab += 11.2;}
                // Numero documento
                if($row_resd[3] <> ''){$total_porc_hab += 11.2;}
                // Fecha nacimiento
                if($row_resd[9] <> ''){$total_porc_hab += 11.2;}
                // Genero
                if($row_resd[15] <> ''){$total_porc_hab += 11.2;}
                // hijo
                if($row_resd[16] <> ''){$total_porc_hab += 11.2;}
                // Vinculo
                if($row_resd[21] <> ''){$total_porc_hab += 11.2;}
                // Tipo documento
                if($row_resd[22] <> ''){$total_porc_hab += 11.2;}
                // Estado
                if($row_resd[23] <> ''){$total_porc_hab += 11.2;}
              }
            }
            // Pasado Judicial
            if($row_resd[18] <> ''){$total_porc_serv += 6.7;}
            // cargo
            if($row_resd[20] <> ''){$total_porc_serv += 6.7;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_serv += 6.7;}
            // estado
            if($row_resd[23] <> ''){$total_porc_serv += 6.7;}
          }
          // Bancos
          if($row_resd[0] == 6){
            $num_ban += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_ban += 8.4;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_ban += 8.4;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_ban += 8.4;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_ban += 8.4;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_ban += 8.4;}
            // Password
            if($row_resd[7] <> ''){$total_porc_ban += 8.4;}
            // Email
            if($row_resd[8] <> ''){$total_porc_ban += 8.4;}
            // Razon Social
            if($row_resd[10] <> ''){$total_porc_ban += 8.4;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_ban += 8.4;}
            // estado
            if($row_resd[23] <> ''){$total_porc_ban += 8.4;}
            // Certificado de tradición
            if($row_resd[24] <> ''){$total_porc_ban += 8.4;}
            // Fecha de certificado
            if($row_resd[25] <> ''){$total_porc_ban += 8.4;}
          }
          // Autorizadas
          if($row_resd[0] == 7){
            $num_aut += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_aut += 8.4;}
            // Apellidos
            if($row_resd[2] <> ''){$total_porc_aut += 8.4;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_aut += 8.4;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_aut += 8.4;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_aut += 8.4;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_aut += 8.4;}
            // Email
            if($row_resd[8] <> ''){$total_porc_aut += 8.4;}
            // fecha nacimiento
            if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_aut += 8.4;}
            // Foto
            if($row_resd[14] <> ''){$total_porc_aut += 8.4;}
            // Genero
            if($row_resd[15] <> ''){$total_porc_aut += 8.4;}
            // Vinculo
            if($row_resd[21] <> ''){$total_porc_aut += 8.4;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_aut += 8.4;}
          }
          // Inmobiliarias
          if($row_resd[0] == 8){
            $num_inm += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_inm += 11.2;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_inm += 11.2;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_inm += 11.2;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_inm += 11.2;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_inm += 11.2;}
            // Email
            if($row_resd[8] <> ''){$total_porc_inm += 11.2;}
            // Razon Social
            if($row_resd[10] <> ''){$total_porc_inm += 11.2;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_inm += 11.2;}
            // estado
            if($row_resd[23] <> ''){$total_porc_inm += 11.2;}
          }
          // Emergencia
          if($row_resd[0] == 9){
            $num_emer += 1;
            // Nombres
            if($row_resd[1] <> ''){$total_porc_emer += 7.7;}
            // Apellidos
            if($row_resd[2] <> ''){$total_porc_emer += 7.7;}
            // Numero Documento
            if($row_resd[3] <> ''){$total_porc_emer += 7.7;}
            // Direccion
            if($row_resd[4] <> ''){$total_porc_emer += 7.7;}
            // Telefono
            if($row_resd[5] <> ''){$total_porc_emer += 7.7;}
            // Celular
            if($row_resd[6] <> ''){$total_porc_emer += 7.7;}
            // Email
            if($row_resd[8] <> ''){$total_porc_emer += 7.7;}
            // fecha nacimiento
            if(($row_resd[9] <> '') && ($row_resd[9] <> '0000-00-00')){$total_porc_emer += 7.7;}
            // Genero
            if($row_resd[15] <> ''){$total_porc_emer += 7.7;}
            // Vive en el apto
            if($row_resd[17] <> ''){$total_porc_emer += 7.7;}
            // Vinculo
            if($row_resd[21] <> ''){$total_porc_emer += 7.7;}
            // tipo de documento
            if($row_resd[22] <> ''){$total_porc_emer += 7.7;}
            // estado
            if($row_resd[23] <> ''){$total_porc_emer += 7.7;}
          }
        }
      }
    }
    // Datos de los vehiculos
    $res_veh = registroCampo("rmb_veh v", "v.rmb_veh_placa, v.rmb_veh_marca, v.rmb_veh_mod, v.rmb_veh_color, v.rmb_tveh_id", "WHERE v.rmb_aptos_id = '$id_apto'", "", "");
    if($res_veh){
      if(mysql_num_rows($res_veh) > 0){
        while ($row_veh = mysql_fetch_array($res_veh)) {
          $num_veh += 1;
          if($row_veh[0] <> ''){$total_porc_veh += 20;}
          if($row_veh[1] <> ''){$total_porc_veh += 20;}
          if($row_veh[2] <> ''){$total_porc_veh += 20;}
          if($row_veh[3] <> ''){$total_porc_veh += 20;}
          if($row_veh[4] <> ''){$total_porc_veh += 20;}
        }
      }
    }
    // Datos de las mascotas
    $res_masc = registroCampo("rmb_mascotas m", "m.rmb_mascotas_nom, m.rmb_mascotas_raza, m.rmb_mascotas_vac, m.rmb_tmascotas_id, m.rmb_mascotas_aplica", "WHERE m.rmb_aptos_id = '$id_apto'", "", "");
    if($res_masc){
      if(mysql_num_rows($res_masc) > 0){
        while ($row_masc = mysql_fetch_array($res_masc)) {
          $num_masc += 1;
          if($row_masc[4] == 0){$val_porc = 34;}
          else{$val_porc = 25;if($row_masc[2] <> ''){$total_porc_masc += 25;}}
          if($row_masc[0] <> ''){$total_porc_masc += 25;}
          if($row_masc[1] <> ''){$total_porc_masc += 25;}
          if($row_masc[3] <> ''){$total_porc_masc += 25;}
        }
      }
    }
    // Datos de los parqueaderos
    $res_parq = registroCampo("rmb_parq p", "p.rmb_parq_nom", "WHERE p.rmb_aptos_id = '$id_apto'", "", "");
    if($res_parq){
      if(mysql_num_rows($res_parq) > 0){
        while ($row_parq = mysql_fetch_array($res_parq)) {
          $num_parq += 1;
          if($row_parq[0] <> ''){$total_porc_parq += 100;}
        }
      }
    }
    // Datos de los depositos
    $res_dep = registroCampo("rmb_depos d", "d.rmb_depos_nom", "WHERE d.rmb_aptos_id = '$id_apto'", "", "");
    if($res_dep){
      if(mysql_num_rows($res_dep) > 0){
        while ($row_dep = mysql_fetch_array($res_dep)) {
          $num_dep += 1;
          if($row_dep[0] <> ''){$total_porc_dep += 100;}
        }
      }
    }
    // Datos de las vulnerabilidades
    $res_vuln = registroCampo("rmb_vulnera v", "v.rmb_tvulnera_id, v.rmb_vulnera_obs", "WHERE v.rmb_aptos_id = '$id_apto'", "", "");
    if($res_vuln){
      if(mysql_num_rows($res_vuln) > 0){
        while ($row_vuln = mysql_fetch_array($res_vuln)) {
          $num_vuln += 1;
          if($row_vuln[0] <> ''){$total_porc_vuln += 50;}
          if($row_vuln[1] <> ''){$total_porc_vuln += 50;}
        }
      }
    }

    // porcentaje total apartamento
    if($total_porc_apto >= 0){
      $num_pest += 1;
      // Si el porcentaje de completado de la informacion del apartamento esta al 100% o mayor hace esto
      if($total_porc_apto >= 100){$total_porc_apto = 100;}
      $total_pest += $total_porc_apto;
    }
    // Si el apto es propio hace esto
    if($apto_propio > 0){
      $num_pest += 1;
      // Porcentaje total propietario
      if($total_porc_prop > 0){
        if($num_prop > 0){
          $total_porc_prop = round($total_porc_prop / $num_prop);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_prop >= 100){$total_porc_prop = 100;}
        $total_pest += $total_porc_prop;
      }
    }
    // Si esta habitado hace esto
    if($num_hab > 0){
      $num_pest += 1;
      // Porcentaje total habitantes
      if($total_porc_hab > 0){
        $total_porc_hab = round($total_porc_hab / $num_hab);
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_hab >= 100){$total_porc_hab = 100;}
        $total_pest += $total_porc_hab;
      }
    }
    // Si esta arrendado hace esto
    if($apto_arrend > 0){
      $num_pest += 1;
      // Porcentaje total arrendatario
      if($total_porc_arren > 0){
        if($num_arren > 0){
          $total_porc_arren = round($total_porc_arren / $num_arren);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_arren >= 100){$total_porc_arren = 100;}
        $total_pest += $total_porc_arren;
      }
    }
    // Porcentaje total personal de servicio
    if($total_porc_serv >= 0){
      $num_pest += 1;
      if($num_serv > 0){
        $total_porc_serv = round($total_porc_serv / $num_serv);
      }
      // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
      if($total_porc_serv >= 100){$total_porc_serv = 100;}
      $total_pest += $total_porc_serv;
    }
    // Porcentaje total personas autorizadas
    if($total_porc_aut >= 0){
      $num_pest += 1;
      if($num_aut > 0){
        $total_porc_aut = round($total_porc_aut / $num_aut);
      }
      // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
      if($total_porc_aut >= 100){$total_porc_aut = 100;}
      $total_pest += $total_porc_aut;
    }
    // Porcentaje total en caso de emergencia
    if($total_porc_emer >= 0){
      $num_pest += 1;
      if($num_emer > 0){
        $total_porc_emer = round($total_porc_emer / $num_emer);
      }
      // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
      if($total_porc_emer >= 100){$total_porc_emer = 100;}
      $total_pest += $total_porc_emer;
    }
    // Porcentaje total vehiculos
    if($total_porc_veh >= 0){
      $num_pest += 1;
      if($num_veh > 0){
        $total_porc_veh = round($total_porc_veh / $num_veh);
      }
      // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
      if($total_porc_veh >= 100){$total_porc_veh = 100;}
      $total_pest += $total_porc_veh;
    }
    // Si tiene mascotas hace esto
    if($apto_masc > 0){
      $num_pest += 1;
      // Porcentaje total mascotas
      if($total_porc_masc > 0){
        if($num_masc > 0){
          $total_porc_masc = round($total_porc_masc / $num_masc);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_masc >= 100){$total_porc_masc = 100;}
        $total_pest += $total_porc_masc;
      }
    }
    // Si existe inmobiliaria hace esto
    if($apto_inm > 0){
      $num_pest += 1;
      // Porcentaje total inmobiliaria
      if($total_porc_inm > 0){
        if($num_inm > 0){
          $total_porc_inm = round($total_porc_inm / $num_inm);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_inm >= 100){$total_porc_inm = 100;}
        $total_pest += $total_porc_inm;
      }
    }
    // si existe banco hace esto
    if($apto_banco > 0){
      $num_pest += 1;
      // Porcentaje total bancos
      if($total_porc_ban > 0){
        if($num_ban > 0){
          $total_porc_ban = round($total_porc_ban / $num_ban);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_ban >= 100){$total_porc_ban = 100;}
        $total_pest += $total_porc_ban;
      }
    }
    // Si tiene parqueadero hace esto
    if($apto_parq > 0){
      $num_pest += 1;
      // Porcentaje total parqueaderos
      if($total_porc_parq > 0){
        if($num_parq > 0){
          $total_porc_parq = round($total_porc_parq / $num_parq);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_parq >= 100){$total_porc_parq = 100;}
        $total_pest += $total_porc_parq;
      }
    }
    // Si tiene depósito hace esto
    if($apto_dep > 0){
      $num_pest += 1;
      // Porcentaje total depositos
      if($total_porc_dep > 0){
        if($num_dep > 0){
          $total_porc_dep = round($total_porc_dep / $num_dep);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100 % hace esto
        if($total_porc_dep >= 100){$clase_dep = "";}
        $total_pest += $total_porc_dep;
      }
    }
    // si presenta vulnerabilidades hace esto
    if($apto_vul > 0){
      $num_pest += 1;
      // Porcentaje total vulnerabilidades
      if($total_porc_vuln > 0){
        if($num_vuln > 0){
          $total_porc_vuln = round($total_porc_vuln / $num_vuln);
        }
        // Si el porcentaje de completado de la informacion del propietario esta al 100% o mayor hace esto
        if($total_porc_vuln >= 100){$total_porc_vuln = 100;}
        $total_pest += $total_porc_vuln;
      }
    }
    // total todas las pestanas
    if($total_pest > 0){
      if($num_pest > 0){
        $total_pestana = round($total_pest / $num_pest);
      }
      else{
        $total_pestana = $total_pest;
      }
    }
  }
  return $total_pestana;
}













?>