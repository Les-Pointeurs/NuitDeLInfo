<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Auth\RegisterController;
use App\Keyword;
use App\Reponse;
use App\Utilisateur;

class ChatBotController extends Controller
{

    public function index() {
        return view("chatbot");
    }

    public function get() {
        $input = request("input");

        /*
         * Keywords : list of regex
         * Results: list of chatbot's answers
         */

        $keywords = Keyword::all();

        $args = explode(" ", $input);

        $reliance = array();

        foreach ($args as $arg) {
            foreach ($keywords as $k) {
                $reli = self::compareStrings($arg, $k->motcles);

                // Key is what the regex stands for as result
                $reliance[$k->reponse_id] = $reli;

                if ($reli >= 0.8) break;
            }
        }

        $data = [];
/*
        // Try 100% match, then 80%, then 60%, then stop
        for($i = 1; $i > 0.6; $i-=0.2) { */
            foreach ($reliance as $key => $val) {
                echo $key . " " . $val;
                if ($val >= 0.8) {
                    $data[] = Reponse::find($key)->nom . " ";
                }
            }
        /*}*/

        if (empty($data))
            $data = "Aucun résultat.";

        return $data;
    }

    private static function compareStrings($a, $b) {
        $reliance = 0;

        for ($i = 0; $i < min(strlen($a), strlen($b)); $i++) {
            if ($a[$i] === $b[$i])
                $reliance++;
        }

        $reliance /= max(strlen($a), strlen($b));

        return $reliance;
    }

}
