<?php

namespace App;

use Carbon\CarbonPeriod;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function auctions()
    {
        return $this->hasMany('App\Auction');
    }

    public function freeTimeRemaining()
    {
        $date = Carbon::createFromDate($this->start_date);
        $start_year = $date->year;
        $current_year = Carbon::now()->year;
        $freeTime = config('FREE_TIME', 24);
        $periods = $this->hours;
        $parts = [];

        if ($date !== $date->copy()->startOfYear() && $start_year === $current_year) {
            foreach($periods as $period)
            {
                $months = $this->calculatePeriod($period->from, $period->to);
                $parts[] = $freeTime * ($period->weekly_hours / 40) * ($months  / 12);
            }

            return array_sum($parts);
        } //entire year in service
        else {
            foreach($periods as $period)
            {
                $parts[] = $freeTime * ($period->weekly_hours / 40);
            }
            return array_sum($parts);
        }
    }

    public function calculatePeriod($from, $to)
    {
        $from = Carbon::parse($from)->copy();
        $to = Carbon::parse($to)->copy();
        $months = $from->floatDiffInMonths($to);
        return $months;
    }

    public function hours()
    {
        return $this->hasMany('App\Hours');
    }
}
