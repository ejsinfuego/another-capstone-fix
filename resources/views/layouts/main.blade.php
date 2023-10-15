<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/build/css/main.css">
    <link rel="stylesheet" href="/build/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/settings.css">
    <script src="/build/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="/build/icons/css/all.min.css">
    <title>Caramoan Community College</title>
</head>
<body>
    <nav class="navbars">
        
        <a href="/" class="logoLink">
            <img src="/assets/caramoanLogo.png" alt="Caramoan Logo" class="cLogo">
            CCC
        </a>

        <ul class="navigation">
            <li class="navigation-items"><a href="" class="links">Home</a></li>
            <li class="navigation-items"><a href="" class="links">About</a></li>
            <li class="navigation-items"><a href="" class="links">Contact</a></li>
        </ul>

        <button class="admin" id="admin">Administrator</button>
    </nav>
   
    <div id="adminbox" class="adminbox">
            <h3 class="mont">Administrator</h3> 
            <i class="fas fa-times closes" id="closeAdmin"></i>
      
        <p>Authorized Personel Only</p>
        <form method="POST" action="{{ route('login') }}" class="forms">
            @csrf
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus" placeholder="Email">
            <input type="password" class="@error('password') is-invalid @enderror"  name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <button type="submit" class="dubmitBtn">Login</button>

        </form>
    </div>

    <div id="loginbox" class="loginbox">
        <h3 class="mont">Student</h3>
        <i class="fas fa-times closes" id="closeStudent"></i>
        <form method="GET" action="{{route('student')}}" class="forms">
            @csrf
            <input type="number" name="studentid" id="studentid" placeholder="Student Id" value="{{$studentId}}">
            <input type="text" name="firstName" required autocomplete="First Name" autofocus" placeholder="First Name">
            <input type="text" name="middleName" required autocomplete="Middle Name" autofocus" placeholder="Middle Name">
            <input type="text" name="surName" required autocomplete="Last Name" autofocus" placeholder="SurName">
            <select name="selection" id="" class="selection">
                <option value=""> Choose your Program</option>
               @foreach ($prog as $item)
                   <option value="{{$item->id}}">{{$item->program_name}}</option>
               @endforeach
            </select>
            <input type="number" name="yearLevel" id="" placeholder="Year Level">
            <input type="password" name="password" id="" placeholder="Password">
          
            <button type="submit" class="dubmitBtn">Sign Up</button>
            <p class="guest" id="Guest">---- Sign Up as Guest ----</p>
        </form>
    </div>
    <div id="guestbox" class="guestbox">
        <h3 class="mont">Guest</h3>
        <i class="fas fa-times closes" id="closeGuest"></i>
        <form method="GET" action="{{route('guest')}}" class="forms">
            @csrf
            <input type="number" name="guestid" id="guestid" placeholder="Guest Id" value="{{$id}}">
            <input type="text" name="firstName" required autocomplete="First Name" autofocus" placeholder="First Name">
            <input type="text" name="middleName" required autocomplete="Middle Name" autofocus" placeholder="Middle Name">
            <input type="text" name="surName" required autocomplete="Last Name" autofocus" placeholder="SurName">
            <input type="email" name="emailGuest" id="" placeholder="Email">
            <input type="password" name="passwordGuest" id="" placeholder="Password">
          
            <button type="submit" class="dubmitBtn">Sign Up</button>
            <p class="guest" id="student">---- Sign Up as Student ----</p>
        </form>
    </div>

    <div class="loginguestbox" id="guestslogin">
        <h3 class="mont" >Guest</h3>
        <i class="fas fa-times closes" id="closelogins"></i>
        <br>
        <form action="{{route('guestLogin')}}" id="guest1" method="GET">
            @csrf
            <input type="email" name="emailguest" class="emailguest" placeholder="Email" id="">
            <input type="password" name="passwordguest"class="passwordguest" placeholder="Password" id="">
            <button type="submit" class="loginbtns">Login</button>
        </form>
        <br>
        <p class="guest" id="loginstudent">---- Login as Student ----</p>

    </div>
    <div class="loginstudentbox" id="studentslogin">
        <h3 class="mont" >Student</h3>
        <i class="fas fa-times closes" id="closestudentslogins"></i>
        <br>
    <form action="{{route('studentLogin')}}" id="guest1">
            @csrf
            <input type="number" name="studentid" class="emailguest" placeholder="Student Id" id="">
            <input type="password" name="studentpassword"class="passwordguest" placeholder="Password" id="">
            <button type="submit" class="loginbtns">Login</button>
        </form>
        <br>
        <p class="guest" id="loginguest">---- Login as Guest ----</p>

    </div>
    
    @if ($popups==true)
    <div class="alert alert-danger position-absolute d-flex gap-5" style="top: 10px; right:10px;" id="alert">
     <div class="container-fluid d-flex gap-5">
        <div class="container-fluid">
            <strong>{{$msg}} </strong>
        </div>
       <div>
        <button type="button" class="ms-3 btn closes" id="alertclose">
            <span aria-hidden="true">&times;</span>
          </button>
       </div>
     </div>
</div>
    @endif
    <div class="none" id="disable"></div>
    @yield('main')
    <footer>
        <div class="footers">
            <div class="footerLogo">
                <img src="/assets/caramoanLogo.png" alt="">
            </div>
            <div class="footertext">
                <p class="footerTop">Caramoan Community College</p>
                <p class="footerBottom">Caramoan Camarines Sur</p>
            </div>
        </div>
    </footer>
    <script src="/build/js/main.js"></script>

</body>
</html>