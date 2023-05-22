<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo.png" type="image/png" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <title>Authentification</title>
</head>

<body>
    <header>

        <div class="logo">
            <img src="logo.png" alt="Une chouette, logo d'AmpOwl">
            <h1>AmpOwl</h1>
        </div>

    </header>

    <main>
        <div class="arriere">

            <div class="form-box">
                <div class="form-value">
                    <form class="connect" action="">
                        <h2>Inscription</h2>
                        <div class="inputbox">
                            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <path d="M12 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                            </svg>
                            <input type="text" name="user_name" required />
                            <label for="user_name">Pseudo</label>
                        </div>
                        <div class="inputbox">
                            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <path d="m22 6-10 7L2 6"></path>
                            </svg>
                            <input type="email" name="user_mail" required />
                            <label for="user_mail">Adresse mail</label>
                        </div>
                        <div class="inputbox">
                            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input type="password" name="password" required />
                            <label for="password">Mot de passe</label>
                        </div>
                        <input type="submit" value="S'inscrire" class="sub">
                        <div class="register">
                            <p>Vous n'avez pas de compte ? <a href="#">Créer un compte</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>