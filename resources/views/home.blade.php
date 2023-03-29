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
                 <tr>
                     <td>7142-jads-89dasd-dasasd</td>
                     <td>Marketplace</td>
                     <td>8AWgjxo6zkSVn7UmNSAm553hoWSnxbjEHbBo7guGzyaiKqg4hHD9rpXdkiShrVbHVa6uPGfpbJS9UHW7QHKFKNRu6AmqUqk</td>
                     <td>1.2</td>
                 </tr>
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
                    <th scope="col">source</th>
                    <th scope="col">address</th>
                    <th scope="col">amount (xmr)</th>
                    <th scope="col">amount recieved(xmr)</th>
                    <th scope="col">confirmations</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr>
                    <td>7142-jads-89dasd-dasasd</td>
                    <td>Marketplace</td>
                    <td>8AWgjxo6zkSVn7UmNSAm553hoWSnxbjEHbBo7guGzyaiKqg4hHD9rpXdkiShrVbHVa6uPGfpbJS9UHW7QHKFKNRu6AmqUqk</td>
                    <td>1.2</td>
                    <td>0.0</td>
                    <td>0</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
