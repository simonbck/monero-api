<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MoneroIntegrations\MoneroPhp\walletRPC;
use App\Models\Transaction;

class CheckPaymentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-payment-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check monero payments';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //get transactions out of database
        $transactions = Transaction::where([
            ['status', '!=', 'paid']
        ])->get();

        $walletRPC = app(walletRPC::class);


        foreach ($transactions as $transaction) {
            $get_account = $walletRPC->get_accounts($transaction->uuid);
            $balance = $walletRPC->getbalance($get_account['subaddress_accounts'][0]['account_index'])['unlocked_balance'];

            if($balance >= $transaction->amount) {
                $transaction->status = 'paid';
                $transaction->save();

                //do callback
            }
        }
    }
}
