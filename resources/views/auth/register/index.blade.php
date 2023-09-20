@extends('auth.layouts.layout1' , ['title' => "Chân trời sáng tạo / Register Portal"])
@section('content')
<style>
    body {
        background: #f1f5f9 !important;
    }
    form > * {
        margin: 10px 0;
    }

    .form-control {
        padding: 10px !important;
    }

    .form-control::placeholder {
        font-size: 14px;
        color: #a1aec0;

    }

    .login-btn {
        padding: 10px !important;
        background: #1e40af !important;
    }

    span {
        font-size: 14px;
        color: #475569;
    }

    .strike-through-text {
        display: flex;
        flex-direction: row;
    }
    .strike-through-text:before, .strike-through-text:after{
        content: "";
        flex: 1 1;
        border-bottom: 1px solid #e7ecf3;
        margin: auto;
    }
    .strike-through-text:before {
        margin-right: 10px
    }
    .strike-through-text:after {
        margin-left: 10px
    }

    svg {
        width: 20px;
    }

</style>


<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card border-0" style="width: 500px">
        <div class="card-body">
            <form method="POST" action="{{ route('postRegister') }}">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h4 class="card-title text-center fw-bold">Đăng ký</h4>

                <input class="form-control" placeholder="Tên đăng nhập" name="username" required/>
                <input class="form-control" placeholder="Nhập phone hoặc email" name="email_or_phone" required/>
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required/>
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation" required>
                <button class="btn btn-primary w-100 login-btn" type="submit">Đăng ký</button>
                <div class="text-center">
                    <span>Bạn đã có tài khoản?</span>
                    <a href="{{ route('login') }}"><span>Đăng nhập</span></a>
                </div>
        
                <span class="strike-through-text">Hoặc</span>
        
                <button class="btn btn-light">
                    <svg style="color: blue" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"> <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" fill="blue"></path> </svg>
                    Đăng nhập bằng Facebook
                </button>
                <button class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="lucide w-4 h-4 mr-2"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path></svg>
                    Đăng nhập bằng Google
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

