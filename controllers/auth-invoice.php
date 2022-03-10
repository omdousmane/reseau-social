<?php
require_once '../config.php';
require_once '../models/database.php';
$authDB      = require_once '../models/security.php';
$authDbOrder = require_once '../models/order.php';
require "../models/customPdfGenerator.php";



$tabContentProducts = $authDbOrder->getAllProducts();
$currentUser = $authDB->isLoggedin();
$id = $authDbOrder->ReadOneFromComd($currentUser['id_user']);

if(!$id){
$empty ='Aucune commande en cours';
} else {
  $tabContentDetalsCmds = $authDbOrder->fetchOneOrder($id['id_cmd']) ;
  $ContentNumIvoice = $authDbOrder->fetchGetNumberInvoice($id['id_cmd']) ;
  $today = date("m.d.y");
  $typeProds = $authDbOrder->getAllProductsType();
  $pdf = new CustomPdfGenerator(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  $pdf->setFontSubsetting(true);
  $pdf->SetFont('dejavusans', '', 12, '', true);

  // set auto page breaks
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  // start a new page
  $pdf->AddPage();


  // date and invoice no
  $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);
  $pdf->writeHTML("<b>DATE :</b>" .$today);
  $pdf->writeHTML("<b>INVOICE :</b>" .$ContentNumIvoice['number_invoice']);
  $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);

  // address
  $pdf->writeHTML("23 terr de l'université,");
  $pdf->writeHTML("France,");
  $pdf->writeHTML("Nanterre, 92000");
  $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);

  // bill to
  $pdf->writeHTML("<b>FACTURE A:</b>", true, false, false, false, 'R');
  $pdf->writeHTML($currentUser['company'], true, false, false, false, 'R');
  $pdf->writeHTML($currentUser['adress'], true, false, false, false, 'R');
  $pdf->writeHTML($currentUser['town'], true, false, false, false, 'R');
  $pdf->writeHTML($currentUser['email'], true, false, false, false, 'R');
  $pdf->writeHTML("Portable: " .$currentUser['portable'], true, false, false, false, 'R');
  $pdf->Write(0, "\n", '', 0, 'C', true, 0, false, false, 0);


  // define some HTML content with style
  $html1 = '

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #000;
    }

    table tr {
      background-color: white;
    }

    table tr,
    th {
      height: 70px;
      color: white;
      font-weight: bold;
      background-color: #008b8b;
      padding: 10px;
      text-align: center;
    }
  </style>
  <table style = "border: 1px solid #000;">
      <tr>
        <th width="40%" align="left"><br />DESCRIPTION DU PRODUIT<br /></th>
        <th width="20%"><br />PU<br /></th>
        <th width="20%"><br />QUANTITE<br /></th>
        <th width="20%"><br />PRIX TOTAL<br /></th>
      </tr>
  </table>';

  function build_table($array){
    $html = '
    <style>
      table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
      }
      table tr {
        color: black;
        font-weight: bold;
        background-color: #ececec;
        padding: 10px;
        text-align: center;
      }
      table-content tr td {
        padding: 10px;
        border-bottom: 1px solid #000;
        text-align: center;
      }
    </style>';
    $html .= '<table>';
        $html .= '<tbody>';
        foreach( $array as $key=>$value){
          $html .= '<tr>';
            $html .= '<td width="40%" style="border-bottom: 1px solid #000;  text-align: left;" ><br />' . htmlspecialchars($value[0]) . ' <br /> </td>';
              array_shift($value);
          foreach($value as $key2 => $value2){
            $html .= '<td width="20%" style="border-bottom: 1px solid #000";><br />' . htmlspecialchars($value2) . ' <br /> </td>';
          }
          $html .= '</tr>';
        }
        $html .= '</tbody>';
    $html .= '</table>';
    return $html;
  } 

    $pdf->writeHTML($html1, true, false, true, false, '');
    foreach ($tabContentDetalsCmds as $tabContentDetalsCmd) {
      $pu = $tabContentDetalsCmd['price_total_prod'] / $tabContentDetalsCmd['detail_qte'];
      $arrayContentes = array(
        array(
          $tabContentDetalsCmd['name_prod'],
          $pu,
          $tabContentDetalsCmd['detail_qte'],
          $tabContentDetalsCmd['price_total_prod'],
        ),
      );
      $pdf->writeHTML(build_table($arrayContentes), true, false, true, false, '');
    }
    $html2 = '
    <style>
      table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
      }
      
      table tr {
        height: 70px;
        color: white;
        font-weight: bold;
        background-color: #008b8b;
        padding: 10px;
        text-align: center;
      }
    </style>
    <table style = "border: 1px solid #000;">
        <tr>';
          $html2 .=' <td colspan="3" class="bold" align="right" width="100%"><br /> <br />TOTAL : ' . $tabContentDetalsCmd['montant_cmd'] .'GN </td>';
      $html2 .= '  <br /></tr>
    </table>';

    $pdf->writeHTML($html2, true, false, true, false, '');

    // comments
    $pdf->SetFont('', '', 12);
    $pdf->writeHTML("<b>OTHER COMMENTS:</b>");
    $pdf->writeHTML("Method of payment: <i>PAYPAL</i>");
    $pdf->writeHTML("PayPal ID: <i>katie@paypal.com");
    $pdf->Write(0, "\n\n\n", '', 0, 'C', true, 0, false, false, 0);
    $pdf->writeHTML("If you have any questions about this invoice, please contact:", true, false, false, false, 'C');
    $pdf->writeHTML("Mamadou Bobo, (07) 4050 2235, katie@sks.com", true, false, false, false, 'C');

      // save pdf file
  
    $tabContentCmdClients = $authDbOrder->fetchAllCmdClient($currentUser['id_user']);
    $path                 = 'C:/Users/Diallo/Desktop/Etudes/projet-OK/perso/invoices/';
    $fileName             = 'Fact-'.$ContentNumIvoice['number_invoice'].'-'.$currentUser['id_user'];
    $pdf->Output($path .  $fileName.'.pdf', 'F'); 
}