<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    public $table = "wallet_transactions";

    protected $fillable = [
        'user_id', 'wallet_id', 'service_request_id', 'payment_type', 'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class, 'wallet_id');
    }
}
