<?php
//If no url, nothing gets done
if (!isset($_GET["url"])) die();

//Setting up core, paths, modules etc.
$path = dirname(dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
require $path . DIRECTORY_SEPARATOR . 'include.php';
global $gCms;
$config =& $gCms->getConfig();
$smarty =& $gCms->getSmarty();
$printing=$gCms->modules["Printing"]['object'];

$pdf=false;
if (isset($_REQUEST["pdf"]) && ($_REQUEST["pdf"]=="true")) {
  $pdf=true;
}
//Setting up path for correct image-paths (still needed?)
$_owd = getcwd();
chdir( $config['root_path'] );

//Getting content
$url=base64_decode($_GET["url"]);
$showcontent=$printing->GetURLContent($url);
if (isset($_REQUEST["includetemplate"]) && $_REQUEST["includetemplate"]=="true") {
  $showcontent=$printing->GetBody($showcontent);
}

//Getting title and templateid
$title="";
$templateid="";
$menutext="";
if (isset($_REQUEST[$config["query_var"]])) {
  $contentops =&$gCms->GetContentOperations();
  $content =& $contentops->LoadContentFromId($_REQUEST[$config["query_var"]]);
  $title=$content->mName;
  $templateid=$content->mTemplateId;
  $menutext=$content->mMenuText;
  //echo $templateid;
  //print_r($content);
}

//General assignments
$printing->smarty->assign("title",$title);
$printing->smarty->assign("content", $showcontent);
$printing->smarty->assign("url", $url);
$encoding=$config['default_encoding'];

if ($pdf) {
  //PDF-specific assignments
  /*if ($printing->GetPreference("pdfengine")!="internal") {
    require_once(dirname(__FILE__).'/html_to_pdf.inc.php');
    $htmltopdf = new HTML_TO_PDF();
    if ($printing->GetPreference("pdfengine")=="easyw") $htmltopdf->useURL(HKC_USE_EASYW);
    //$htmltopdf->useURL(HKC_USE_EASYW);  // default HKC_USE_ABC other HKC_USE_EASYW
    $htmltopdf->saveFile($menutext.".pdf");
    $htmltopdf->downloadFile($menutext.".pdf");
    //$result = $htmltopdf->convertHTML("<b>MY TEST</b>");
    $result = $htmltopdf->convertURL($url);
    if($result==false)
    echo $htmltopdf->error();
    die();
  }
*/
  $pdfhtml=$printing->ProcessTemplateFromDatabase("pdftemplate");

  $pdfhtml=str_replace("\t"," ",$pdfhtml);

  $pdfhtml=str_replace("\r"," ",$pdfhtml);

  $pdfhtml=str_replace("\n"," ",$pdfhtml);
  while (strpos($pdfhtml,'  ') !== false) $pdfhtml= str_replace('  ',' ',$pdfhtml);

  $pdfhtml=$printing->relativeToAbsolute($config["root_url"],$pdfhtml);

  require_once(dirname(__FILE__).'/tcpdf/tcpdf.php');
  $fontname=$printing->GetPreference("fonttype","freesans");
  //echo $fontname;
  $pdf = new TCPDF($printing->GetPreference("orientation","P"), PDF_UNIT, PDF_PAGE_FORMAT, true,$encoding);
  $pdf->SetHeaderData("", "", $title, $printing->GetPreference("pdfheader","Generated by CMS Made Simple"));

  //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
  $pdf->setHeaderFont(Array($fontname, '', $printing->GetPreference("headerfontsize","10")));
  $pdf->setFooterFont(Array($fontname, '', $printing->GetPreference("headerfontsize","10")));
  $pdf->setFont($fontname, '', $printing->GetPreference("contentfontsize","10"));
  $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  //set auto page breaks
  $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  //$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor
  $pdf->AliasNbPages();

  $pdf->AddPage();

  $pdf->writeHTML($pdfhtml, true, 0);
  @ob_clean();
  $pdf->Output($menutext.".pdf","D");


} else {
  //Printing-specific assignments
  $printing->smarty->assign("templateid", $templateid);
  $printing->smarty->assign("overridestylesheet", $printing->GetPreference("overridestyle"));

  $printing->smarty->assign("encoding", $encoding);

  $printing->smarty->assign("rooturl", $config["root_url"]."/");

  if (isset($_REQUEST["script"]) && $_REQUEST["script"]=="true") {
    $printing->smarty->assign("printscript", '<script type="text/javascript">window.print();</script>');
  } else {
    $printing->smarty->assign("printscript", '');
  }
 /* if (isset($_REQUEST["goback"]) && $_REQUEST["goback"]=="true") {
    $printing->smarty->assign("backbutton", '<FORM><INPUT class="noprint" type="button" value="&laquo; '.$this->Lang("backbuttontext").'" onClick="history.back()"></FORM><br/>');
  } else {
    $printing->smarty->assign("backbutton", '');
  }*/
  echo $printing->ProcessTemplateFromDatabase("printtemplate");
}


//echo $showcontent;

?>