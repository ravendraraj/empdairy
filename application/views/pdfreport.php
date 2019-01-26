<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');
//salary slip data
ob_start();
//print_r($full_data);
foreach($full_data['salary'] as $sal)
{
	$emp_id=$sal->emp_id;
	$emp_name=$sal->fname." ".$sal->lname;
	$emp_post=$sal->desigation ;
	$emp_acc=$sal->emp_bank_acc ;
	$emp_bank=$sal->emp_bank_name ;
	$total_paid=$sal->paid_ammount;
	$emp_doj=$sal->dateofjoining;
	$paid_date =$sal->paid_date;
	$paid_hra=$sal->emp_hra;
	$paid_ta=$sal->emp_ta;
	$paid_sa=$sal->emp_sa;
	$paid_ma=$sal->emp_ma;
	$paid_bonus=$sal->emp_bonus;
	$paid_over_time=$sal->emp_over_time;
	$paid_pf=$sal->emp_pf;
	$month_name=date("F",mktime(0,0,0,$sal->month,10));
	$year=$sal->year;
}
//Company Profile
$comp_logo=$full_data["comp_profile"]->comp_logo;
$comp_name=$full_data["comp_profile"]->comp_name;
$reg_addr=$full_data["comp_profile"]->regis_address;
$copr_addr=$full_data["comp_profile"]->copr_address;
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 006');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 13);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)
$logo_url=base_url('uploads').'/'.$comp_logo;
// create some HTML content
$html = '
<div style="text-align:center;margin-top:-100px!important;">
<img src=".$logo_url." alt="test alt attribute" width="30" height="30" border="0" />
'.$comp_logo.'<span style="font-size:15px;">'.$comp_name.'</span><br>
<span style="font-size:13px;">Register Office : '.$reg_addr.'</span><br>
<span style="font-size:13px;">Corporate Office '.$copr_addr.'</span>
</div>
';
$html .= '
<div style="text-align:center;background-color:48d1cc;">
<h5>Payslip for the month of '.$month_name.' '.$year.'</h5>
</div>
';
$html .="<br><br>";
$html .= '
<table border="1">
<tbody>
<tr style="padding-left:20px;">
<td style="font-size:13px;"> Employe ID<br> Name</td>
<td style="font-size:13px;"> '.$emp_id.' <br/> '.$emp_name.'</td>
<td style="font-size:13px;"> Payment Date<br> Leave C/F</td>
<td style="font-size:13px;"> '.$paid_date.'<br> '.$total_paid.'</td>
</tr>
<tr>
<td style="font-size:13px;"> Designation <br> Date of Joining</td>
<td style="font-size:13px;"> '.$emp_post.'<br/> '.$emp_doj.'</td>
<td style="font-size:13px;"> Earned Leave <br> Leave Taken</td>
<td style="font-size:13px;"> '.$total_paid.'<br>'.$total_paid.'</td>
</tr>
<tr>
<td style="font-size:13px;"> Bank Account<br> Bank Name</td>
<td style="font-size:13px;"> '.$emp_acc.'<br/>'.$emp_bank.'</td>
<td style="font-size:13px;"> Late/Early<br> Leave Adjusted</td>
<td style="font-size:13px;"> '.$total_paid.'<br>'.$total_paid.'</td>
</tr>
  </tbody>
  </table>';
  

  $html .= '<br><br>
<table border="1">
<tbody>
<tr>
<td style="font-size:13px;"> <b>Earning</b></td>
<td style="font-size:13px;"> <b>Amount</b></td>
</tr>
<tr>
<td style="font-size:13px;"> Basic Pay	</td>
<td style="font-size:13px;"> '.$paid_hra.'</td>
</tr>
<tr>
<td style="font-size:13px;"> House Rent Allowance	</td>
<td style="font-size:13px;"> '.$paid_hra.'</td>
</tr>
<tr>
<td style="font-size:13px;"> Medical Allowance	</td>
<td style="font-size:13px;"> '. $paid_ma.'</td>
</tr>
<tr>
<td style="font-size:13px;"> Transport Allowance	</td>
<td style="font-size:13px;"> '. $paid_ta.'</td>
</tr>
<tr>
<td style="font-size:13px;"> Special Allowance	</td>
<td style="font-size:13px;"> '. $paid_sa.'</td>
</tr>
<tr>
<td style="font-size:13px;"> Bounce </td>
<td style="font-size:13px;"> ' .$paid_bonus.'</td>
</tr>
<tr>
<td style="font-size:13px;"> <b>Total Earning</b></td>
<td style="font-size:13px;"> <b>'. $total_paid.'</b></td>
</tr>
  </tbody>
  </table>';

  $html .= '<br><br><br><br><br><table><tr>
<td style="font-size:13px;"> <b>Net Payable</b></td>
<td style="font-size:13px;"> <b>'.$total_paid.'</b></td>
</tr></table>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

ob_flush();
ob_end_flush();
//============================================================+
// END OF FILE
//============================================================+
