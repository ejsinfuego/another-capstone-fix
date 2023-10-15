@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="dashboardLeft">
        <div class="dashbordLBox">
            <div class="que">
                <h4 class="mont">On Queue</h4>
                <div><a href="">Table View</a></div>
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
</script>
@endsection
