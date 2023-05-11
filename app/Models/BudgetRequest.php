<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BudgetRequest extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'budget_requests';

    protected $dates = [
        'request_date',
        'sent_date',
        'deadline_date',
        'adjudicated_date',
        'concluded_date',
        'invoice_date',
        'survey_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reference',
        'urgency_id',
        'client_id',
        'request',
        'request_date',
        'request_mode',
        'sent',
        'sent_date',
        'sent_mode',
        'deadline',
        'deadline_date',
        'deadline_mode',
        'adjudicated',
        'adjudicated_date',
        'adjudicated_mode',
        'concluded',
        'concluded_date',
        'concluded_mode',
        'invoice',
        'invoice_date',
        'invoice_mode',
        'survey',
        'survey_date',
        'survey_mode',
        'work_data_1',
        'work_data_1_1',
        'work_data_1_2',
        'work_data_2',
        'work_data_3',
        'work_data_4',
        'work_data_5',
        'work_data_6',
        'work_data_7',
        'work_data_8',
        'address',
        'location_info',
        'info_id',
        'obs',
        'duration_hours',
        'duration_days',
        'duration_saturdays',
        'duration_nights',
        'other_information',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function urgency()
    {
        return $this->belongsTo(Urgency::class, 'urgency_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getRequestDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRequestDateAttribute($value)
    {
        $this->attributes['request_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSentDateAttribute($value)
    {
        $this->attributes['sent_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDeadlineDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeadlineDateAttribute($value)
    {
        $this->attributes['deadline_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getAdjudicatedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAdjudicatedDateAttribute($value)
    {
        $this->attributes['adjudicated_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getConcludedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setConcludedDateAttribute($value)
    {
        $this->attributes['concluded_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSurveyDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSurveyDateAttribute($value)
    {
        $this->attributes['survey_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function info()
    {
        return $this->belongsTo(Info::class, 'info_id');
    }

    public function surface_types()
    {
        return $this->belongsToMany(SurfaceType::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
