@extends('layouts.clients')
@section('content')
<div class="container-fluid" style="min-height: 78vh;">
    <div class="container-fluid h3 mont">{{$window->windowname}}</div>
    <p class="h3 mont text-start">Transaction <br><span style="font-style:italic; font-weight:bold;" class="h4">{{$window->transaction}}</span></p>
    <div class="container-fluid d-flex">
        <div class="container-fluid">
            <table class="table table-hover table-striped">
                <thead style="border-bottom: 2px solid">
                    <tr>
                        <th class="text-center">Checklist of Requirements</th>
                        <th class="text-center">Transaction</th>
                        <th class="text-center">Where to Secure</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requirements as $requirement)
                    <tr>
                        @foreach($window_as_requirement as $win)
                        <td>{{$requirement->requirement}}</td>
                        @php
                            $transaction = DB::table('transaction')->where('id', $requirement->transaction_id)->get()->first();
                            $wind = DB::table('window')->where('id', $requirement->window_id)->get()->first();
                        @endphp
                        <td id="transactionName">{{$transaction->name}}</td>
                       <td>{{$wind->windowname}}</td>
                    </tr>
                    @endforeach
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="container-fluid">
            <form action="{{route('setTransact')}}">
                <h5 class="text-center fw-bold ">Appointment Schedule</h4>
                <br>
                <input type="hidden" name="id" value="{{$id}}">
                <input type="hidden" name="windowid" value="{{$window->id}}">
                <p class="text-center">Select Date: <br> Pending Transactions: <span class="badge bg-primary">0</span></p>
                <select name="date-selection" id="" class="form-control px-5">
                    <option value="" class="form-control">Select Date</option>
                    @foreach($date as $data)
                    <option value="{{$data->id}}" class="form-control">{{$data->from}} <span class="text-danger"> to </span> {{$data->to}}</option>
                    @endforeach
                </select>
                <br>
                <p class="text-center">Select Time: <br> Pending Transactions: <span class="badge bg-success">0</span> Available Slots: <span class="badge bg-warning">0</span></p>
                <select name="time-selection" id="" class="form-control px-5">
                    <option value="" class="form-control">Select Time</option>
                    @foreach($time as $data)
                    <option value="{{$data->id}}" class="form-control">{{$data->from}} <span class="text-danger"> to </span> {{$data->to}}</option>
                    @endforeach
                </select>
                <br>
                <p class="text-center">Select Transactions<span class="badge bg-success"></p>
                <select name="transaction-selection" id="transactions" class="form-control px-5">
                    <option value="" class="form-control">Select Transactions</option>
                    @foreach($transactions as $trans)
                    <option value="{{$trans->name}}" class="form-control transactions">{{$trans->name}}</option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success form-control" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //auto populates the table based on the selected transaction
//jquerycdn

$(document).ready(function() {
    // Get the select element for transactions
//     var transactionSelect = $('select[name="transaction-selection"]');

//     // Listen for changes in the select element
//     transactionSelect.change(function() {
//         // Get the selected transaction value
//         var selectedTransaction = $(this).val();

//         // Send an AJAX request to get the requirements for the selected transaction
//         $.ajax({
//             url: '/get-requirements/' + selectedTransaction,
//             type: 'GET',
//             success: function(response) {
//                 // Clear the table body
//                 $('table tbody').empty();

//                 // Loop through the requirements and add them to the table
//                 $.each(response, function(index, requirement) {
//                     var row = '<tr>' +
//                         '<td>' + requirement.requirement + '</td>' +
//                         '<td>' + requirement.transaction + '</td>' +
//                         '<td>' + requirement.window + '</td>' +
//                         '</tr>';
//                     $('table tbody').append(row);
//                 });
//             }
//         });
//     });


//     $('#transactions').click(function(){
//         var select = $('#transactions : selected').text();


//     // Define the text to filter by
//     var searchText = "TOR";

//     $('#transactions').click(function(){
//     var select = $('#transactions :selected').text();

//     // Define the text to filter by
//     console.log(select);    
//     var searchText = select;

//     // Loop through each tr element in the table that has a td with the searchText
//     $('table tr').filter(function() {
//         return $(this).find('td:contains(' + searchText + ')').length > 0;
//     }).each(function() {
//         // Do something with each matching tr element
//         //unhide the tr
//         $(this).show();
//     });
//     });

// });

    const selectElement = document.getElementById('transactions');
    const tableRows = document.querySelectorAll('tbody tr');
    
    selectElement.addEventListener('change', function() {

    //

   
    // Get the selected value
    const selectedValue = selectElement.options[selectElement.selectedIndex].value;
    console.log(selectedValue);
    // Loop through the table rows and show the one with a matching value
    for (const row of tableRows) {

      const cell = row.querySelectorAll('td');
      if (cell.length >= 2 && cell[1].textContent === selectedValue) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }

  });
});
</script>