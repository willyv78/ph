<?php
require('../fpdf.php');
$variable = $_GET["info_cotizacion"];
$tiempo = $_GET['tiempo'];
$usuario = $_GET['usuario'];
//echo '<script language="javascript">alert("'. $variable .'creapdf.php");</script>';
class PDF extends FPDF
{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html)
    {
        // Intérprete de HTML
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Etiqueta
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extraer atributos
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Etiqueta de apertura
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Etiqueta de cierre
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modificar estilo y escoger la fuente correspondiente
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Escribir un hiper-enlace
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
}

if($variable = $_GET["info_cotizacion"]){
    require('../../../php/conexion.php');

    //$variable = $_GET["info_cotizacion"];
    //echo '<script language="javascript">alert("'. $variable .'creapdf.php");</script>';
     $id = $variable;
    //echo '<script language="javascript">alert("'. $id .' id creapdf.php");</script>';
    $cotizacion = mysql_query("SELECT * FROM aptos WHERE apto = $id", $conexion);
    
    if ($cotizacion) {
        if(mysql_num_rows($cotizacion) > 0){
            while ($info = mysql_fetch_array($cotizacion)) {
                $titulo = $info[1];
                $f1c1 = 'Apartamento';
                $f1c2 = $info[1];
                $f2c1 = 'Piso';
                $f2c2 = $info[2];
                $f3c1 = 'Alcobas';
                $f3c2 = $info[5];
                $f4c1 = 'Área Construida';
                $f4c2 = $info[7].' Mts2';
                $f5c1 = 'Área Privada';
                $f5c2 = $info[8]. ' Mts2';
                $f6c1 = 'Área Terraza';
                $f6c2 = $info[9]. ' Mts2';
                $f7c1 = 'Valor del Apto';
                $f7c2format = number_format($info[10]);
                $f7c2 = '$ '.$f7c2format;
                $f8c1 = 'Separación (10%)';
                $f8c2format = number_format($info[11]);
                $f8c2 = '$ '.$f8c2format;
                $f9c1 = 'Cuota inicial (20%)';
                $f9c2format = number_format($info[12]);
                $f9c2 = '$ '.$f9c2format;
                $f10c1 = 'Saldo (70%)';
                $f10c2format = number_format($info[13]);
                $f10c2 = '$ '.$f10c2format;
                $f11c1 = '1 Parqueadero';
                $f11c1_2 = '2 Parqueaderos';
                $f11c2format = number_format($info[14]);
                $f11c2 = '$ '.$f11c2format;
                $f12c1 = 'Depósito';
                $f12c2format = number_format($info[15]);
                $f12c2 = '$ '.$f12c2format;
                $f13c1 = 'Total del Apto';
                $f13c2format = number_format($info[16]);
                $f13c2 = '$ '.$f13c2format;
                
                $caracteristicas ='Caracterísitcas del apartamento:';
                $car1 = 'Terraza';
                $car1val1 = $info[9];
                $valSi = 'Si';
                $valNo = 'No';
                $car2 = 'Plantas';
                $car2val1 = $info[3];
                $val1 = '1';
                $val2 = '2';
                $car3 = 'Parqueadero';
                $car3val1 = $info[14];
                $valSencillo = 'Sencillo';
                $valDoble = 'Doble';
                $car4val1 = $info[15];
                $valDep = 'Depósito: Éste apartamento cuenta con un depósito en su interior.';
            
                $totalFotos = $info[18];
                $Tipo = $info[3];
            }
        }
        else{
            echo 'NO hay resultados';
        }
            
    }
    else{
        echo 'Algo salio mal';
    }
}else{echo "algo fallo";}

$pdf = new PDF('P','mm','letter');
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

//primera hoja del PDF (1)

//portada de la primera hoja del PDF
$pdf->Image('../../portada_pdf.jpg',0,0,216,280);
$pdf->AddPage();

//segunda hoja del PDF (2)

$pdf->Ln(40);

//imagenes de los apartamentos
$pdf->Image('../../../img/cotizacion/apto_'.$variable.'_'.($totalFotos-1).'.jpg',16,67,93);
$pdf->Image('../../../img/cotizacion/apto_'.$variable.'_'.($totalFotos).'.jpg',16,120,93);

//titulo del PDF
$pdf->SetX(15);
$pdf->Write(5, 'Cotización Apartamento');
$pdf->SetFont('Arial','B',24);
$pdf->SetTextColor(148,177,62);
$pdf->Write(5, $titulo);
$pdf->SetFont('Arial','',16);
$pdf->SetTextColor(0,0,0);
$pdf->Write(5, '  Edificio Quimbaya');
$pdf->Ln(8);

//fecha generada el día de que se realiza la cotización 
$pdf->SetX(15);
$pdf->SetFont('Arial','',11);
$pdf->Write(5, $tiempo);
$pdf->Ln(9);
$pdf->SetDrawColor(255,255,255);

//primera fila dato de apto
$pdf->SetX(110);
$pdf->SetFillColor(236,236,235);
$pdf->Cell(40,8,'  '.$f1c1,1,0,'L',true);
$pdf->SetFillColor(155,155,154);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(60,8,'  '.$f1c2,1,0,'L',true);
$pdf->Ln(8);

//segunda fila dato del piso
$pdf->SetX(110);
$pdf->SetFillColor(236,236,235);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,8,'  '.$f2c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f2c2,1,0,'L',true);
$pdf->Ln(8);

//tercera fila dato de las alcobas
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$f3c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f3c2,1,0,'L',true);
$pdf->Ln(8);

//cuarta fila Terraza
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$car1,1,0,'L',true);
if ($car1val1 > 0) {
    $pdf->Cell(60,8,'  '.$valSi,1,0,'L',true);
}else{
    $pdf->Cell(60,8,'  '.$valNo,1,0,'L',true);
}
$pdf->Ln(8);

//quinta fila numero de plantas
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$car2,1,0,'L',true);
if ($car2val1 == 'simple') {
    $pdf->Cell(60,8,'  '.$val1,1,0,'L',true);
}else{
    $pdf->Cell(60,8,'  '.$val2,1,0,'L',true);
}
$pdf->Ln(8);

//sexta fila Gas natural
$pdf->SetX(110);
$pdf->Cell(40,8,'  Gas Natural',1,0,'L',true);
$pdf->Cell(60,8,'  No',1,0,'L',true);
$pdf->Ln(8);
//septima fila tipo calentador Solar
$pdf->SetX(110);
$pdf->Cell(40,8,'  Tipo Calentador',1,0,'L',true);
$pdf->Cell(60,8,'  Solar',1,0,'L',true);
$pdf->Ln(8);
//octava fila dato del área privada
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$f5c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f5c2,1,0,'L',true);
$pdf->Ln(8);

//novena fila dato del área terraza
$pdf->SetX(110);
if ($f6c2 > 0) {
    $pdf->Cell(40,8,'  '.$f6c1,1,0,'L',true);
    $pdf->Cell(60,8,'  '.$f6c2,1,0,'L',true);
    $pdf->Ln(8);
}else{

}

//decima fila dato del área construida Total
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$f4c1,1,0,'L',true);
$pdf->SetFillColor(155,155,154);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(60,8,'  '.$f4c2,1,0,'L',true);
$pdf->Ln(8);

//onceava fila dato del valor del apto
$pdf->SetX(110);
$pdf->SetFillColor(236,236,235);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,8,'  '.$f7c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f7c2,1,0,'L',true);
$pdf->Ln(8);

//doceava fila dato del parqueadero
$pdf->SetX(110);
if ($info[14] > 18000000) {
    $pdf->Cell(40,8,'  '.$f11c1,1,0,'L',true);
    $pdf->Cell(60,8,'  '.$f11c2,1,0,'L',true);
    $pdf->Ln(8);
}else{
    $pdf->Cell(40,8,'  '.$f11c1_2,1,0,'L',true);
    $pdf->Cell(60,8,'  '.$f11c2,1,0,'L',true);
    $pdf->Ln(8);
}

//treceava fila dato del depósito
$pdf->SetX(110);
if ($f12c2format > 0) {
    $pdf->Cell(40,8,'  '.$f12c1,1,0,'L',true);
    $pdf->Cell(60,8,'  '.$f12c2,1,0,'L',true);
    $pdf->Ln(8);
}else{

}

//catorceava fila dato del total del precio del apto
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$f13c1,1,0,'L',true);
$pdf->SetFillColor(155,155,154);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(60,8,'  '.$f13c2,1,0,'L',true);
$pdf->Ln(18);

//quinceava fila dato del valor de saparación 
$pdf->SetX(110);
$pdf->SetFillColor(148,177,62);
$pdf->Cell(40,8,'  '.$f8c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f8c2,1,0,'L',true);
$pdf->Ln(8);

//diesiseisava fila dato del valor de la cuota inicial
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$f9c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f9c2,1,0,'L',true);
$pdf->Ln(8);

//diesisieteava fila dato del saldo del apto
$pdf->SetX(110);
$pdf->Cell(40,8,'  '.$f10c1,1,0,'L',true);
$pdf->Cell(60,8,'  '.$f10c2,1,0,'L',true);
$pdf->Ln(8);

//texto de interpretaciones de las imagenes
$pdf->SetXY(15,175);
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(9);
$pdf->Write(5,'Las imágenes presentadas son interpretaciones del artista.');
$pdf->Ln(10);

//texto de validez en tiempo de la cotizacion
$pdf->SetXY(110,215);
$pdf->SetFontSize(7);
$pdf->Cell(100,4,'La presente cotización tiene una validez de 30 días calendario a partir de la fecha de',0,0,'L');
$pdf->Ln(4);
$pdf->SetX(110);
$pdf->Cell(100,4,'presentación. Las imágenes presentadas son interpretaciones del artista. R + B Diseño',0,0,'L');
$pdf->Ln(4);
$pdf->SetX(110);
$pdf->Cell(100,4,'Experimental se reserva el derecho de cambiar los precios presentados sin previo aviso.',0,0,'L');




//marco de la segunda hoja del PDF
$pdf->Image('../../marcopdf.png',0,0,216,280);

//prueba de imagen
// acá se verifica si solo es una o dos plantas para mostrar
if (($titulo == 401) || ($titulo == 404) || ($titulo == 406) || ($titulo == 501) || ($titulo == 503) || ($titulo == 601) || ($titulo == 604) || ($titulo == 606) || ($titulo == 701) || ($titulo == 703) || ($titulo == 801) || ($titulo == 802) || ($titulo == 804) || ($titulo == 901) || ($titulo == 902) || ($titulo == 903) || ($titulo == 1001) || ($titulo == 1003) || ($titulo == 1005) || ($titulo == 1101) || ($titulo == 1102) || ($titulo == 1103) || ($titulo == 1201) || ($titulo == 1203) || ($titulo == 1205) || ($titulo == 1301) || ($titulo == 1302) || ($titulo == 1303) ) {
        $pdf->Image('../../../img/pdf/'.$titulo.'.png',10,190,100);

}else if (($titulo == 405) || ($titulo == 407) || ($titulo == 605) || ($titulo == 607) || ($titulo == 803) || ($titulo == 805) || ($titulo == 1004) || ($titulo == 1006) || ($titulo == 1204) || ($titulo == 1206) ) {
    //plantas en posicion horizontal
       $pdf->Image('../../../img/pdf/'.$titulo.'p.png',30,180,65);
       $pdf->SetTextColor(148,177,62);
       $pdf->SetFontSize(7);
       $pdf->SetXY(40,210);
       $pdf->Write(4,'Primer nivel');
       $pdf->Image('../../../img/pdf/'.$titulo.'s.png',30,214,65);
       $pdf->SetXY(40,244);
       $pdf->Write(4,'Segundo nivel'); 
}else if (($titulo == 403) || ($titulo == 603)) {
    $pdf->Image('../../../img/pdf/'.$titulo.'p.png',20,200,65);
    $pdf->SetTextColor(148,177,62);
    $pdf->SetFontSize(7);
    $pdf->SetXY(20,233);
    $pdf->Write(4,'Primer nivel');
    $pdf->Image('../../../img/pdf/'.$titulo.'s.png',70,185,95);
    $pdf->SetXY(80,232);
    $pdf->Write(4,'Segundo nivel'); 
}else if (($titulo == 502) || ($titulo == 702)) {
    $pdf->Image('../../../img/pdf/'.$titulo.'p.png',10,200,65);
    $pdf->SetTextColor(148,177,62);
    $pdf->SetFontSize(7);
    $pdf->SetXY(30,233);
    $pdf->Write(4,'Primer nivel');
    $pdf->Image('../../../img/pdf/'.$titulo.'s.png',60,185,95);
    $pdf->SetXY(70,232);
    $pdf->Write(4,'Segundo nivel'); 
}else if (($titulo == 402) || ($titulo == 602) || ($titulo == 1002) || ($titulo == 1202)) {
    $pdf->Image('../../../img/pdf/'.$titulo.'p.png',0,185,85);
    $pdf->SetTextColor(148,177,62);
    $pdf->SetFontSize(7);
    $pdf->SetXY(35,225);
    $pdf->Write(4,'Primer nivel');
    $pdf->Image('../../../img/pdf/'.$titulo.'s.png',40,185,85);
    $pdf->SetXY(75,225);
    $pdf->Write(4,'Segundo nivel'); 
}


//imagen planta del apartamento 
//$pdf->Image('../../../img/cotizacion/apto_'. $variable .'_'.($totalFotos-3).'.jpg',120,181,90);
$pdf->SetXY(160,245);
$pdf->SetTextColor(0,0,0);
$pdf->Write(5,'No imprimas esto si no es necesario.');

$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output('F', 'Cotizacion-Quimbaya-armenia-'.$usuario.'.pdf');
?>
