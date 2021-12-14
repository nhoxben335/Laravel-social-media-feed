<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IsUserAdmin
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
        $currentUserRolesRows = DB::table("role_user")->where("user_id", "=", Auth::id())->get();

        if($currentUserRolesRows !== null)
        {
            foreach($currentUserRolesRows as $row)
            {
                if($row->role_id == 1)
                {
                    return $next($request);
                }
            }
        }

        return redirect()->back()->with(['message' => 'Access denied: You are not a user admin.', 'alert' => 'alert-danger']);
    }
}
