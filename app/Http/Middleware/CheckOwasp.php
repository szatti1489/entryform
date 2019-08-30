<?php
/*
    The considered OWASP standards:
	SQL Injection (SQLi)
	Cross Site Scripting (XSS)
	Local File Inclusion (LFI)
	Remote File Inclusion (RFI)
	Remote Code Execution (RCE)
	PHP Code Injection
	HTTP Protocol Violations
	Shellshock
	Session Fixation
	Scanner Detection
	Metadata/Error Leakages
	Project Honey Pot Blacklist
	GeoIP Country Blocking
*/

namespace App\Http\Middleware;

use Closure;

class CheckOwasp
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle($request, Closure $next)
    {
        try {
            $this->checkGeoIP($request);
        } catch (\Exception $e) {
            abort(403, $e->getMessage());
        }

        return $next($request);
    }

    private function checkGeoIP($request){
        $IPs = [
            // Blaclisted IPs here
        ];

        if(in_array($request->server->get('REMOTE_ADDR'), $IPs)) {
            throw new \Exception($request->server->get('REMOTE_ADDR'));
        }
    }
}
