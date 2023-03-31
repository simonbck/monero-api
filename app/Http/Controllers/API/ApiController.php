<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MoneroIntegrations\MoneroPhp\walletRPC;

class ApiController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $walletRPC = new walletRPC('10.0.2.2', 28083, false);
        $walletRPC->open_wallet('main', '');

        $create_account = $walletRPC->create_account();
        $walletRPC->tag_accounts([$create_account['account_index']], $request->input('uuid'));


        $addressCount = count($walletRPC->get_accounts($request->input('uuid'))['subaddress_accounts']);
        if($addressCount != 1) {
            dd('uuid schon verwendet');
        }


        $get_account = $walletRPC->get_accounts($request->input('uuid'));
        $address = $get_account['subaddress_accounts'][0]['base_address'];

        $data = $request->all();
        $data['address'] = $address;

        return response()->json(
                $data
            );
    }
}
