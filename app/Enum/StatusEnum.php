<?php
namespace App\Enum;

enum StatusEnum:string{
    case WAITING = 'beklemede';
    case APPROVED = 'onaylandı';
    case COMPLETED = 'tamamlandı';
    case CANCELLED = 'iptal edildi';
}
 