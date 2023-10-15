@extends('layouts.settings')
@section('content')

                <h4 class="programname">Schedule Management</h4>
            
                <div class="programbox">
                    <div class="programleft">
                        <h5 class="programname">Office Apointment Hours</h5>
                        <div class="lists">
                            
                           <form action="{{route('addSched')}}" id="schedleft">
                            <div class="topcon">
                                <input type="text" name="desc" placeholder="Select Description">
                            </div>
                            <div class="schedbox">
                                <div class="scheboxleft">
                                    <h4>From</h4>
                                    <input type="date" name="fromsched" id="">
                                </div>
                                <div class="scheboxright">
                                    <h4>To</h4>
                                    <input type="date" name="tosched" id="">
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
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($sched as $item)
                                    <tr>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->from}} - {{$item->to}}</td>
                                        <td>
                                            <form action="{{route('deletesched',$item->id)}}">
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