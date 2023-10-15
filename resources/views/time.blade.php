@extends('layouts.settings')
@section('content')

                <h4 class="programname">Time Management</h4>
                <p style="text-align:center">Time Schedule and Appointment Limit Setup</p>
                <div class="programbox">
                    <div class="programleft">
                        <h5 class="programname">Office Apointment Hours</h5>
                        <div class="lists">
                            
                           <form action="{{route('addTime')}}" class="appoint">
                            <div class="timebox">
                                <div class="times">
                                    <h4>From</h4>
                                    <input type="time" name="fromtime" id="">
                                </div>
                                <div class="times">
                                    <h4>To</h4>
                                    <input type="time" name="totime" id="">
                                </div>
                                <div class="times">
                                    <h4>Limit</h4>
                                   <input type="text" name="limit" id="" placeholder="Set Limit">
                                </div>
                            </div>
                            <button type="submit" class="tmebtn">Add</button>
                           </form>
                        </div>
                    </div>
                    <div class="programright">
                        <h5 class="programname">Apointment Hours</h5>
                        <div class="timesbox">
                            <table class="timetable">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Limit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($time as $item)
                                    <tr>
                                        <td>{{$item->from}} - {{$item->to}}</td>
                                        <td>{{$item->limit}}</td>
                                        <td>
                                            <form action="{{route('deleteTimes',$item->id)}}">
                                                <button type="submit" class="delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
           
@endsection