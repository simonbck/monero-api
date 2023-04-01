@extends('layouts.app')

@section('content')
<div class="container">
     <div class="card">
         <div class="card-header bg-danger text-center">
            <b>Completed payments</b>
         </div>
         <div class="table-responsive">
             <table class="table">
                 <thead class="text-center">
                     <tr>
                         <th scope="col">UUID</th>
                         <th scope="col">source</th>
                         <th scope="col">address</th>
                         <th scope="col">amount (xmr)</th>
                     </tr>
                 </thead>
                 <tbody class="text-center">
                     @foreach ($completedTransactions as $completedTransaction)
                         <tr>
                         <td>{{ $completedTransaction->uuid }}</td>
                         <td>{{ $completedTransaction->callback }}</td>
                         <td>{{ $completedTransaction->address }}</td>
                         <td>{{ $completedTransaction->amount }}</td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
    </div>

<br>

    <div class="card">
        <div class="card-header bg-danger text-center">
            <b>Pending payments</b>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th scope="col">UUID</th>
                    <th scope="col">callback</th>
                    <th scope="col">address</th>
                    <th scope="col">amount (xmr)</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pendingTransactions as $pendingTransaction)
                        <tr>
                        <td>{{ $pendingTransaction->uuid }}</td>
                        <td>{{ $pendingTransaction->callback }}</td>
                        <td>{{ $pendingTransaction->address }}</td>
                        <td>{{ $pendingTransaction->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
