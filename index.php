<?php 

require __DIR__.'/Xml.php';

// Imprime resultado na tela
echo Xml::create('1.0','UTF-8');

// gera o arquivo xml
Xml::create('1.0','UTF-8', true);

// le uma string xml e transforma em um objeto
$contentFileXml = file_get_contents(__DIR__.'/xmls/arquivo.xml');
$resultXml = Xml::readXml($contentFileXml);

echo "ID:". $resultXml->user->id."<br/>";
echo "Email:". $resultXml->user->email."<br/>";
echo "Nome:". $resultXml->user->nome."<br/>";