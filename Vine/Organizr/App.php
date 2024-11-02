<?php //*** App ~ organizr » Yale™ Library - Yet Another Laravel Elevator © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace Yale\Vine\Organizr;

use Yale\Xero\Http\RouteX;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class App extends Controller
{
	// ◈ === index »
	public static function index()
	{
		$route = RouteX:: as('login');
		if (Auth::check()) {
			$route = RouteX:: as('dashboard');
		}
		return redirect($route);
	}

}//> end of organizr ~ App