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
<script type="text/javascript" src="../js/maestros.js"></script>
<!-- Campos del formulario -->
<input id="campos" type="hidden" value="rmb_calendario_nom,rmb_context_id,rmb_tcal_id,rmb_calendario_nom,rmb_calendario_desc,rmb_calendario_fini,rmb_calendario_ffin,rmb_est_id,rmb_calendario_img,rmb_mod_id">
<!-- Campos requeridos del formulario -->
<input id="requeridos" type="hidden" value="rmb_calendario_nom,rmb_context_id,rmb_tcal_id,rmb_calendario_nom,rmb_calendario_desc,rmb_calendario_fini,rmb_calendario_ffin,rmb_est_id,rmb_mod_id">
<div id="calendario_res">
    <p id="texto">Aquí encontrará los eventos, circulares y clasificados del edificio. <br /></p>
    <form enctype="multipart/form-data" class="formulario_cal">
        <div id="det_eventos" class="clearfix">
            <input id="tabla" type="hidden" name="tabla" value="rmb_calendario" >
            <?php 
            if(isset($_GET['id_event'])){
                $id_evento = $_GET['id_event'];
                $res_evento = DatosEvento($id_evento);
                if($res_evento){
                    if(mysql_num_rows($res_evento) > 0){
                        $row_evento = mysql_fetch_array($res_evento);
                        if($row_evento[17] <> $id_usu){$read = "readonly";echo '<script>$("select").attr("disabled", "disabled");</script>';}?>
                        <div id="tituloevento">
                            <div class='label_event'>Titulo</div>
                            <div class='campo_event'>
                                <input id='rmb_calendario_nom' name='rmb_calendario_nom' value='<?php echo $row_evento[3];?>' <?php echo $read;?>>
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
                                <input id="rmb_calendario_ffin" type="text" name="rmb_calendario_ffin" class="datepicker" value="<?php echo $row_evento[12];?>" <?php echo $read;?>>
                            </div>
                            <div class='label_event'>Repetir</div>
                            <div class='campo_event'><?php 
                                if($row_evento[6] <> ''){
                                    $check = "checkbox='checkbox'";
                                    $valor_ck = 1;
                                }
                                else{
                                    $check = "";
                                    $valor_ck = 0;
                                }?>
                                <input id="repetir" type="checkbox" name="repetir" value="<?php echo $valor_ck;?>" <?php echo $check;?>>
                            </div>

                            <div id="campos_repit" class='repit'>
                                <div class='label_event'>Cada</div>
                                <div class='campo_event'>
                                    <select id="rmb_calendario_cada" name="rmb_calendario_cada">
                                        <option value="" <?php if($row_evento[13] == ''){echo "selected";} ?>>Seleccione...</option>
                                        <option value="1" <?php if($row_evento[13] == '1'){echo "selected";} ?>>Día</option>
                                        <option value="2" <?php if($row_evento[13] == '2'){echo "selected";} ?>>Semana</option>
                                        <option value="3" <?php if($row_evento[13] == '3'){echo "selected";} ?>>Mes</option>
                                        <option value="4" <?php if($row_evento[13] == '4'){echo "selected";} ?>>Año</option>
                                    </select>
                                </div>
                                <div id="dias_sem" class="sem">
                                    <div class='label_event'></div>
                                    <div class='campo_event'>
                                        L <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="1" <?php echo $check;?>>&nbsp;
                                        M <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="2" <?php echo $check;?>>&nbsp;
                                        M <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="3" <?php echo $check;?>>&nbsp;
                                        J <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="4" <?php echo $check;?>>&nbsp;
                                        V <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="5" <?php echo $check;?>>&nbsp;
                                        S <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="6" <?php echo $check;?>>&nbsp;
                                        D <input name="rmb_calendario_det_cada" id="rmb_calendario_det_cada" type="checkbox" value="7" <?php echo $check;?>>
                                    </div>
                                </div>
                                <div class='label_event'>Finalizar</div>
                                <div class='campo_event'>
                                    <div>
                                        <div class='label_event'>
                                            <input id="rmb_calendario_final1" name="rmb_calendario_final" type="radio" value="1" <?php echo $check;?>> Nunca
                                        </div>
                                        <div class='campo_event'></div>
                                    </div>
                                    <div>
                                        <div class='label_event'>
                                            <input id="rmb_calendario_final2" name="rmb_calendario_final" type="radio" value="2" <?php echo $check;?>> Después de
                                        </div>
                                        <div class='campo_event'>
                                            <input id="det_final_d" name="rmb_calendario_det_final" type="number" style="width:20%;display:inline-block;" disabled="true"> repeticiones.
                                        </div>
                                    </div>
                                    <div>
                                        <div class='label_event'>
                                            <input id="rmb_calendario_final3" name="rmb_calendario_final" type="radio" value="3" <?php echo $check;?>> Fecha
                                        </div>
                                        <div class='campo_event'>
                                            <input id="det_final_f" name="rmb_calendario_det_final" type="text" style="width:50%;display:inline-block;" class="datepicker" value="<?php if($row_evento[10] >= 0){echo date('Y-m-d H:i:s');}else{echo $row_evento[10];}?>" disabled="true" >
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            
                            <div class='label_event'>Estado</div>
                            <div class='campo_event'>
                                <?php echo Estados($row_evento[13], 2);?>
                            </div>
                            <div class='label_event'>Archivo</div>
                            <div class='campo_event'>
                                <!--div para visualizar en el caso de imagen-->
                                <?php if($row_evento[14] <> ''){ ?>
                                <div class="showImage">
                                    <?php 
                                    $ext = strtolower(substr($row_evento[14], -3));
                                    if(($ext == 'jpg')||($ext == 'png')||($ext == 'gif')||($ext == 'svg')){?>
                                        <img src="<?php echo $row_evento[14]; ?>" alt="placeholder+image" width="100%" style="border:0;" title=""><?php 
                                    }
                                    else{?>
                                        <a href="<?php echo $row_evento[14];?>" target="_blank">
                                            <img src="../images/descarga.png" alt="placeholder+image" width="70px" style="background-image:-webkit-linear-gradient(270deg,rgb(40,118,24) 0%,rgb(40,118,24) 100%);border-radius:100%;border:0;" title="Descargar">
                                        </a><?php 
                                    }?>
                                </div>
                                <?php } ?>
                                <input id="rmb_calendario_img" type="file" name="rmb_calendario_img" class="fileimagen" value="" >
                                <!--div para visualizar mensajes-->
                                <div class="messages"></div>
                            </div>
                            <div class='label_event'>Módulo</div>
                            <div class='campo_event'>
                                <?php echo Modulos($row_evento[15]);?>
                            </div>
                            <div class='label_event'>Icono</div>
                            <div class='campo_event'>
                                <?php echo iconos($row_evento[18]);?>
                            </div>

                        </div>
                        <div class="bienvenida">
                            <input id="id_upd" type="hidden" name="id_upd" value="<?php echo $row_evento[0];?>" >
                            <div id="actualizar" name="actualizar" class="cal_u">Actualizar Registro</div>
                        <?php 
                    }
                }
            }
            else{
                $id_evento = "";?>
                <div id="tituloevento">
                    <div class='label_event text-right'>Titulo : </div>
                    <div class='campo_event'>
                        <input class='form-control' id='rmb_calendario_nom' name='rmb_calendario_nom' value='' <?php echo $read;?>>
                    </div>
                    <div class='label_event text-right'>Contexto : </div>
                    <div class='campo_event'>
                        <?php echo TipoContextForm("");?>
                    </div>
                    <div class='label_event text-right'>Tipo : </div>
                    <div class='campo_event'>
                        <?php echo TipoCalendar("");?>
                    </div>
                    <div class='label_event text-right'>Descripción : </div>
                    <div class='campo_event'>
                        <textarea class="form-control" name='rmb_calendario_desc' id='rmb_calendario_desc' rows='5' <?php echo $read;?> style='width:100%;'></textarea>
                    </div>
                    <div class='label_event text-right'>Desde : </div>
                    <div class='campo_event'>
                        <input class="form-control datepicker" id="rmb_calendario_fini" type="text" name="rmb_calendario_fini" value="<?php echo $fecha_ini;?>" <?php echo $read;?>>
                    </div>
                    <div class='label_event text-right'>Hasta : </div>
                    <div class='campo_event'>
                        <input class="form-control datepicker" id="rmb_calendario_ffin" type="text" name="rmb_calendario_ffin" value="" <?php echo $read;?>>
                    </div>
                    <div class='label_event text-right'>Estado : </div>
                    <div class='campo_event'>
                        <?php echo Estados("", 2);?>
                    </div>
                    <div class='label_event text-right'>Archivo : </div>
                    <div class='campo_event'>
                        <input class="form-control fileimagen" id="rmb_calendario_img" type="file" name="rmb_calendario_img" value="" >
                    </div>
                    <div class='label_event text-right'>Módulo : </div>
                    <div class='campo_event'>
                        <?php echo Modulos("");?>
                    </div>

                </div>
                <div class="bienvenida"><input id="ins" type="hidden" name="ins" value="1" >
                    <div id="ingresar" name="ingresar" class="cal_u">Ingresar Registro</div><?php 
                }
            ?>
                <div id="cancel" name="cancel" class="cal_u">Cancelar</div>
            </div>
        </div>
    </form>
</div>
<!-- Campos requeridos del formulario -->
<input id="id" type="hidden" value="<?php echo $id_evento;?>">
<script type="text/javascript">
    //ampliar inputs de l calendario
    $("input:text").css("width", "100%");
    $("input:checkbox").css("display", "inline-block");
    $("input:radio").css("display", "inline-block");
    //ampliar select de l calendario
    $("select").css("width", "100%");
    // $("select").attr("class", "");
</script>
<script type="text/javascript">
    //$(function(){$(".datepicker").datetimepicker();});
    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información
    $(':file').change(function(){
        //obtenemos un array con los datos del archivo
        var file = $("#rmb_calendario_img")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
        if((fileExtension !== 'png')&&(fileExtension !== 'jpg')&&(fileExtension !== 'gif')&&(fileExtension !== 'svg')&&(fileExtension !== 'doc')&&(fileExtension !== 'docx')&&(fileExtension !== 'xls')&&(fileExtension !== 'xlsx')&&(fileExtension !== 'pdf')&&(fileExtension !== 'ppt')&&(fileExtension !== 'pptx')&&(fileExtension !== 'zip')&&(fileExtension !== 'rar')){
            alert("Formato de archivo no soportado.");
            $(this).val('');
            return false;
        }
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        //showMessage("<span>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
    });

    //al hacer clic en los botones del form_u.php en usuarios
    $(".cal_u").click(function(event) {
        var id_boton = $(this).attr('id');
        var tabla = "rmb_calendario";
        var div_lista = "indexjquerytabs1-page-3";
        var lista = "3";
        var campos = $("#campos").val();
        var requeridos = $("#requeridos").val();      
        var camp = campos.split(',');
        var campo_post = "";
        for(var i = 0; i < camp.length; i++){
            if(i === 0){
                campo_post += camp[i]+"="+$("#"+camp[i]).val();
            }
            else{
                campo_post += "&"+camp[i]+"="+$("#"+camp[i]).val();
            }
        }
        switch(id_boton){
            case 'cancel':
                $("#"+div_lista).load(lista+".php");
                return;
                break;
            case 'ingresar':
                if(tabla === 'rmb_calendario'){
                   content_type = "contentType:true,";;
                   var data = new FormData($(".formulario_cal")[0]);
                   var send_post = data;
                }
                else{
                    var send_post = "ins=1&tabla="+tabla+"&"+campo_post;
                }
                    break;
            case 'actualizar':
                var id = $("#id").val();
                if(tabla === 'rmb_calendario'){
                   content_type = "contentType:true,";;
                   var data = new FormData($(".formulario_cal")[0]);
                   var send_post = data;
                }
                else{
                    var send_post = "id_upd="+id+"&tabla="+tabla+"&"+campo_post;
                }
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
        if(tabla === 'rmb_calendario'){
            $.ajax({
                url:"ins_cal.php",
                cache:false,
                type:"POST",
                contentType: false,
                data:send_post,
                processData: false,
                success: function(datos){
                if(datos !== ''){
                    // $("#"+div_lista).load(lista+".php");
                    alert(datos);
                }
                else{alert("No se pudo "+id_boton+" el registro");}
                }
            });
        }
        else{
            $.ajax({
                url:"ins_cal.php",
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
        }
    });
    // al checkear la opcion de repetir
    $("#repetir").on("click", verCampos);
    function verCampos() {
        $("#campos_repit").toggleClass('repit');
    }
    // al cambiar el campo select de rmb_calendario_cada
    $("#rmb_calendario_cada").on("change", verDias);
    function verDias() {
        var val_cada = $("#rmb_calendario_cada").val();
        if(val_cada === '2'){
            $("#dias_sem").removeClass('sem');
        }
        else{
            $("#dias_sem").addClass('sem');            
        }        
    }
    // al chekear los radio buttons de finalizar
    $("input[name='rmb_calendario_final']").on("click", function() {
        var val_final = $(this).val();        
        if(val_final === '2'){
            $("#det_final_d").removeAttr('disabled');
            $("#det_final_f").attr('disabled', "disabled");
        }
        else if(val_final === '3'){            
            $("#det_final_d").attr('disabled', true);
            $("#det_final_f").removeAttr('disabled');
        }
        else{
            $("#det_final_d").val('');
            $("#det_final_f").val('');
            $("#det_final_d").attr('disabled', true);
            $("#det_final_f").attr('disabled', true);
        }
    });


//como la utilizamos false veces, creamos una función para 
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
</script>