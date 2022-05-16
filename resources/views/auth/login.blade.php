<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <?php
        session_start();
        $conn = mysqli_connect("localhost", "root", "", "webtintuc");
        if (isset($_POST["login"])) {
            $mail = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM users where email='$mail' AND password='$password' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            if ($row) {

                $_SESSION['userid'] = $row['id'];

                if (!empty($_POST['remember'])) {
                    $remember = $_POST['remember'];

                    setcookie('email', $mail, time() + 3000 * 24 * 7);
                    setcookie('password', $password, time() + 3000 * 24 * 7);
                } else {
                    if (isset($_COOKIE["email"])) {
                        setcookie('email', $mail, 3000);
                        if (isset($_COOKIE["password"])) {
                            setcookie('password', $password, 3000);
                        }
                    }
                }
            } else {
                $message = "Invalid Login";
            }
        }
        ?>
        <form method="POST" action="{{ route('login') }}" id="login">
            @csrf
            <span style="margin-left:35%;font-size:25px">Đăng nhập</span>
            <div class="form-group row" style="margin:10px 0">
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ url('auth/facebook') }}">
                        <img src="https://scontent.fhan15-1.fna.fbcdn.net/v/t39.2365-6/17639236_1785253958471956_282550797298827264_n.png?_nc_cat=105&ccb=1-6&_nc_sid=ad8a9d&_nc_ohc=FCfMWpIOPY0AX_1JIBR&_nc_ht=scontent.fhan15-1.fna&oh=00_AT9bPr7kTkfcC3hVtkCsVsZU4-FKXMIB0gls0A2Y9OJQcw&oe=62825056" style="margin-left: 5px;width:185px;height: 40px">
                    </a>
                    <a href="{{ url('auth/google') }}">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                             style="margin-left: 1em;">
                    </a>
                </div>
                <p style="text-align: center;margin-top:15px">OR</p>
            </div>

            <div class="text-danger">
                <?php if (isset($message)) {
                    echo $message;
                } ?>
            </div>
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <input name="email" style="width:400px;border-radius:8px;border:1px solid #D1D5DB" id="email"
                       type="text" value="<?php if (isset($_COOKIE["user_login"])) {
                    echo $_COOKIE["user_login"];
                } ?>" class="input-field" required autofocus>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <input type="password" style="width:400px;border-radius:8px;border:1px solid #D1D5DB"
                       class="input-field" id="password" name="password"
                       value="<?php if (isset($_COOKIE["userpassword"])) {
                           echo $_COOKIE["userpassword"];
                       } ?>">
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                           <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Nhớ tài khoản') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class=" text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}"
                       style="margin-right:50px">
                        {{ __('Đăng ký ! ') }}
                    </a>

                    <a class=" text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4" name="login">
                    {{ __('Đăng nhập') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
