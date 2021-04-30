<?php

if (!function_exists('nb_produit')) {
    function nb_produit($nb)
    {
        if ($nb > 1) {
            return $nb.'produits';
        } else {
            return $nb.'produit';
        }
    }
}
// if (function_exists('locale_info')) {
//     function nb_prix($locale_info)
//     {
//         if ($locale_info !== setlocale(LC_ALL, 'nl_NL.UTF-8@euro')) {
//             return $locale_info.setlocale();
//         } else {
//             return $locale_info.localeconv();
//         }
    // }

    if (!function_exists('separateur_fcfa')) {
        function separateur_fcfa($nb)
        {
            return number_format($nb, 0, ',', ' ').' F CFA';
        }
    }

 //ce ficihier set a accorderles pluriekls de mots
