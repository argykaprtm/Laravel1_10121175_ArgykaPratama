@extends('layout/aplikasi')

@section('konten')
        <div class="body">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <div class="wrapper">
            <form action="/sesi/create" method="POST" class="">
                @csrf
                <h1>Register</h1>
                <div class="input-box">
                    <input type="text" name="name" value="{{ Session::get('name') }}" placeholder="Nama" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="email" value="{{ Session::get('email') }}" placeholder="Email" required>
                    <i class="bx bxs-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <button type="submit" class="btn" name="submit">Daftar</button>

                <div class="register-link">
                    <p>Sudah punya akun? <a href="/sesi">Login</a></p>
                </div>
            </form>
        </div>
        </div>
@endsection

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: seagreen;
        background: url('https://www.smpn1werucrb.sch.id/wp-content/uploads/2020/08/banner-1.jpg') no-repeat;
        background-size: cover;
        background-position: center;
    }
    
    .wrapper {
        width: 420px;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, .2);
        backdrop-filter: blur(20px);
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        color: #fff;
        border-radius: 10px;
        padding: 30px 40px;
    }

    .wrapper h1 {
        font-size: 36px;
        text-align: center;
    }

    .wrapper .input-box {
        position: relative;
        width: 100%;
        height: 50px;
        margin: 30px 0;
    }

    .input-box input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border: 2px solid rgba(255, 255, 255, .2);
        border-radius: 40px;
        color: #fff;
        padding: 20px 45px 20px 20px;
    }

    .input-box input::placeholder {
        color: #fff;
    }

    .input-box i {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
    }

    .wrapper .btn {
        width: 100%;
        height: 45px;
        background: #fff;
        border: none;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10 rgba(0, 0, 0, .1);
        cursor: pointer;
        font-size: 16px;
        color: #333;
        font-weight: 600;
    }

    .wrapper .register-link {
        font-size: 14.5px;
        text-align: center;
        margin: 20px 0 15px;
    }

    .register-link p a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
    }
    
    .register-link p a:hover {
        text-decoration: underline;
    }
</style>
