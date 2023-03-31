<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use MoneroIntegrations\MoneroPhp\walletRPC;

class ApiController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $walletRPC =  app(walletRPC::class);

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

        $transaction = new Transaction();
        $transaction->amount = $data['amount'];
        $transaction->callback = $data['callback_url'];
        $transaction->uuid = $data['uuid'];
        $transaction->address = $data['address'];
        $transaction->save();

        return response()->json(
                $data
            );
    }
}
