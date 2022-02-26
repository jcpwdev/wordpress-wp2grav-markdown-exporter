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

    public function findImagePathsIn(array $strings) : array {

        $allFoundPaths = [];
        $imagePaths = [];

        foreach($strings as $string) {
            preg_match_all("/src=\"([a-z0-9.\/\-_:]*)/i", $string, $imagePaths);

            if(count($imagePaths[1]) > 0) {
                $allFoundPaths = array_merge($allFoundPaths, $imagePaths[1]);
            }
        }

        return $allFoundPaths;
    }

}