<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando jquery, HTML5 y CSS - PH                                   //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$id_usu = $_SESSION['UsuID'];
if(isset($_GET['fecha_ini'])){$fecha_ini = $_GET['fecha_ini'];}
else{$fecha_ini = date('Y-m-d H:i:s');}
$read = "";
?>
<!-- Nombre de la tabla -->
<input id="nombre_tabla" type="hidden" value="rmb_calendario">
<!-- Nombre del form -->
<input id="form_pagina" type="hidden" value="">
<!-- Nombre de la pagina (contenido de la pestaña) -->
<input id="nombre_pagina" type="hidden" value="">
<!-- Nombre div donde va el contenido lista o form -->
<input id="nombre_div_lista" type="hidden" value="content_res">
<!-- Nombre de la lista o form o pagina a cargar -->
<input id="nombre_lista" type="hidden" value="calendario">
<!-- Campos del formulario -->
<input id="campos" type="hidden" value="rmb_calendario_nom,rmb_context_id,rmb_tcal_id,rmb_calendario_nom,rmb_calendario_desc,rmb_calendario_fini,rmb_calendario_ffin,rmb_est_id,rmb_calendario_img,rmb_mod_id">
<!-- Campos requeridos del formulario -->
<input id="requeridos" type="hidden" value="rmb_calendario_nom,rmb_context_id,rmb_tcal_id,rmb_calendario_nom,rmb_calendario_desc,rmb_calendario_fini,rmb_calendario_ffin,rmb_est_id,rmb_mod_id">
<div id="calendario_res">
    <p id="titulo">CALENDARIO</p>
    <p id="texto">Aquí encontrará los eventos relativos al edificio. <br /></p>
    <div id="det_eventos" class="clearfix">
        <?php 
        if(isset($_GET['id_event'])){
            $id_evento = $_GET['id_event'];
            $res_evento = DatosEvento($id_evento);
            if($res_evento){
                if(mysql_num_rows($res_evento) > 0){
                    $row_evento = mysql_fetch_array($res_evento);
                    if($row_evento[11] <> $id_usu){$read = "readonly";echo '<script>$("select").attr("disabled", "disabled");</script>';
                    }?>
                    <div id="tituloevento">
                        <div class='label_event'>Titulo</div>
                        <div class='campo_event'>
                            <input id='rmb_calendario_nom' value='<?php echo $row_evento[3];?>' <?php echo $read;?>>
                        </div>
                        <div class='label_event'>Contexto</div>
                        <div class='campo_event'>
                            <?php echo TipoContextForm($row_evento[1]);?>
                        </div>
                        <div class='label_event'>Tipo</div>
                        <div class='campo_event'>
                            <?php echo TipoCalendar($row_evento[2]);?>
                        </div>
                        <div class='label_event'>Descripción</div>
                        <div class='campo_event'>
                            <textarea name='rmb_calendario_desc' id='rmb_calendario_desc' rows='5' <?php echo $read;?> style='width:100%;'><?php echo $row_evento[4];?></textarea>
                        </div>
                        <div class='label_event'>Desde</div>
                        <div class='campo_event'>
                            <input id="rmb_calendario_fini" type="text" name="rmb_calendario_fini" class="datepicker" value="<?php if($row_evento[5] <> ''){echo $row_evento[5];}else{echo $fecha_ini;}?>" <?php echo $read;?>>
                        </div>
                        <div class='label_event'>Hasta</div>
                        <div class='campo_event'>
                            <input id="rmb_calendario_ffin" type="text" name="rmb_calendario_ffin" class="datepicker" value="<?php echo $row_evento[6];?>" <?php echo $read;?>>
                        </div>
                        <div class='label_event'>Estado</div>
                        <div class='campo_event'>
                            <?php echo Estados($row_evento[7], 2);?>
                        </div>
                        <div class='label_event'>Imagen</div>
                        <div class='campo_event'><?php 
                            if($row_evento[8] <> ''){$src = $row_evento[8];}
                            else{$src = imagenDefault();}?>
                            <img id="vistaPrevia" src="<?php echo $src;?>" width="100%"/><?php 
                            if($read == ''){?>
                                <input id="rmb_calendario_img" type="file" name="rmb_calendario_img" class="fileimagen" value="" ><?php 
                            }?>
                        </div>
                        <div class='label_event'>Módulo</div>
                        <div class='campo_event'>
                            <?php echo Modulos($row_evento[9]);?>
                        </div>
                        <div class='label_event'>Icono</div>
                        <div class='campo_event'>
                            <?php echo iconos($row_evento[18]);?>
                        </div>
                    </div>
                    <div class="bienvenida">
                        <div id="actualizar" name="actualizar" class="cal_u">Actualizar Registro</div><?php 
                }
            }
        }
        else{
            $id_evento = "";?>
            <div id="tituloevento">
                <div class='label_event'>Titulo</div>
                <div class='campo_event'>
                    <input id='rmb_calendario_nom' value='' <?php echo $read;?>>
                </div>
                <div class='label_event'>Contexto</div>
                <div class='campo_event'>
                    <?php echo TipoContextForm("");?>
                </div>
                <div class='label_event'>Tipo</div>
                <div class='campo_event'>
                    <?php echo TipoCalendar("");?>
                </div>
                <div class='label_event'>Descripción</div>
                <div class='campo_event'>
                    <textarea name='rmb_calendario_desc' id='rmb_calendario_desc' rows='5' <?php echo $read;?> style='width:100%;'></textarea>
                </div>
                <div class='label_event'>Desde</div>
                <div class='campo_event'>
                    <input id="rmb_calendario_fini" type="text" name="rmb_calendario_fini" class="datepicker" value="<?php echo $fecha_ini;?>" <?php echo $read;?>>
                </div>
                <div class='label_event'>Hasta</div>
                <div class='campo_event'>
                    <input id="rmb_calendario_ffin" type="text" name="rmb_calendario_ffin" class="datepicker" value="" <?php echo $read;?>>
                </div>
                <div class='label_event'>Estado</div>
                <div class='campo_event'>
                    <?php echo Estados("", 2);?>
                </div>
                <div class='label_event'>Imagen</div>
                <div class='campo_event'><?php 
                    $src = imagenDefault();?>
                    <img id="vistaPrevia" src="<?php echo $src;?>" width="100%"/>
                    <input id="rmb_calendario_img" type="file" name="rmb_calendario_img" class="fileimagen" value="" >
                </div>
                <div class='label_event'>Módulo</div>
                <div class='campo_event'>
                    <?php echo Modulos("");?>
                </div>
            </div>
            <div class="bienvenida">
                <div id="ingresar" name="ingresar" class="cal_u">Ingresar Registro</div><?php 
            }?>
            <div id="cancel" name="cancel" class="cal_u">Cancelar</div>
        </div>
    </div>
</div>
<!-- Campos requeridos del formulario -->
<input id="id" type="hidden" value="<?php echo $id_evento;?>">
<script type="text/javascript">
    //ampliar inputs de l calendario
    $("input").css("width", "100%");
    //ampliar select de l calendario
    $("select").css("width", "100%");
    $("select").attr("class", "");
</script>
<script type="text/javascript">
    $(function(){$(".datepicker").datetimepicker();});
    //funcion para pre cargar la imagen seleccionada en campo tipo file imagen
    function PreImagen(campo, e){
      var Lector, oFileInput = campo;
      if (oFileInput.files.length !== 0) {
         Lector = new FileReader();
         Lector.onloadend = function(e) {
            jQuery('#vistaPrevia').attr('src', e.target.result);
            jQuery('#vistaPrevia').attr('width', "100%");
            //jQuery('#vistaPrevia').attr('height', "180px");          
            };
         Lector.readAsDataURL(oFileInput.files[0]);
      }      
    }
    //Cuando se selecciona una imagen en usuario
    jQuery('.fileimagen').on('change', function(e) {
        PreImagen(this, e);
    });
    //al hacer clic en los botones del form_u.php en usuarios
    $(".cal_u").click(function(event) {
        var id_boton = $(this).attr('id');
        var tabla = $("#nombre_tabla").val();
        var form = $("#form_pagina").val();
        var pagina = $("#nombre_pagina").val();
        var div_lista = $("#nombre_div_lista").val();
        var lista = $("#nombre_lista").val();
        var campos = $("#campos").val();
        var requeridos = $("#requeridos").val();      
        var camp = campos.split(',');
        var campo_post = "";
        for(var i = 0; i < camp.length; i++){
            if(i === 0){
                if((camp[i] === 'rmb_calendario_img')||(camp[i] === tabla+'_img')){
                   var test6 = window.btoa($("#vistaPrevia").attr("src"));
                   campo_post += camp[i]+"="+test6+"";
                }
                else{
                   campo_post += camp[i]+"="+$("#"+camp[i]).val();
                }
            }
            else{
                if((camp[i] === 'rmb_calendario_img')||(camp[i] === tabla+'_img')){
                   var test6 = window.btoa($("#vistaPrevia").attr("src"));
                   campo_post += "&"+camp[i]+"="+test6;
                }
                else{
                   campo_post += "&"+camp[i]+"="+$("#"+camp[i]).val();
                }
            }
        }
        switch(id_boton){
            case 'cancel':
                $("#"+div_lista).load(lista+".php");
                return;
                break;
            case 'ingresar':
                var send_post = "ins=1&tabla="+tabla+"&"+campo_post;
                break;
            case 'actualizar':
                var id = $("#id").val();
                var send_post = "id_upd="+id+"&tabla="+tabla+"&"+campo_post;
                break;
        }
        if(requeridos.length){
            var req = requeridos.split(',');
            for (var i = 0; i < req.length; i++) {
                var valor_req = $("#"+req[i]).val();
                if(valor_req === ''){
                    alert("campo requerido");
                    $("#"+req[i]).focus();
                    return;
                }
            };
        }
        //Enviar los datos para ingresar o actualizar
        $.ajax({
            url:"../habitante/ins_cal.php",
            cache:false,
            type:"POST",
            data:send_post,
            success: function(datos){
            if(datos !== ''){
                $("#"+div_lista).load(lista+".php");
                alert(datos);
            }
            else{alert("No se pudo "+id_boton+" el registro");}
            }
        });
    });
</script>