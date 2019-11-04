<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AminoAcid_help  {
    var $name;  // nombre aa 
    var $symbol;    // símbolo de tres letras
    var $code;  // código de una letra
    var $type;  // hidrofóbico, cargado or neutral
    
    function AminoAcid ($aa)
    {
        foreach ($aa as $k=>$v)
            $this->$k = $aa[$k];
    }


function readDatabase($filename)
{
    // read the XML database of aminoacids
    $data = implode("", file($filename));
    $parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, $data, $values, $tags);
    xml_parser_free($parser);

    // repetir a través de las extructuras
    foreach ($tags as $key=>$val) {
        if ($key == "urun") {
            $molranges = $val;
            // cada par contiguo de netradas de array son los 
            // rangos altos y bajos para cada definición de molécula
            for ($i=0; $i < count($molranges); $i+=2) {
                $offset = $molranges[$i] + 1;
                $len = $molranges[$i + 1] - $offset;
                $tdb[] = $this->parseMol(array_slice($values, $offset, $len));
            }
        } else {
            continue;
        }
    }
    return $tdb;
}

function parseMol($mvalues)
{
    for ($i=0; $i < count($mvalues); $i++) {
        $mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
    }
    return $this->AminoAcid($mol);
}
}
