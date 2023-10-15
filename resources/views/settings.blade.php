@extends('layouts.settings')
@section('content')

                <h4 class="programname">Program Management</h4>
                <div class="programbox">
                    <div class="programleft">
                        <h5 class="programname">Select Program</h5>
                        <div class="lists">
                            <form action="{{route('selectProgram')}}" id="programSelection">
                                <select name="program" id="selectProgram">
                                    <option value="">Select A program</option>
                                    @foreach ($program as $item)
                                    <option value="{{$item->id}}">{{$item->program_name}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="addprogrambtn">Select</button>
                               
                            </form>
                            <form action="{{route('addProgram')}}" class="addProg">
                                @csrf
                                <input type="text" class="addProgram" class="form-control" name="addPrograms"placeholder="Add A Program">
                                <button type="submit" class="addprogrambtn">Add Program</button>
                            </form>
                        </div>
                    </div>
                    <div class="programright" id='programR'>
                        <h5 class="programname">Selected Program</h5>
                        <form action="{{route('deleteProgram',$selected != '' ? $selected->id : '')}}" id="DeleteProgram">
                            <input type="text" value="{{$selected != '' ? $selected->program_name : ''}}">
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
           
@endsection