<div class="container" style="text-align: center; padding: 20px;">
    <h1>Willkommen zurück!</h1>
    <p>Bitte logge dich ein, um fortzufahren.</p>
    <h2>Login</h2>
    <form method="POST" action="/auth/login">
        <label>E-Mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Passwort:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Einloggen</button>
    </form>
    <p>Noch kein Konto? <a href="/auth/register">Registrieren</a></p>
</div>