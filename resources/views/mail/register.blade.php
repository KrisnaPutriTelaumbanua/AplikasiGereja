<h1>Halo, {{ $user->name }}</h1>
<p>Terima kasih telah mendaftar. Silakan klik tautan berikut untuk verifikasi akun Anda:</p>
<a href="{{ url('/register/activation/' . $user->token_activation) }}">Klik disini</a>

</p>



