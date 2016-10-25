<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{

  protected $fillable = [
      'eventName', 'eventLocation', 'organization', 'description', 'eventDate', 'eventStartTime', 'eventEndTime', 'paymentStatus', 'eventSmallImage',
      'school_id', 'eventLargeImage', 'category', 'created_at', 'updated_at', 'address',
      'eventLevel', 'eventLink', 'user_id'
  ];

    public function school()
    {
      return $this->belongsTo(School::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function payment()
    {
      return $this->has(Payment::class);
    }

    public function scopeWeek($query)
    {

      $d=strtotime("+6 Days");
      $today=date("Y-m-d");
      $weekSpan = date("Y-m-d", $d);

      return $query->where('eventDate', '<=',  $weekSpan)->where('eventDate', '>=', $today);
    }

    public function scopeMonth($query)
    {

    }

    public function scopeFuture($query)
    {
      $today=date("Y-m-d");
      return $query->where('events.eventDate', '>=', $today);
    }

    public function scopePast($query)
    {
      $today=date("Y-m-d");
      return $query->where('events.eventDate', '<', $today)->join('payments', 'events.id', '=', 'event_id')->where('payments.status', '=', 'Success')->orWhere('events.eventLevel', '=', 'Free');
    }

    public function scopePopular($query)
    {

      return $query->where('likeCount', '>=', 50)->orWhere('attendingCount', '>=', 50);

    }

    public function scopeFeature($query)
    {

      return $query->where('events.eventLevel', 'Gold');

    }

    public function images() {
        return $this->hasMany("App\Models\Image");
    }
}
