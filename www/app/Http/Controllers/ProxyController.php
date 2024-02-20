<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Actions\CheckProxiesAction;

/**
 * 52.222.28.135:443
 * 185.189.199.75:23500
 * 72.10.164.178:2309
 */

final class ProxyController extends Controller
{
    public function checkProxies(Request $request, CheckProxiesAction $checkProxiesAction): View
    {
        $proxies = $checkProxiesAction($request->proxies);
        return view('proxy.show', compact('proxies'));
    }
}
