<h1>Hi {{ $user->name }}</h1>
<br>
<p>You can reset your password by clicking the link below</p>
<br>
<a href="{{route('passwordReset', $token)}}">click on this link</a>