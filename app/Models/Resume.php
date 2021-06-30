<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resume extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_SELECT = [
        [
            'label' => 'Open to Work',
            'value' => 'Open to Work',
        ],
        [
            'label' => 'Currently not looking',
            'value' => 'Currently not looking',
        ],
    ];

    public const TITLE_SELECT = [
        [
            'label' => 'Mr.',
            'value' => 'Mr.',
        ],
        [
            'label' => 'Ms.',
            'value' => 'Ms.',
        ],
        [
            'label' => 'Mrs.',
            'value' => 'Mrs.',
        ],
        [
            'label' => 'Dr.',
            'value' => 'Dr.',
        ],
        [
            'label' => 'Er.',
            'value' => 'Er.',
        ],
    ];

    public $table = 'resumes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'title_label',
        'resume',
        'status_label',
    ];

    protected $orderable = [
        'id',
        'title',
        'name',
        'address',
        'city',
        'mobile',
        'email',
        'experience',
        'education',
        'skills',
        'current_employer',
        'current_position',
        'status',
    ];

    protected $filterable = [
        'id',
        'title',
        'name',
        'address',
        'city',
        'mobile',
        'email',
        'experience',
        'education',
        'skills',
        'current_employer',
        'current_position',
        'status',
    ];

    protected $fillable = [
        'title',
        'name',
        'address',
        'city',
        'mobile',
        'email',
        'experience',
        'education',
        'skills',
        'current_employer',
        'current_position',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    public function getTitleLabelAttribute()
    {
        return collect(static::TITLE_SELECT)->firstWhere('value', $this->title)['label'] ?? '';
    }

    public function getResumeAttribute()
    {
        return $this->getMedia('resume_resume')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
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
