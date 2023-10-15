@extends('layouts.clients')
@section('content')
    <div class="container-fluid tabs d-flex justify-content-center align-items-center">
       <div class="accod">
        <h4 class="mont fw-bold pb-2">Registrar's Office</h4>
        <div class="cards">
            <div class="cards-header container bg-primay" id="head1">
                <p class="text-center mont fw-bold">Select Transactions</p>
            </div>
            <div class="cards-body hide" id="body1">
                <div class="container-fluid p-0 pb-3" id="width">
                    <div class="cards">
                        <div class="cards-header container    " id="head2">
                            <p class="text-center mont fw-bold">Request for Transcript of Reqcords (TOR)</p>
                        </div>
                        <div class="cards-body hide" id="body2">
                            <div class="container-fluid p-0 pb-3">
                                <div class="container-fluid p-0 d-flex gap-3">
                                    <div class="container fluid p-0 w-75 ">
                                        <div class="container-fluid p-0">
                                            <div class="topsacc py-3">Lorem ipsum dolor sit amet.</div>
                                            <div class="bottomsacc p-3 pb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea sequi ipsa eum beatae voluptas accusamus delectus deserunt explicabo earum veniam.</div>
                                        </div>
                                    </div>
                                    <div class="container fluid p-0 w-25 ">
                                        <div class="container-fluid p-0">
                                            <div class="topsacc py-3">Sealing of Documents</div>
                                            <div class="bottomsacc p-3">
                                                <ol>
                                                    <li>Sample</li>
                                                    <li>Sample</li>
                                                    <li>Sample</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid p-0 d-flex justify-content-center pt-3">
                                    <a href="{{route('tor',$id)}}" class="btn btn-lg btn-success px-5">Set Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cards  ">
                        <div class="cards-header container    " id="head3">
                            <p class="text-center mont fw-bold">Request for Cerifications</p>
                        </div>
                        <div class="cards-body hide" id="body3">
                            <div class="container-fluid p-0 pb-3">
                                <div class="container-fluid p-0 d-flex gap-3">
                                    <div class="container fluid p-0 w-75 ">
                                        <div class="container-fluid p-0">
                                            <div class="topsacc py-3">Lorem ipsum dolor sit amet.</div>
                                            <div class="bottomsacc p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea sequi ipsa eum beatae voluptas accusamus delectus deserunt explicabo earum veniam.</div>
                                        </div>
                                    </div>
                                    <div class="container fluid p-0 w-25 ">
                                        <div class="container-fluid p-0">
                                            <div class="topsacc py-3">Signing</div>
                                            <div class="bottomsacc p-3">
                                                <ol>
                                                    <li>Sample</li>
                                                    <li>Sample</li>
                                                    <li>Sample</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="container-fluid p-0 d-flex justify-content-center pt-3">
                                    <a href="" class="btn btn-lg btn-success px-5">Set Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cards ">
                        <div class="cards-header container  " id="head4">
                            <p class="text-center mont fw-bold">Authentication of Documents</p>
                        </div>
                        <div class="cards-body hide" id="body4">
                            <div class="container-fluid p-0 pb-3">
                                <div class="container-fluid p-0 d-flex gap-3">
                                    <div class="container fluid p-0 w-75 ">
                                        <div class="container-fluid p-0">
                                            <div class="topsacc py-3">Lorem ipsum dolor sit amet.</div>
                                            <div class="bottomsacc p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea sequi ipsa eum beatae voluptas accusamus delectus deserunt explicabo earum veniam.</div>
                                        </div>
                                    </div>
                                    <div class="container fluid p-0 w-25 ">
                                        <div class="container-fluid p-0">
                                            <div class="topsacc py-3">Signing</div>
                                            <div class="bottomsacc p-3">
                                                <ol>
                                                    <li>Sample</li>
                                                    <li>Sample</li>
                                                    <li>Sample</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="container-fluid p-0 d-flex justify-content-center pt-3">
                                    <a href="" class="btn btn-lg btn-success px-5">Set Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
       </div>

    

    </div>
    
@endsection