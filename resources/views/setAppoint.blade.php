@extends('layouts.clients')
@section('content')
<div class="bg-light container-fluid p-0">
    <div class="container-fluid p-0 d-flex pt-2 rounded gap-2">
        <div class="fives d-flex flex-column rounded">
            <div>
                <p class="appointmentags text-center pt-2 m-0 pb-0">Appointments</p>
                <hr class="mx-3">
                <table class="table table-striped">
                    @foreach ($apps as $item)
                    @if ($item->studentid)
                    @if ($item->studentid === $id)
                    <tr>
                        <td><span class="fw-bolder">Office: </span>{{$item->wind->windowname}} {{$item->wind->windowno}} <br> <span class="fw-bolder">Transaction: </span> {{$item->wind->transaction}} <br> <span class="fw-bolder">Time: </span> {{$item->time->from}} - {{$item->time->to}}
                        <br> <span class="fw-bolder">Date: </span> {{$item->sched->from}} - {{$item->sched->to}}
                    </td>
                    </tr>
                    @endif
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        <div class="fifty rounded">
            <div class="heads">
                <p class="appointmentags text-center pt-2 m-0 pb-0">Transacting Offices</p>
                <hr class="mx-3 text-danger">
            </div>
            
            <div class="container-fluid p-0 gridmarks">
                @foreach($window as $tansact)
                <div class="cards">
                    <img src="/assets/caramoan.jpg" alt="">
                    <div class="container-fluid p-0 d-flex flex-column">
                        <p class="titles">{{$tansact->windowname}} - {{$tansact->windowno}}</p>
                        <p class="desc">{{$tansact->transaction}}</p>
                    </div>
                    <div class="container-fluid p-0 text-center">
                        <a href="{{route('request',[$id,$tansact->id])}}" class="btn btn-danger montt form-control py-1">Request</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="fives rounded">
            <div class="hedas">
                <p class="appointmentags text-center pt-2 m-0 pb-0">Notifications</p>
                <hr class="mx-3 text-danger">
            </div>
            <div class="container-fluid d-flex justify-content-evenly gap-2 align-items-center">
                <a href="#all" class="btn btn-sm btn-primary">All</a>
                <a href="" class="btn btn-sm btn-warning">Message</a>
                <a href="" class="btn btn-sm btn-success">Feedback</a>
                <a href="#denied" class="btn btn-sm btn-danger">Denied</a>
            </div>
            <div class="container-fluid d-flex flex-column justify-content-evenly align-items-center flows" >
               <div class="container-fluid d-flex flex-column pt-2" style="height: 380px; overflow-y: scroll;">
                <div class="container-fluid p-0 pb-4" id="all">
                    <div class="container-fluid p-0 h5 montt fw-bold">Earlier
                        <hr class="mx-2">
                    </div>
                    <div class="denied">
                        <table class="table table-striped">
                            @foreach ($apps as $item)
                                @if ($item->studentid)
                                    @if ($item->studentid === $id)
                                        @foreach ($status as $stat)
                                            @if ($stat->appointment_id === $item->id && $stat->status===3)
                                                    <tr>
                                                        <td><span class="fw-bolder">Office: </span>{{$item->wind->windowname}} {{$item->wind->windowno}} <br> <span class="fw-bolder">Transaction: </span> {{$item->wind->transaction}} <br> <span class="fw-bolder">Time: </span> {{$item->time->from}} - {{$item->time->to}}
                                                            <br> <span class="fw-bolder">Date: </span> {{$item->sched->from}} - {{$item->sched->to}}
                                                        </td>
                                                    </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                {{-- code forda message --}}
                <div class="container-fluid p-0 pb-4">
                    <div class="container-fluid p-0 h5 montt fw-bold">Message
                        <hr class="mx-2">
                    </div>
                    {{--  ang logic igdi, ni call ko ang table status tas si appointment.
                        ika na lang mag edit kung anong gusto mong message dipende sa status. nasa if else block --}}
                    @foreach ($apps as $app )
                        @if($app->studentid === $id)
                            @foreach ($status as $stat)
                                @if($app->id === $stat->appointment_id)
                                <div class="container-fluid">
                                    Your request is on {{$app->wind->windowname}}
                                @if($stat->status==0)
                                    Approved
                                @elseif($stat->status==3)
                                        Pending
                                @elseif($stat->status==2)
                                        Denied
                                @endif
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    
                    
                </div>
                {{-- end code forda message --}}
                <div class="container-fluid p-0 pb-4">
                    <div class="container-fluid p-0 h5 montt fw-bold">Feedback
                        <hr class="mx-2">
                    </div>
                    <div class="container-fluid">Feedback Here</div>
                </div>
                <div class="container-fluid p-0 pb-4" id="denied">
                    <div class="container-fluid p-0 h5 montt fw-bold text-danger">Denied
                        <hr class="mx-2">
                    </div>
                        <div class="denied">
                            <table class="table table-striped">
                                @foreach ($apps as $item)
                                    @if ($item->studentid)
                                        @if ($item->studentid === $id)
                                            @foreach ($status as $stat)
                                                @if ($stat->appointment_id === $item->id && $stat->status===2)
                                                        <tr>
                                                            <td><span class="fw-bolder">Office: </span>{{$item->wind->windowname}} {{$item->wind->windowno}} <br> <span class="fw-bolder">Transaction: </span> {{$item->wind->transaction}} <br> <span class="fw-bolder">Time: </span> {{$item->time->from}} - {{$item->time->to}}
                                                                <br> <span class="fw-bolder">Date: </span> {{$item->sched->from}} - {{$item->sched->to}}
                                                            </td>
                                                        </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            </table>
                        </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection