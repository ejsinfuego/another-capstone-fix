@extends('layouts.settings')
@section('content')

                <h4 class="programname">Window Management</h4>
            
                <div class="programbox">
                    <div class="programleft">
                        <h5 class="programname">Add Window</h5>
                        <div class="lists">
                          <form action="{{route('addWindow')}}" id="window">
                            <input type="text" class="window" name="windowname" placeholder="Enter Window Name">
                            <input type="text" class="window" name="windowno" placeholder="Enter Window No">
                            <input type="text" class="window" name="transactiondata" placeholder="Enter Transaction">

                            <button class="window">Submit</button>
                          </form>
                        </div>
                    </div>
                    <div class="programright">
                        <h5 class="programname">Manage Window</h5>
                        <div class="timesbox">
                            <table class="timetable">
                                <thead>
                                    <tr>
                                        <th>Windows</th>
                                        <th>Transaction</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody >
                                @foreach ($window as $item)
                                <tr>
                                    <td>{{$item->windowname}} {{$item->windowno}}</td>
                                    <td>{{$item->transaction}}</td>
                                    <td>
                                        <form action="{{route('deleteWindow',$item->id)}}">
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