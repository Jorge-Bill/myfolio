<?php
$quebra_linha="\n";
$emailsender="seuemail@alumacoisa.com";
$nomeremetente=$_POST["nome"];
$emaildestinatario="seuemail@alumacoisa.com";
$comcopia=""; //jorge.mendesx@gmail.com
$comcopiaoculta="";
//$assunto=$_POST["assunto"];
$email=$_POST["email"];
$mensagem=$_POST["mensagem"];

$mensagemHTML='<p>Formulario Myfolio </p>
<p>Nome: '.$nomeremetente. ' </p>

<p>Email: '.$email.' </p>
<p><b><i> '.$mensagem.' </i></b></p>
<hr/><br/>';

$headers="MIME-Version: 1.1".$quebra_linha;
$headers.="Content-type: text/html; charset=iso-8859-1".$quebra_linha;
$headers.="From: ".$emailsender.$quebra_linha;
$headers.="Return-Path: ".$emailsender.$quebra_linha;
$headers.="Cc: ".$comcopia.$quebra_linha;
$headers.="Bcc: ".$comcopiaoculta.$quebra_linha;
$headers.="Reply-To ".$emailsender.$quebra_linha;



//mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r".$emailsender);
//print ("Email enviado com sucesso");


if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r".$emailsender)){
	$headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
    mail($emaildestinatario, $assunto, $mensagemHTML, $headers );

}
else{
	//print ("Email enviado com sucesso");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email enviado com sucesso')
    window.location.href='index.html';
    </SCRIPT>");
    exit;
}
