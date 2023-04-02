<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Transaction extends Model
{
    use HasFactory;

    public function DecimalToXmr(): Attribute {
        $xmrDecimal = $this->amount;

        $decimal = explode('.', $xmrDecimal)[0];
        $float = explode('.', $xmrDecimal)[1];
        $float = str_pad($float, 12, 0, STR_PAD_RIGHT);

        return Attribute::make(
            get: fn () => intval($decimal.$float)
        );
    }

    public function getXmrToDecimal($value) {
        $xmr = $value;

        $float = str_pad($xmr, 12, 0, STR_PAD_LEFT);
        $reversed = strrev($float);
        $splitted = str_split($reversed, 12);

        if(count($splitted) > 1) {
            $decimal = strrev($splitted[1]);
            $float = strrev($splitted[0]);
        } else {
            $decimal = 0;
        }

        return floatval($decimal.'.'.$float);
    }
}
