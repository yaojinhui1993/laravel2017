<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $this->comments()->create([
            'body' => $body
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter)
    {
        if ($month = $filter['month']) {
            $query = $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filter['year']) {
            $query = $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('YEAR(created_at) year,MONTHNAME(created_at) month,count(*) published')
            ->groupBy('YEAR', 'MONTH')
            ->orderByRaw('min(created_at)', 'desc')
            ->get();
    }
}
