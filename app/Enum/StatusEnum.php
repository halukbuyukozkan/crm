<?php
namespace App\Enum;

enum StatusEnum:string{
    case WAITING = 'beklemede';
    case COMPLETED = 'tamamlandı';
    case CANCELLED = 'iptal edildi';
}
 