<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Kyslik\ColumnSortable\Sortable;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['trans_code', 'trans_date', 'cust_name', 'total_room_price', 'total_extra_charge', 'final_total'];
    
    public function detail(): HasOne
    {
        return $this->hasOne(DetailTransaction::class);
    }
}