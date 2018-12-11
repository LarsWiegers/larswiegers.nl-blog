<?php

namespace App\Modules\Visitors\Domain;
use App\Modules\Blog\Domain\PublicScope;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'ip', 'url', 'user_id'
	];

	public static function allToday() {
		return self::whereDate('created_at', Carbon::today())->get();
	}

	public static function allMonth() {
		return self::whereBetween('created_at', [Carbon::today()->subMonth(), Carbon::now()])->get();
	}
	public static function allYear() {
		$startOfYear = Carbon::now()->startOfYear();
		$endOfYear = Carbon::now()->endOfYear();
		return self::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
	}

	public static function allYesterday() {
		$startOfYesterday = Carbon::today()->subDay(1)->startOfDay()->toDateString();
		$endOfYesterday = Carbon::today()->endofDay()->toDateString();
		return self::whereBetween('created_at', [$startOfYesterday, $endOfYesterday])->get();
	}

	public static function allPreviousMonth() {
		$firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonth()->toDateString();
		$lastDayofPreviousMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();
		return self::whereBetween('created_at', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])->get();
	}

	public static function allPreviousYear() {
		$startOfYear = Carbon::now()->startOfYear()->subYear();
		$endOfYear = Carbon::now()->endOfYear()->subYear();
		return self::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
	}

}
