<?php

namespace wp2grav;

class ContentCleaner
{

    /**
     * @var string
     * The Input String
     */
    private $stringToClean;

    function __construct(string $string ) {
        $this->stringToClean = $string;
    }

    function removeSquareBracketsPseudoCode() : array {

        $pattern = "/(\[.*?])/";

        $results = [];

        preg_match_all($pattern ,$this->stringToClean, $results);


        if(count($results[0])) {
            $this->stringToClean = preg_replace($pattern, "", $this->stringToClean);
        }

        return $results[0];

    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->stringToClean;
    }

}