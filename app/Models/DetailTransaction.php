<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Kyslik\ColumnSortable\Sortable;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $fillable = ['trans_id', 'room_id', 'days', 'sub_total_room', 'extra_charge'];
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'trans_id');
    }
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
