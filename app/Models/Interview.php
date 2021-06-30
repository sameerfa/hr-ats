<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use HasFactory;

    public const STATUS_SELECT = [
        [
            'label' => 'Shortlisted',
            'value' => '0',
        ],
        [
            'label' => 'Rejected',
            'value' => '1',
        ],
        [
            'label' => 'Offered',
            'value' => '2',
        ],
    ];

    public $table = 'interviews';

    protected $appends = [
        'status_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'job.job_title',
        'resume.name',
        'review',
        'status',
    ];

    protected $filterable = [
        'id',
        'job.job_title',
        'resume.name',
        'review',
        'status',
    ];

    protected $fillable = [
        'job_id',
        'resume_id',
        'review',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
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
