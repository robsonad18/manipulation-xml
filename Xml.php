<?php

/**
 * Responsavel por manipular e criar XML
 * @package 
 */
class Xml {
   /**
    * Cria XML
    * @param string $version 
    * @param string $encoding 
    * @return void 
    */
   public static function create(string $version, string $encoding, bool $saveFile = false)
   {
      // instancia do documento
      $dom = new DOMDocument($version, $encoding);

      // formata a saida do xml
      $dom->formatOutput = true;

      // nó de usuario
      $userNode = $dom->createElement('user');
      $userNode = self::nodeUser($dom, $userNode);

      // instancia do nó root - nó principal
      $rootNode = $dom->createElement('root');
      $rootNode->appendChild($userNode);
      $dom->appendChild($rootNode);

      if ($saveFile){
         $dom->save(__DIR__.'/xmls/arquivo.xml');
         return;
      }
      // imprime xml na tela
      return $dom->saveXML();
   }


   /**
    * Adiciona valores ao nó de usuario
    * @param DOMDocument $dom 
    * @param DOMElement $userNode 
    * @return DOMElement 
    */
   public static function nodeUser(DOMDocument $dom, DOMElement $userNode):DOMElement{
      // nó de id do usuario
      $idNodeValue = $dom->createTextNode(10);
      $idNode = $dom->createElement('id');
      $idNode->appendChild($idNodeValue);

      // nó de email do usuario
      $emailNodeValue = $dom->createTextNode('teste@gmail.com');
      $emailNode = $dom->createElement('email');
      $emailNode->appendChild($emailNodeValue);

      // nó de nome do usuario
      $nameNodeValue = $dom->createCDATASection('João Farias');
      $nameNode = $dom->createElement('nome');
      $nameNode->appendChild($nameNodeValue);

      $userNode->appendChild($idNode);
      $userNode->appendChild($emailNode);
      $userNode->appendChild($nameNode);

      return $userNode;
   }


   /**
    * Le um arquivo XML e retorna um objeto
    * @param string $pathXml 
    * @return SimpleXMLElement|false 
    */
   public static function readXml(string $pathXml):object
   {
      // carrega o xml com base em uma string
      $xml = simplexml_load_string($pathXml);
      return $xml;
   }

}