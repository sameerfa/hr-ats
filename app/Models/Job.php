<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use HasFactory;

    public const STATUS_SELECT = [
        [
            'label' => 'Open',
            'value' => '0',
        ],
        [
            'label' => 'Hold',
            'value' => '1',
        ],
        [
            'label' => 'Closed',
            'value' => '2',
        ],
    ];

    public const PRIORITY_SELECT = [
        [
            'label' => 'High',
            'value' => 'High',
        ],
        [
            'label' => 'Medium',
            'value' => 'Medium',
        ],
        [
            'label' => 'Low',
            'value' => 'Low',
        ],
    ];

    public $table = 'jobs';

    protected $appends = [
        'priority_label',
        'status_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'job_title',
        'company.company_name',
        'expected_experience',
        'ctc',
        'city',
        'priority',
        'status',
    ];

    protected $filterable = [
        'id',
        'job_title',
        'company.company_name',
        'expected_experience',
        'ctc',
        'city',
        'priority',
        'status',
    ];

    protected $fillable = [
        'job_title',
        'company_id',
        'expected_experience',
        'ctc',
        'city',
        'job_description',
        'responsibilities',
        'skills',
        'priority',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getPriorityLabelAttribute()
    {
        return collect(static::PRIORITY_SELECT)->firstWhere('value', $this->priority)['label'] ?? '';
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_SELECT)->firstWhere('value', $this->status)['label'] ?? '';
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
