@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="dashboardLeft">
        <div class="dashbordLBox">
            <div class="que">
                <h4 class="mont">On Queue</h4>
                <div><a id="appointment">Add Transaction</a></div>
            </div>
            <div class="filters">
                <p>Filter Transactions</p>
                <form action="" method="get" class="filterForm">
                    <div>
                        <input type="date" name="data" class="date">
                    <input type="time" name="time" class="time">
                    <button class="setBtn">Set</button>
                    </div>
                    <input type="text" name="search" class="search" placeholder="Search for Request No or Type">
                </form>
            </div>
            <div class="transactions">
                <p>Pending Transactions: <span class="value">0</span></p>
                <div class="divs container-fluid">
                    <table>
                        <thead class="text-center">
                            <tr>
                                <th>Request No.</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $item)
                            @if ($item->isVisible===0   )
                             <tr>
                                <td> <a href="/home/{{$item->studentid}}"> {{$item->id}} </a></td>
                                <td class="px-3">{{$item->wind->transaction}}</td>
                                <td id="appointment" class="d-flex gap-2 pt-1">
                                <p>{{$item->course}}</p>
                               <a href="{{route('approve',$item->id)}}" class="btn btn-sm btn-success">Approve</a>
                                    <a href="{{route('deny',$item->id)}}" class="btn btn-sm btn-danger">Deny</a>
                                </td>
                          
                            </tr>  
                               @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- code here that add transaction and requirements --}}
    <div class="flex ">
        <div id="transaction" class="dashbordRBox w-50 py-3 h-auto z-30 position-absolute mx-5 flex-wrap none">
        
        
        <form method="GET" action="{{ route('addTransaction', $user)}}"  id="window" class="col p-4">
        <div class="flex-wrap py-2">
        <h4>Add Transaction</h4>
        </div>
            @csrf
            <div class="form-group">
                <label for="transaction">Transaction:</label>
                <input type="text" class="form-control" id="transaction" name="transaction" required>
            </div>
            <div class="form-group">
                <label for="transaction">Where to Secure</label>
                <select name="window_id[]" class="form-control">
                @foreach($windows as $wind)
                <option class="form-control" value="{{$wind->id}}">{{$wind->windowname}}</option>
                @endforeach
            </select> 
            </div>
           
            <div class="form-group">
                <input i type="text" class="window" name="requirements[]" placeholder="Enter Requirements"> 
                <button type="button" onclick="addRequirementInput()">Add Requirement</button>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
    
    <div class="dashboardRight">
        <div class="dashbordRBox">
        {{-- student profile/info
            kung gusto mo dagdagan si information ng student.
            call mo lang {{$stuedent->columnName}} --}}
        @if(empty($student))

            <img src="/assets/empty.jpg" alt="">
        @else
        <p id="studentName" class="">{{$student->firstname ?? ''}}{{$student->middlename}}{{$student->surname ?? ''}}{{$program->program_name ?? ''}}</p>
        <p id="studentCourse" class="">{{$student->yearlevel}}</p>
        <p id="studentYear" class=""></p>
        <p id="studentSection" class=""></p>
        <p id="studentNumber" class=""></p>
        @endif
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#appointment').click(function(){
            if($('#transaction').is(':visible')){
                $('#transaction').hide();
                $('#appointment').text('Add Transaction');
            }
            else{
                $('#transaction').show();
                $('#appointment').text('Close');
            }
        });
    });

    function addRequirementInput() {
                        
                        
                        var form = document.getElementById("window");
                        //create also an element for select
                        var select = document.createElement("select");
                        select.name = "window_id[]";
                        select.className = "form-control";
                        var option = document.createElement("option");
                        option.className = "form-control";
                        option.value = "";
                        option.text = "Select Window";
                        select.appendChild(option);
                        @foreach($windows as $wind)
                        var option = document.createElement("option");
                        option.className = "form-control";
                        option.value = "{{$wind->id}}";
                        option.text = "{{$wind->windowname}}";
                        select.appendChild(option);
                        @endforeach
                        form.insertBefore(select, form.childNodes[7]);

                        var input = document.createElement("input");
                        input.type = "text";
                        input.name = "requirements[]";
                        input.placeholder = "Enter Requirement";
                        input.className = "window";
                   
                        form.insertBefore(input, form.childNodes[8]);
                    }
</script>
@endsection
