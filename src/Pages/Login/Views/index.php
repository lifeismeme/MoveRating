
<h2>Login</h2>

<form method="post" action="Login/login">
    username: <input name="username" type="email" maxlength="50" required/>
    password: <input name="password" type="password" maxlength="20" required/>
    <button class="btn btn-primary">Login</button>
</form>

<hr>
<h2>Register </h2>
<form method="post" action="Login/register">
    username: <input name="username" type="email" maxlength="50" required/>
    password: <input name="password" type="password" minlength="6" maxlength="20" required/>
    <button class="btn btn-success">Register</button>
</form>