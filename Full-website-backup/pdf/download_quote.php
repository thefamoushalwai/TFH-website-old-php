<?php
include('../includes/inc.php');
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

/*
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
*/
$odrmem_qry = db_query("SELECT * FROM order_members WHERE slno = '".$_REQUEST['slno']."' ");
$varr = db_fetch_array($odrmem_qry);
$occasionsArr = db_fetch_array(db_query("SELECT * FROM occasions_tbl WHERE slno='".$varr['occasions_slno']."' "));  
$html2pdf = new Html2Pdf();
ob_start();
include dirname(__FILE__).'/get_pdf_quote.php';

$yname = $varr['yname'];
$filename = str_replace(' ', '-', $yname);  
$pdf_filename = $filename."-".$varr['slno'].".pdf";
$contentHtml = ob_get_clean();

try {
	$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 3));
    $html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->setTestTdInOnePage(false);
	
	$html2pdf->writeHTML($contentHtml);
	ob_end_clean();	
	//$html2pdf->Output($pdf_filename,'D');	
	$html2pdf->output();
	
	//$download_pdf_url = $html2pdf->Output($pdf_filename, true); //Attached PDF in Mail
	$upload_location = $_SERVER['DOCUMENT_ROOT']."/quotepdf/".$pdf_filename;
	$html2pdf->Output($upload_location, 'F'); //Save file on Server

	db_query("UPDATE order_members SET pdf_flname='".$pdf_filename."' WHERE slno = '".$_REQUEST['slno']."' ");

	$message_resp = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <title>Team The Famous Halwai</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <style type="text/css">
    html {width: 100%;}
    body {  background-color: #f7f8f8;  margin: 0;  padding: 0;}
    table[class="banner"]{ background:#e11f26!important;}
    table[class="table_wraper"]{ width:600px !important; margin:auto; border:solid #ccc 1px;}
    body{font-family:sans-serif !important; font-style:normal !important}
    @media   (max-width:575px){
    body {  width: auto !important;}
    table table {   width: 100% !important;}
    table [class="table_wraper"]{ width:100% !important; margin:auto; display:block; overflow:hidden !important}
    img.ing_responsive{ max-width:100%; width:100%; display:block}
    td[class="no-display"]{ display:none !important}
    .no-display{ display:none !important}
    td[class="mobile_center"]{ text-align:center !important}
    .mobile_center{ text-align:center}
    table [class="full_width"]{ display:block!important; width:100% !important;}
    td.m_text{font-size: 18px !important;  font-family:\'Montserrat\';}
    }
    a:link {color: #FF0004;}
    </style>
    </head>
    <body>
    <table class="table_wraper" align="center" cellpadding="0" cellspacing="0" width="700" bgcolor="ffffff">

    <tr>
    <td style="padding:10px 15px;">
    <table width="100%" class="Single_col" cellpadding="0" cellspacing="0">
    <tr>
    <td class="td_container"><a href="https://www.thefamoushalwai.com/" target="_blank"><img src="https://www.thefamoushalwai.com/frontEnd/images/logo.png"></a></td>
    <td class="td_container" align="right" style="font-family: \'Arial\', Open Sans, sans-serif ; font-size:12px;  text-align:right; font-weight:400;  color:#000">&nbsp;</td>
    </tr>
    </table>
    </td>
    </tr>

    <tr>
    <td style="padding:0 20px; background:#ffffff">

    <table width="100%" style="background:#ffffff; " cellpadding="0" cellspacing="0">
    <tr><td class="td_container m_text" style="font-family: \'Montserrat\', Arial, sans-serif; font-size:16px; font-weight: 700; padding-top: 20px ; color: #616161; ">Hi '.$yname.',</td></tr>


    <tr><td class="td_container m_text" style="font-family: \'Open Sans\', Arial, sans-serif; font-size:15px; font-weight: 400; padding-top: 8px; color: #616161; line-height:20px"><strong>Thank you for requesting a quotation.</strong> </td></tr>

    <tr><td style="font-family: \'Open Sans\', Arial, sans-serif; font-size:15px; font-weight: 400; padding-top: 8px; color: #616161; line-height:20px">You can find the quotation of <a href="'.SITE_URL.'/quotepdf/'.$pdf_filename.'">Download</a> as an attachment.</td></tr>

    <tr><td style="font-family: \'Open Sans\', Arial, sans-serif; font-size:15px; font-weight: 400; padding-top: 8px; color: #616161; line-height:20px">If you need any more details regarding the product or payment or both, feel free to contact us.</td></tr>

    <tr><td style="font-family: \'Open Sans\', Arial, sans-serif; font-size:15px; font-weight: 400; padding-top: 8px; color: #616161; line-height:20px">Quotation is valid for only one month.</td></tr>

    </table>
    </td>
    </tr>

    <tr>
    <td  style="padding: 0 20px; font-family: \'Open Sans\', Arial, sans-serif ; font-size:16px;  color:#181617;" bgcolor="#ffffff"><br />
    Thanks & Regards<br />
    Team The Famous Halwai
    </td></tr>

    <tr><td>&nbsp;</td></tr>

    <tr bgcolor="#ffffff"> <td style="padding: 15px 5px; font-family: \'Open Sans\', Arial, sans-serif ; font-size:12px;  color:#181617; text-align: center; line-height: 24px; border-top: solid 1px #e5e5e5">The Famous Halwai.</td></tr>

    <tr><td height="5"></td></tr>

    </table>
    </body>
    </html>';

    $Mailsub="Quotation for ".$occasionsArr['occasions_title'];
    $mailArr['MEM_EMAIL'] = $varr['email'];
    //$mailArr['MEM_EMAIL'] = "manishpraja14@gmail.com";
    $mailArr['MAIL_FROM'] = "thefamoushalwai@gmail.com";
    $mailArr['MAIL_SUBJECT']=$Mailsub;
    $mailArr['MEM_MESSAGE']=$message_resp;
    /*$mailArr['pdf_download_url']=$download_pdf_url;
    $mailArr['pdf_filename']=$pdf_filename;*/           
    if(!empty($varr['email'])){ 
        $mail_send_status = mail_sent_func($mailArr);
    }

    /*$messageMail='Hi '.$name;
    $messageMail.='<br>Thank you for requesting a quotation.';
    $messageMail.='<br>You can find the quotation of <a href="https://www.thefamoushalwai.com/quotepdf/'.$pdf_filename.'">Download</a> as an attachment.';
    $messageMail.='<br>
    Thanks & Regards<br />
    Team The Famous Halwai';

    $name = $varr['yname'];    
    $email = "manishpraja14@gmail.com";
    $from = "thefamoushalwai@gmail.com";
    $message = $messageMail;
    $subject = $Mailsub;    
    $message = $messageMail;
    //$message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];
    $headers = "From:" . $from;
    //$headers2 = "From:" . $email;
    mail($email,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender */  
}
catch(HTML2PDF_exception $e) {
	$html2pdf->clean();
    echo $e;
    /*
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
    */
    exit;
}
?>

