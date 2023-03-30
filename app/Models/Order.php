<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_PREPARE = 0;
    const STATUS_SHIPING = 1;
    const STATUS_DONE = 2;
    const STATUS_CANCEL = -1;
    const STATUS_TEXT = [
        self::STATUS_PREPARE => 'Chuẩn bị hàng',
        self::STATUS_SHIPING => 'Đang giao',
        self::STATUS_DONE => 'Hoàn thành',
        self::STATUS_CANCEL => 'Hủy đơn'
    ];

    protected $fillable = [
        'name',
        'phone',
        'address',
        'type',
        'status',
        'discount',
        'costs_incurred',
        'deposit',
        'note'
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
