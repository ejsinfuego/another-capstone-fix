@extends('layouts.app')

@section('content')
<div class="container-fluid pt-3" style="min-height: 77vh;">
    <h4 class="text-center">Transaction History</h4>
    <div style="height: 70vh; overflow-y: scroll">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Request No.</th>
                    <th>Transaction</th>
                    <th>Window</th>
                    <th>Resquestor</th>
                    <th>Resquestor ID/Name</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($apps as $item)
                     @foreach ($status as $stat)
                            @if ($stat->appointment_id === $item->id)
                                @if ($stat->status===1 ||$stat->status===2)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->wind->transaction}}</td>
                                        <td>{{$item->wind->windowname}}</td>
                                        <td>{{$item->category}}</td>
                                        <td>@if ($item->guests) {{--GUEST--}}
                                                {{$item->guests->firstname}} {{$item->guests->middlename}} {{$item->guests->surname}}
                                            @else {{--STUDENT--}}
                                                {{$item->students->studentId}} 
                                            @endif
                                        </td>
                                        <td>
                                            
                                                <span class="badge {{$stat->status==1 ? 'bg-success' : 'bg-danger'}} px-3">{{$stat->status==1 ? 'Approved' : 'Rejected'}}</span>
                                            
                                        </td>
                                        <td>
                                            {{$item->sched->from}}
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection