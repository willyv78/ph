<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
$UsuID = $_SESSION['UsuID'];
?>

<!-- Titulo de la pagina -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <input type="hidden" value="rmb_contac">
   <h3 class="text-left">Contactos</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert alert-info text-left">
        <strong>Atención!</strong>
          <p>Para nosotros sus aportes y comentarios son muy importantes. Por favor déjenos su mensaje y nos estaremos poniendo en contacto con usted a la mayor brevedad. Gracias!</p>
    </div>
</div>
<!-- Contactos públicos -->
<legend class="text-right col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color: inherit;">Contactos Públicos</legend>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 div-contacto"><?php 
    $res_contac_admin = Contac_Admin($UsuID);
    if($res_contac_admin){
        if(mysql_num_rows($res_contac_admin) > 0){
            while($row_contac_admin = mysql_fetch_array($res_contac_admin)){?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_contac box-contac">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p class="text2_contac">
                                <span class="textspan1_contac modal-open"><?php echo $row_contac_admin[5];?></span>
                                <br />
                                <span class="textspan2_contac modal-open"><?php echo $row_contac_admin[4];?></span>
                                <br /> <span class="textspan2_contac modal-open">
                                <?php echo $row_contac_admin[6];?></span>
                                <br />
                            </p>
                        </div><?php 
                        if($row_contac_admin[2] <> ''){
                            $src = Tipo_Contac_Id($row_contac_admin[2]);
                        }
                        else{$src = imagenDefault();}?>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo $src;?>" class="image5_contac" width="100%"/>
                        </div>
                        <div class="iconos-edit-cont hidden">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Contacto" title="Editar Contacto" data-id="<?php echo $row_contac_admin[0];?>"></span>
                            <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Contacto" title="Eliminar Contacto" data-id="<?php echo $row_contac_admin[0];?>"></span>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </div><?php 
            }?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="new-contact" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_contac box-contac" alt="Nuevo Contacto" title="Nuevo Contacto">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 borange new-contact">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <p class="text2_contac">
                            <span class="textspan1_contac modal-open">&nbsp;</span>
                            <br />
                            <span class="textspan2_contac modal-open">Nuevo Contacto</span>
                            <br />
                            <span class="textspan2_contac modal-open">&nbsp;</span>
                            <br />
                        </p>
                    </div>
                    <div class="iconos-edit-cont hidden">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true" alt="Nuevo Contacto" title="Nuevo Contacto"></span>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
            </div><?php 
        }
    }?>
</div>
<!-- Formulario de contacto -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
    <div class="box_contac form-contacto">
        <form class="form-horizontal" id="form_cont" name="form_cont" action="" method="POST" role="form">
            <div class="clearfix">&nbsp;</div>
            <div class="form-group">
                <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_mens_asunto">Asunto:</label>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input id="rmb_mens_asunto" type="text" name="rmb_mens_asunto" class="form-control" value="" placeholder="Asunto del mensaje">
                </div>
            </div>
            <div class="form-group">
                <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_mens_mens">Mensaje:</label>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <textarea id="rmb_mens_mens" name="rmb_mens_mens" class="form-control" rows="4" placeholder="Escriba un mensaje en 250 caractéres"></textarea>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        </form>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<!-- Contactos Personales -->
<legend class="text-right col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color: inherit;">Contactos Personales</legend>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div-contacto"><?php 
    $res_contac_user = Contac_Id($UsuID);
    if($res_contac_user){
        if(mysql_num_rows($res_contac_user) > 0){
            while($row_contac_user = mysql_fetch_array($res_contac_user)){?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_contac box-contac" style="border: 1px solid #00C4F9;">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <p class="text2_contac">
                                <span class="textspan1_contac modal-open"><?php echo $row_contac_user[5];?></span><br />
                                <span class="textspan2_contac modal-open"><?php echo $row_contac_user[4];?><br /><?php echo $row_contac_user[6];?></span><br />
                            </p>
                        </div><?php 
                        if($row_contac_user[2] <> ''){
                            $src = Tipo_Contac_Id($row_contac_user[2]);
                        }
                        else{$src = imagenDefault();}?>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo $src;?>" class="image5_contac" width="100%" />
                        </div>
                        <div class="iconos-edit-cont hidden">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" alt="Editar Contacto" title="Editar Contacto" data-id="<?php echo $row_contac_user[0];?>"></span>
                            <span class="glyphicon glyphicon-remove" aria-hidden="true" alt="Eliminar Contacto" title="Eliminar Contacto" data-id="<?php echo $row_contac_user[0];?>"></span>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </div><?php 
            }
        }
    }?>
</div>
<script src="../js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        editDocumento();
    });
</script>