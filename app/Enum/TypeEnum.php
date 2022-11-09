<?php
namespace App\Enum;

enum TypeEnum:string{
    case ADVANCE = 'Avans Talebi';
    case COST = 'Masraf Talebi';
    case REPAY = 'İade';
    case PAY = 'Ödeme';
}
 