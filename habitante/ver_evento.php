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
                            if($row_evento[8] <> ''){$src = base64_decode($row_evento[8]);}
                            else{

                                $src = "data:image/jpeg;base64,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";
                            }?>
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
                    $src = "
                    data:image/jpeg;base64,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";?>
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