<?php session_start();
require_once ("../conexion/conexion.php");
require_once ("../php/funciones.php");
//////////////////////////////////////////////////////////////////////////////////////
// Aplicación PHP usando Bootstrap, jquery, HTML5 y CSS - PH                        //
// Copyright 2014 Wilson Giovanny Velandia Barreto 3204274564 - willyv78@gmail.com  //
//////////////////////////////////////////////////////////////////////////////////////
?>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="margin:30px auto;">
    <div class="modal-content">
        <div class="modal-header text-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">
                <span style="font-weight: bold;color: #546E7A">Agregar Estado Financiero</span>
            </h4>
            <input type="hidden" name="rmb_cdoc_id" id="rmb_cdoc_id" class="form-control" value="<?php echo $tipo;?>">
        </div>
        <div class="modal-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div id="content_res">
                    <p id="titulo">TESORERIA</p>
                    <p id="intro">
                        <span id="textspan">Aquí encontrará los estados de cuenta de su apartamento, los recibos de pago de administración y los comprobantes respectivos. </span><br />
                    </p>
                    <div id="content_res2">
                        <input id="btnimprimir" type="button" value="Imprimir" onClick="doPrint()"></input>
                        <input id="btnpagar" type="button" value="Pagar"></input>
                        <input id="btnpse" type="button" value="Pse"></input>
                    </div>
                    <div id="espacio" class="clearfix"></div>

                    <div id="cuadrorecibo" class="clearfix">

                        <table width="100%" aling="center" border="1" style="font-size:14px;">
                            <tr>
                                <td width="12.5%" align="left">Apartamento: </td>
                                <td colspan="2"><?php 
                                $res_aptos = Aptos_Id($UsuID, $row_fact[2]);
                                if($res_aptos){
                                    if(mysql_num_rows($res_aptos) > 0){
                                        $row_aptos = mysql_fetch_array($res_aptos);
                                        $nom_apto = $row_aptos[2];
                                    }
                                    else{$nom_apto = "No Especificado";}
                                }
                                else{$nom_apto = "No Especificado";}
                                echo $nom_apto;
                                ?></td>
                                <td width="12.5%" align="left">Estado: </td>
                                <td colspan="2" width="25%" align="left"><?php echo Nombre_Registro($row_fact[8], "rmb_est");?></td>
                                <td width="12.5%" align="left">Factura No.: </td>
                                <td width="12.5%"><?php echo $next_fact;?></td>
                            </tr>
                            <tr>
                                <td colspan="2" width="25%" align="left">Fecha Oportuna Pago: </td>
                                <td colspan="2" width="25%" align="left"><?php echo $row_fact[4];?></td>
                                <td colspan="2" width="25%" align="left">Fecha Limite pago: </td>
                                <td colspan="2" width="25%" align="left"><?php echo $row_fact[5];?></td>
                            </tr><?php 
                            if(($row_fact[6] != '')&&($row_fact[6] != 0)){?>
                                <tr>
                                    <td colspan="2" width="25%" align="left">Forma Pago: </td>
                                    <td colspan="2" width="25%" align="left"><?php echo Nombre_Registro($row_fact[6], "rmb_fpago");?></td>
                                    <td colspan="2" width="25%" align="left">Fecha de Pago: </td>
                                    <td colspan="2" width="25%" align="left"><?php echo $row_fact[7];?></td>
                                </tr><?php 
                            }?>
                            <tr align="center" style="height:30px;font-weight:bold;">
                                <td width="12.5%">Cant.</td>
                                <td colspan="5" width="62.5%">Detalle</td>
                                <td width="12.5%">Valor Unit.</td>
                                <td width="12.5%">Valor Total</td>
                            </tr><?php 
                            $id_fact = $_GET['id_fact'];
                            $res_concep = Concept_fact($id_fact);
                            if($res_concep){
                                if(mysql_num_rows($res_concep) > 0){
                                    $ncampos = mysql_num_rows($res_concep);
                                    $sq = 0;
                                    while($row_concep = mysql_fetch_array($res_concep)){
                                        $valototal = $row_concep[3] * $row_concep[4];?>           
                                        <tr>
                                            <td width="12.5%"><?php echo $row_concep[3];?></td>
                                            <td colspan="5" width="62.5%" align="left"><?php echo Nombre_Registro($row_concep[2], "rmb_tpago");?></td>
                                            <td width="12.5%" align="right"><?php echo "$ ".number_format($row_concep[4]);?></td>
                                            <td width="12.5%" align="right"><?php echo "$ ".number_format($valototal); ?></td>
                                        </tr><?php 
                                        $sq += $valototal;
                                    }
                                }
                            }?>
                            <tr>
                                <td colspan="6" align="left">Valor letras: <strong id="letras"></strong></td>
                                <td align="right">Total: </td>
                                <td align="right"><?php echo "$ ".number_format($sq);?></td>
                            </tr>
                            <tr style="height:70px;">
                                <td align="left">Observaciones: </td>
                                <td colspan="5" align="left"><?php echo $row_fact[9];?></textarea></td>
                                <td colspan="2" style="vertical-align:top;" align="left">Recibí Conforme:</td>
                            </tr>
                            <tr>
                                <td colspan="8" align="center">
                                    <input id="id_usu" type="hidden" name="id_usu" value="<?php echo $UsuID;?>" >
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div id="espacio" class="clearfix"></div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="../js/sweet-alert.js"></script><!-- Personalizar alertas -->

<!-- Libreria java script que realiza la validacion de los formulariosP -->
<script src="../js/bootstrap-datepicker.js"></script> <!-- Datetimepicker -->
<script src="../js/bootstrapValidator.js"></script>
<script>
    $(document).ready(function() {
        editDocumento();
    });
</script>
<script type="text/javascript">
    //funcion que convierte los numeros en letras
    function letras(c,d,u){
        var centenas,decenas,decom
        var lc=""
        var ld=""
        var lu=""
        centenas=eval(c);
        decenas=eval(d);
        decom=eval(u);
        switch(centenas){
            case 0: lc="";break;
            case 1:{
                if (decenas==0 && decom==0)lc="Cien";
                else lc="Ciento ";
            }
            break;
            case 2: lc="Doscientos ";break;
            case 3: lc="Trescientos ";break;
            case 4: lc="Cuatrocientos ";break;
            case 5: lc="Quinientos ";break;
            case 6: lc="Seiscientos ";break;
            case 7: lc="Setecientos ";break;
            case 8: lc="Ochocientos ";break;
            case 9: lc="Novecientos ";break; 
        } 
        switch(decenas){
            case 0: ld="";break;
            case 1:{ 
                switch(decom){
                    case 0:ld="Diez";break;
                    case 1:ld="Once";break;
                    case 2:ld="Doce";break;
                    case 3:ld="Trece";break;
                    case 4:ld="Catorce";break;
                    case 5:ld="Quince";break;
                    case 6:ld="Dieciseis";break;
                    case 7:ld="Diecisiete";break;
                    case 8:ld="Dieciocho";break;
                    case 9:ld="Diecinueve";break;
                }
            }      
            break;
            case 2:ld="Veinte";break;
            case 3:ld="Treinta";break;
            case 4:ld="Cuarenta";break;
            case 5:ld="Cincuenta";break;
            case 6:ld="Sesenta";break;
            case 7:ld="Setenta";break;
            case 8:ld="Ochenta";break;
            case 9:ld="Noventa";break; 
        }
        switch(decom){
            case 0: lu="";break;
            case 1: lu="Un";break;
            case 2: lu="Dos";break;
            case 3: lu="Tres";break;
            case 4: lu="Cuatro";break;
            case 5: lu="Cinco";break;
            case 6: lu="Seis";break;
            case 7: lu="Siete";break;
            case 8: lu="Ocho";break;
            case 9: lu="Nueve";break; 
        }           
        if (decenas==1){return lc+ld;}
        if (decenas==0 || decom==0){return lc+" "+ld+lu;}
        else{
            if(decenas==2){
                ld="Veinti";
                return lc + ld + lu.toLowerCase();
            }
            else{return lc+ld+" y "+lu;}
        }
    }
    //funcion que divide las cifras y envia los numeros para convertirlos en letras
    function getNumberLiteral(n){ 
        var m0,cm,dm,um,cmi,dmi,umi,ce,de,un,hlp,decimal;           
        if (isNaN(n)) {
            event.preventDefault();
            alert("La Cantidad debe ser un valor Numérico.");
            return null
        }
        m0= parseInt(n/ 1000000000000); rm0=n% 1000000000000;
        m1= parseInt(rm0/100000000000); rm1=rm0%100000000000;
        m2= parseInt(rm1/10000000000); rm2=rm1%10000000000;
        m3= parseInt(rm2/1000000000); rm3=rm2%1000000000;
        cm= parseInt(rm3/100000000); r1= rm3%100000000;
        dm= parseInt(r1/10000000); r2= r1% 10000000;
        um= parseInt(r2/1000000); r3= r2% 1000000;
        cmi=parseInt(r3/100000); r4= r3% 100000;
        dmi=parseInt(r4/10000); r5= r4% 10000;
        umi=parseInt(r5/1000); r6= r5% 1000;
        ce= parseInt(r6/100); r7= r6% 100;
        de= parseInt(r7/10); r8= r7% 10;
        un= parseInt(r8/1);
        //r9=r8%1; 
        999123456789
        if (n< 1000000000000 && n>=1000000000){
            tmp=n.toString();
            s=tmp.length;
            tmp1=tmp.slice(0,s-9)
            tmp2=tmp.slice(s-9,s);           
            tmpn1=getNumberLiteral(tmp1);
            tmpn2=getNumberLiteral(tmp2);
            if(tmpn1.indexOf("Un")>=0)pred=" Billón ";
            else pred=" Billones ";
            return tmpn1+ pred +tmpn2;
        }           
        if (n<10000000000 && n>=1000000){
            mldata=letras(cm,dm,um); 
            hlp=mldata.replace("Un","*");
            if (hlp.indexOf("*")<0 || hlp.indexOf("*")>3){
                mldata=mldata.replace("Uno","un");
                mldata+=" Millones ";
            }
            else{mldata="Un Millón ";}
            mdata=letras(cmi,dmi,umi);
            cdata=letras(ce,de,un);
            if(mdata!=" "){
                if (n == 1000000) {mdata=mdata.replace("Uno","un") + "de";}
                else {mdata=mdata.replace("Uno","un")+" mil ";}
            }
            return (mldata+mdata+cdata);
        } 
        if (n<1000000 && n>=1000){
            mdata=letras(cmi,dmi,umi);
            cdata=letras(ce,de,un);
            hlp=mdata.replace("Un","*");
            if (hlp.indexOf("*")<0 || hlp.indexOf("*")>3){
                mdata=mdata.replace("Uno","un");
                return (mdata +" mil "+cdata);
            }
            else return ("Mil "+ cdata);
        }
        if (n<1000 && n>=1){return (letras(ce,de,un));}
        if (n==0){return " Cero";}
        return "No disponible"
    }
    var total = '<?php echo $sq;?>';
    var texto = getNumberLiteral(total) + " pesos m/cte.";
    $('#letras').html(texto.toUpperCase());
</script>
<script language="JavaScript">
  function doPrint(){
    alert("Debe realizar la impresión en hoja de tamaño oficio");
    document.getElementById("titulo").style.display='none';
    document.getElementById("intro").style.display='none';
    document.getElementById("content_res2").style.display='none';
    //setTimeout(200);
    window.print();
    //window.close();
    document.getElementById("titulo").style.display='block';
    document.getElementById("intro").style.display='block';
    document.getElementById("content_res2").style.display='block';
  }
</script>
<!-- FIN Pagina primera pestaña -->