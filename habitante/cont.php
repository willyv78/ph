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
   <input type="hidden" value="rmb_residente">
   <h3 class="text-left">Contacto</h3>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="alert alert-info text-left">
        <strong>Atención!</strong>
          <p>Para nosotros sus aportes y comentarios son muy importantes. Por favor déjenos su mensaje y nos estaremos poniendo en contacto con usted a la mayor brevedad. Gracias!</p>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8"><?php 
        $res_contac_admin = Contac_Admin(2);
        if($res_contac_admin){
            if(mysql_num_rows($res_contac_admin) > 0){
                while($row_contac_admin = mysql_fetch_array($res_contac_admin)){?>
                    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-6" style="padding:5px 0px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_contac" style="border: 1px solid #417F00;">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <div class="clearfix">&nbsp;</div>
                                <p class="text2_contac">
                                    <span class="textspan1_contac"><?php echo $row_contac_admin[5];?></span><br /><span class="textspan2_contac"><?php echo $row_contac_admin[4];?><br /><?php echo $row_contac_admin[6];?></span><br />
                                </p>
                            </div><?php 
                            if($row_contac_admin[2] <> ''){
                                $src = Tipo_Contac_Id($row_contac_admin[2]);
                            }
                            else{$src = imagenDefault();}?>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="right:-10px;">
                                <img src="<?php echo $src;?>" class="image5_contac" width="100%"/>
                            </div>
                        </div>
                    </div><?php 
                }?>
                <div class="col-xs-12 col-sm-6 col-md-12 col-lg-6" style="padding:5px 2px;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_contac" style="border: 1px solid #417F00;">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 borange" style="left:-5px;height:79px;">
                            <i class="glyphicon glyphicon-plus" style="font-size:4em; padding: 8px;"></i>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="clearfix">&nbsp;</div>
                            <p class="text2_contac">
                                <span class="textspan1_contac">&nbsp;</span>
                                <span class="textspan2_contac">Nuevo Contacto</span><br />
                            </p>
                        </div>
                    </div>
                </div><?php 
            }
        }?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        <div class="box_contac" style="border: 1px solid #417F00;">
            <form class="form-horizontal" id="form_cal" action="" method="POST" role="form" enctype="multipart/form-data">
                <div class="clearfix">&nbsp;</div>
                <div class="form-group">
                    <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_calendario_nom">Asunto:</label>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input id="rmb_calendario_nom" type="text" name="rmb_calendario_nom" class="form-control" value="" placeholder="Asunto">
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-left col-xs-12 col-sm-12 col-md-12 col-lg-12" for="rmb_calendario_desc">Mensaje:</label>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <textarea id="rmb_calendario_desc" name="rmb_calendario_desc" class="form-control" rows="4" placeholder="Escriba un mensaje en 250 caractéres"><?php echo $obs_even; ?></textarea>
                    </div>
                </div>
                <div class="form-group text-center"><?php 
                    if(isset($_GET['id'])){?>
                        <input id="id_upd" type="hidden" name="id_upd" value="<?php echo $_GET['id'];?>">
                        <button type="submit" class="btn btn-success">Actualizar</button><?php 
                    }
                    else{?>
                        <button type="submit" class="btn btn-danger">Enviar</button><?php

                    }?>
                </div>
            
            </form>

        </div>

    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php 
    $res_contac_user = Contac_Id(2);
    if($res_contac_user){
        if(mysql_num_rows($res_contac_user) > 0){
            while($row_contac_user = mysql_fetch_array($res_contac_user)){?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box_contac" style="border: 1px solid #00C4F9;">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="clearfix">&nbsp;</div>
                            <p class="text2_contac">
                                <span class="textspan1_contac"><?php echo $row_contac_user[5];?></span><br />
                                <span class="textspan2_contac"><?php echo $row_contac_user[4];?><br /><?php echo $row_contac_user[6];?></span><br />
                            </p>
                        </div><?php 
                        if($row_contac_user[2] <> ''){
                            $src = Tipo_Contac_Id($row_contac_user[2]);
                        }
                        else{$src = imagenDefault();}?>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="right:-10px;">
                            <img src="<?php echo $src;?>" class="image5_contac" width="100%" />
                        </div>
                    </div>
                </div><?php 
            }
        }
    }?>
</div>
<script>editDocumento();</script>