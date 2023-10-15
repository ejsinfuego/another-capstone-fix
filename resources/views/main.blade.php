@extends('layouts.main')
@section('main')
<div class="container-fluids" >
    
    <div class="topContainer">
        <div class="container titles">
            <div class="bebas">
                Caramoan Community <br>College
            </div>
            <div>
                Management System with Appoinment Scheduling <br> for Transaction to the Frontline Office
            </div>
            <div class="buttons">
                <button class="getStartedBtn" id="getstarted">Get Started</button>
                <button class="loginBtn" id="login">Login</button>
            </div>
        </div>
        <div class="container">
            <img src="/assets/caramoan.jpg" alt="">
        </div>
    </div>
    <div class="servicesContainer">
        <div class="servicesTitle">Transacting Offices</div>
        <div class="offered">
            <div class="boxOffered"> 
                <div><img src="/assets/caramoanLogo.png" alt=""></div>
                <div class="headerTitle">Registrar's Office</div>
            </div>
            <div class="boxOffered"> 
                <div><img src="/assets/caramoanLogo.png" alt=""></div>
                <div class="headerTitle">Library</div>
            </div>
            <div class="boxOffered"> 
                <div><img src="/assets/caramoanLogo.png" alt=""></div>
                <div class="headerTitle">Admin Oiffice</div>
            </div>
            
        </div>
    </div>
</div>
@endsection