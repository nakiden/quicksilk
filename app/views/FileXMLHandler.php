<?php

class FileXMLHandler
{
    // write all records to xml file
    function saveXMLdocumentToFile($books,$Page){

        $xml = new SimpleXMLElement('<Books/>');

        foreach($books as $key) {

            $book = $xml->addChild('book');
            $book->addChild('title', $key['title']);
            $book->addChild('author',  $key['author']);
            $book->addChild('pages',  $key['pages']);
            $book->addChild('language', $key['language']);
        }
        $xml->saveXML('data/books.xml');

        // write only 5 records to xml file depends on current page

        $xml = new SimpleXMLElement('<Books/>');
        $curPage = $Page - 1;

        for ($i = ($curPage * 5); $i < (($curPage*5) + 5); $i++) {

            $book = $xml->addChild('book');
            $book->addChild('title', $books[$i]['title']);
            $book->addChild('author',  $books[$i]['author']);
            $book->addChild('pages',  $books[$i]['pages']);
            $book->addChild('language', $books[$i]['language']);
        }
        $xml->saveXML('data/pagebooks.xml');
    }
}