<?php
namespace App\Enum;

enum TypeEnum:string{
    case ADVANCE = 'Avans Talebi';
    case ADVANCEPAY = 'Avans Kapatma';
    case COST = 'Masraf Talebi';
    case REPAY = 'İade';
}
 