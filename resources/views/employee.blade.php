@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="container-fluid pt-5 tabs">
        @if ($success)
        <div class="alert alert-success" style="position: absolute; right: 10px;" id="succ">{{$success}}</div>
        @endif
        <div class="container-fluid d-flex justify-content-end pb-2">
                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modalId"><i class="fas fa-plus"></i> Add Employee</button>
        </div>
       
        <!-- Modal -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content border border-5 border-danger rounded">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId"><i class="fas fa-user-plus"></i> Add New Employee</h5>
                            </div>
                <form action="{{route('addEmployee')}}" class="container-fluid" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <div class="container-fluid">
                                <div class="container-fluid d-flex flex-column align-items-center justify-content-center">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <hr class="mx-4 border border-danger">
                                <div class="container-fluid d-flex gap-2 pt-3">
                                    <input type="text" class="form-control" placeholder="First Name" name="fname">
                                    <input type="text" class="form-control" placeholder="Middle Name"name="mname">
                                    <input type="text" class="form-control" placeholder="Last Name"  name="sname">
                                </div>
                                <hr class="mx-4">
                                <div class="container-fluid d-flex gap-2">
                                    <input type="text" placeholder="Position" name="position" class="form-control">
                                    <input type="number" placeholder="Age"  name="age" class="form-control">
                                    <input type="text" placeholder="Gender" name="gender" class="form-control">
                                    <input type="number" placeholder="Contact No"  name="contact" class="form-control">
                                </div>
                                <hr class="mx-4">
                               <div class="container-fluid">
                                <textarea name="address" placeholder="Address" id="" cols="10" rows="3" class="form-control"></textarea>
                               </div>
                          
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
      
        {{-- VIEW PROFILE --}}
        <div class="{{$show}} bg-light" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);" id="viewEmp">
            <div class="modal-dialog " role="document">
                <div class="modal-content border border-5 border-danger rounded p-5">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId"><i class="fas fa-user-plus"></i> View Employee</h5>
                            </div>
                
                    <div class="modal-body">
                            <div class="container-fluid d-flex gap-3 p-0">
                             
                                <div class="container-fluid p-0 d-flex flex-column align-items-center justify-content-center w-25">
                                    <img src="{{ $image}}" alt="" class="img-fluid">
                                </div>
                                
                               <div class="container-fluid w-75">
                                <div class="container-fluid d-flex gap-2 pt-3">
                                    <input type="text" class="form-control" placeholder="First Name" value="{{$firstname}}">
                                    <input type="text" class="form-control" placeholder="Middle Name"value="{{$middlename}}">
                                    <input type="text" class="form-control" placeholder="Last Name"  value="{{$lastname}}">
                                </div>
                                <hr class="mx-4">
                                <div class="container-fluid d-flex gap-2">
                                    <input type="text" placeholder="Position" class="form-control" value="{{$position}}">
                                    <input type="number" placeholder="Age"   class="form-control" value="{{$age}}">
                                    
                                </div>
                                <hr class="mx-4">
                                <div class="container-fluid d-flex gap-2">
                                    <input type="text" placeholder="Gender"  class="form-control" value="{{$gender}}">
                                    <input type="number" placeholder="Contact No"   class="form-control" value="{{$contact}}">
                                </div>
                                <hr class="mx-4">
                               <div class="container-fluid pb-3">
                                <textarea placeholder="Address" id="" cols="10" rows="3" class="form-control" >{{$address}}</textarea>
                               </div>
                              
                               </div>
                          
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="viewEm">Close</button>
                     
                    </div>
                
                </div>
            </div>
        </div>

        {{-- EDIT PROFILE --}}
        <div class="bg-light w-50 {{$shows}}"  style="position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%);">
            <div class="modal-content border border-5 border-danger rounded p-5">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"><i class="fas fa-user-plus"></i> Edit Employee</h5>
                        </div>
            <form action="{{route('saveEmployee')}}" class="container-fluid" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="container-fluid">
                            <input type="hidden" value="{{$id}}" name="id">
                            <div class="container-fluid d-flex flex-column align-items-center justify-content-center">
                                <input type="file" name="uimage" id="image" class="form-control">
                            </div>
                            <hr class="mx-4 border border-danger">
                            <div class="container-fluid d-flex gap-2 pt-3">
                                <input type="text" class="form-control" placeholder="First Name" name="ufname" value="{{$firstname}}">
                                <input type="text" class="form-control" placeholder="Middle Name"name="umname" value="{{$middlename}}">
                                <input type="text" class="form-control" placeholder="Last Name"  name="usname" value="{{$lastname}}">
                            </div>
                            <hr class="mx-4">
                            <div class="container-fluid d-flex gap-2">
                                <input type="text" placeholder="Position" name="uposition" class="form-control" value="{{$position}}">
                                <input type="number" placeholder="Age"  name="uage" class="form-control" value="{{$age}}">
                                <input type="text" placeholder="Gender" name="ugender" class="form-control" value="{{$gender}}">
                                <input type="number" placeholder="Contact No"  name="ucontact" class="form-control" value="{{$contact}}">
                            </div>
                            <hr class="mx-4">
                           <div class="container-fluid">
                            <textarea name="uaddress" placeholder="Address" id="" cols="10" rows="3" class="form-control">{{$address}}</textarea>
                           </div>
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('employee')}}" class="btn btn-secondary" >Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
        <script>
            var modalId = document.getElementById('modalId');
        
            modalId.addEventListener('show.bs.modal', function (event) {
                  // Button that triggered the modal
                  let button = event.relatedTarget;
                  // Extract info from data-bs-* attributes
                  let recipient = button.getAttribute('data-bs-whatever');
        
                // Use above variables to manipulate the DOM
            });
        </script>
           
        <table class="table table-hover">
            <thead class="table-danger">
                <tr>
                    <th>Employee No</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Contact No</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee as $item)
                <tr>
                    
                    <td>{{$item->employeeNo}}</td>
                    <td><img src="{{ ($item->image)}}" alt="" style="height: 70px; width: 70px;"></td>
                    <td>{{$item->firstname}} {{$item->middlename}} {{$item->lastname}}</td>
                    <td>{{$item->position}}</td>
                    <td>{{$item->age}}</td>
                    <td>{{$item->gender}}</td>
                    <td>{{$item->contact}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                
                            <a href="{{route('viewEmployee',$item->employeeNo)}}" class="btn btn-sm btn-success" id="show"><i class="fas fa-eye"></i> View</a>
                            <a href="{{route('editEmployee',$item->employeeNo)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{route('deleteEmployee',$item->employeeNo)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                     
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
</div>
@endsection