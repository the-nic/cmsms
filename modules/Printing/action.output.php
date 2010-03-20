<?php
if( !isset($gCms) ) exit;
if( !isset($params['url']) ) exit;
if( !isset($params['pageid']) ) exit;

$url = '';
$pdf = false;
$script = false;
$includetemplate=false;
$title = '';
$templateid='';
$menutext='';
$pageid;
$config =& $gCms->GetConfig();

$url             = base64_decode($params['url']);
$pageid          = (int)$params['pageid'];
$pdf             = (int)$params['pdf'];
$pdf             = $pdf && $this->GetPreference('pdfenable');

$script          = (int)$params['script'];
$includetemplate = (int)$params['includetemplate'];
// get the output content.
$showcontent = '';
if( startswith($url,$config['root_url']) ) {
  $showcontent = $this->GetURLContent($url);
  if (isset($_REQUEST["includetemplate"]) && $_REQUEST["includetemplate"]=="true") {
    $showcontent=$this->GetBody($showcontent);
  }
}

$contentops =& $gCms->GetContentOperations();
$content =& $contentops->LoadContentFromId($pageid);
$title = $content->Name();
$templateid = $content->TemplateId();
$menutext = $content->MenuText();

$this->smarty->assign("title",$title);
$this->smarty->assign("content", $showcontent);
$this->smarty->assign("url", $url);
$encoding=$config['default_encoding'];

// kill any output that may have happened already.
$handlers = ob_list_handlers(); 
for ($cnt = 0; $cnt < sizeof($handlers); $cnt++) { ob_end_clean(); }

if ($pdf) 
  {
    $pdfhtml=$this->ProcessTemplateFromDatabase("pdftemplate");
    
    $pdfhtml=str_replace("\t"," ",$pdfhtml);
    
    $pdfhtml=str_replace("\r"," ",$pdfhtml);
    
    $pdfhtml=str_replace("\n"," ",$pdfhtml);
    while (strpos($pdfhtml,'  ') !== false) $pdfhtml= str_replace('  ',' ',$pdfhtml);
    
    $pdfhtml=$this->relativeToAbsolute($config["root_url"],$pdfhtml);
    
    require_once(dirname(__FILE__).'/tcpdf/tcpdf.php');
    $fontname=$this->GetPreference("fonttype","freesans");
    //echo $fontname;
    $pdf = new TCPDF($this->GetPreference("orientation","P"), PDF_UNIT, PDF_PAGE_FORMAT, true,$encoding);
    $pdf->SetHeaderData("", "", $title, $this->GetPreference("pdfheader","Generated by CMS Made Simple"));
    
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array($fontname, '', $this->GetPreference("headerfontsize","10")));
    $pdf->setFooterFont(Array($fontname, '', $this->GetPreference("headerfontsize","10")));
    $pdf->setFont($fontname, '', $this->GetPreference("contentfontsize","10"));
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
  } 
else 
  {
    //Printing-specific assignments
    $smarty->assign("templateid", $templateid);
    $smarty->assign("overridestylesheet", $this->GetPreference("overridestyle"));
    $smarty->assign("encoding", $encoding);
    $smarty->assign("rooturl", $config["root_url"]."/");
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    header("Content-Type: " . $gCms->variables['content-type'] . "; charset=" . (isset($pageinfo->template_encoding) && $pageinfo->template_encoding != ''?$pageinfo->template_encoding:get_encoding())); 
    if ($script) {
      $smarty->assign("printscript", '<script type="text/javascript">window.print();</script>');
    } else {
      $smarty->assign("printscript", '');
    }
    echo $this->ProcessTemplateFromDatabase("printtemplate");
  }

exit;