<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Auth\RegisterController;
use App\Utilisateur;

class ChatBotController extends Controller
{

    public function get($input) {
        // $keywords = ChatBotModel::keywords();
        $keywords = array();

        $args = explode(" ", $input);

        foreach ($args as $arg) {
            foreach ($keywords as $k) {
                $reliance[] = compareStrings($arg, $k);
            }
        }


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
