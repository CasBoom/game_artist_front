<h2>
Wachtwoord aanpassen
</h2>
<form method="post" action="">
    Mail: <input type="email" name="email">
    Nieuw wachtwoord: <input type="password" name="new_password">
    <input type="text" name="reset_token" value="<?php echo $_GET['code']; ?>" hidden>
    <input type="submit">
</form>