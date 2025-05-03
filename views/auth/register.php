<div class="container" style="text-align: center; padding: 20px;">
    <h2>Registrieren</h2>
    <form method="POST" action="/user/register">
        <label>Benutzername:</label><br>
        <input type="text" name="username" required><br><br>

        <label>E-Mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Passwort:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Registrieren</button>
    </form>
    <p>Bereits registriert? <a href="/user/login">Einloggen</a></p>
</div>