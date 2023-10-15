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
                        <th class="text-center">Where to Secure</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>{{$window->windowname}}</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit.</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit.</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit.</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit.</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem ipsum dolor sit.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid">
            <form action="{{route('setTransacts')}}">
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
                <button class="btn btn-success form-control" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection