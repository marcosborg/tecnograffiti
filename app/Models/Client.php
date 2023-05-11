<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'client_type_id',
        'address',
        'shipping_address',
        'location',
        'zip',
        'department',
        'phone_1',
        'phone_2',
        'vat',
        'contact',
        'celphone',
        'email',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client_type()
    {
        return $this->belongsTo(ClientType::class, 'client_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
