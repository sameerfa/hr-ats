<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use HasFactory;

    public $table = 'companies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'company_name',
        'address',
        'city',
        'contact_name',
        'contact_email',
        'contact_mobile',
        'contact_designation',
        'company_website',
    ];

    protected $filterable = [
        'id',
        'company_name',
        'address',
        'city',
        'contact_name',
        'contact_email',
        'contact_mobile',
        'contact_designation',
        'company_website',
    ];

    protected $fillable = [
        'company_name',
        'address',
        'city',
        'contact_name',
        'contact_email',
        'contact_mobile',
        'contact_designation',
        'company_website',
        'created_at',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
