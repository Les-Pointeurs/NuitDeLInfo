<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Auth\RegisterController;
use App\Utilisateur;

class ChatBotController extends Controller
{

    public function get($input) {
        $data = "";

        /*
         * Keywords : list of regex
         * Results: list of chatbot's answers
         */

        // $keywords = ChatBotModel::keywords();
        // $results = ChatBotModel::results($keywords);
        $keywords = array();
        $results = array();

        $args = explode(" ", $input);

        $reliance = array();

        foreach ($args as $arg) {
            foreach ($keywords as $k) {
                // Key is what the regex stands for as result
                $reliance[$results[$k]] = compareStrings($arg, $k);
            }
        }

        // Try 100% match, then 80%, then 60%, then stop
        for($i = 1; $i > 0.6; $i-=0.2) {
            foreach ($reliance as $key => $val) {
                if ($val >= $i)
                    $data .= $key;
            }
        }

        view("chatbot", $data);
    }

    private static function compareStrings($a, $b) {
        $reliance = 0;

        for ($i = 0; $i < strlen($a); $i++) {
            if ($a[$i] === $b[$i])
                $reliance++;
        }

        $reliance /= strlen($a);

        return $reliance;
    }

}
