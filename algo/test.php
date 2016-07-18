<?php
// download fpdf class (http://fpdf.org)
require("fpdf/fpdf.php");
// fpdf object
$pdf = new FPDF();
// generate a simple PDF (for more info, see http://fpdf.org/en/tutorial/)
$pdf->AddPage();
$pdf->SetFont("Arial","B",14);
$pdf->Cell(40,10, "this is a pdf example");
// email stuff (change data below)
$to = "satenderjpr@gmail.com";
$from = "satenderjpr@gmail.com";
$subject = "send email with pdf attachment";
$message = "<p>Please see the attachment.</p>";
// a random hash will be necessary to send mixed content
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
// attachment name
$filename = "doc.pdf";
// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));
// main header (multipart mandatory)
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;
// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;
// attachment
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
$headers .= "Content-Transfer-Encoding: base64".$eol;
$headers .= "Content-Disposition: attachment".$eol.$eol;
$headers .= $attachment.$eol.$eol;
$headers .= "--".$separator."--";
// send message
mail($to, $subject, "", $headers);
?>