<?php

namespace Acacha\Periods\Middleware;

use Acacha\Periods\Exceptions\InvalidPeriodException;
use Closure;

/**
 * Middleware Periods.
 *
 * @package Acacha\Periods\Middleware
 */
class Periods
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($period = $this->period($request)) {
            config(['database.default' => $this->connection($period)]);
        }
        return $next($request);
    }

    /**
     * Get period from session.
     *
     * @param $request
     * @return mixed
     */
    private function period($request)
    {
        return $request->session()->get($this->periodSessionVariable());
    }

    /**
     * Get period session variable name.
     *
     * @return mixed
     */
    private function periodSessionVariable()
    {
        return config('periods.session_variable');
    }

    /**
     * Get database connection from period
     * @param $period
     * @return string
     */
    private function connection($period)
    {
        $this->validate($period);

        return config('periods.periods')[$period];
    }

    /**
     * Validate period.
     *
     * @param $period
     * @throws InvalidPeriodException
     */
    private function validate($period)
    {
        if (! array_key_exists($period,config('periods.periods')) ) {
            throw new InvalidPeriodException();
        }
    }


}
