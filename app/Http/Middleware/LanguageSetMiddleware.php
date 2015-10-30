<?php

	namespace App\Http\Middleware;

	use Agent;
	use App\Cookies;
	use Closure;
	use Lang;

	class LanguageSetMiddleware
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
			/*$cookies = new Cookies();

			$lang = $cookies->lang;

			if($lang === null)
			{
				$lang = Agent::languages()[0];
				$cookies->lang = $lang;
			}

			Lang::setLocale($lang);*/

			Lang::setLocale("ru");

			return $next($request);
		}
	}
