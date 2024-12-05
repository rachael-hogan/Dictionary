<?php

namespace Rachaelhogan\Dictionary;

class Dictionary
{
    private $dictionary;
    /**
     * @var array|int|string
     */
    public $keyWord;

    public function __construct()
    {
        //TODO make this programatic and set dictionary values to true
        $this->dictionary = ["able" => true, "bell" => true, "boss" => true, "cast" => true, "cash" => true, "knot" => true, "note" => true, "near" => true, "over" => true, "salt" => true, "wood" => true];
        $this->keyWord = array_rand($this->dictionary, 1);
    }

    public function checkGuess($input): array
    {
        echo("Input:$input");
        echo ("Keyword:$this->keyWord");
        if ($input == $this->keyWord) {
            return [false, "You have guessed the word correctly!"];
        } else {
            $keyWordArray = str_split($this->keyWord);
            $inputArray = str_split($input);
            $flipKeyWord = array_flip($keyWordArray);
            $index = 0;
            $hint = '';
            while ($index < 4) {
                if ($keyWordArray[$index] == $inputArray[$index]) {
                    $hint .= '1';
                } else {
                    if (array_key_exists($inputArray[$index], $flipKeyWord)) {
                        $hint .= '0';
                    } else {
                        $hint .= '-';
                    }
                    $index++;
                }
            }
            return [true, $hint];
        }
    }

    public function checkValidity($input): bool {
        return array_key_exists($input, $this->dictionary);
    }

}
