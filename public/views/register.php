<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/scrollbarStyle.css">
    <link rel="stylesheet" type="text/css" href="/public/css/registerStyle.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <script type="text/javascript" src="/./public/js/registerValidation.js" defer></script>
    <title>REGISTER PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="/public/img/logo.svg">
        </div>
        <div class="register-container">
            <form class="register" action="register" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="name">
                <input name="surname" type="text" placeholder="surname">
                <input name="language" type="text" placeholder="language">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <input name="repeat-password" type="password" placeholder="password">
                <div class="checkbox">
                    <input type="checkbox" id="accept" name="accept" value="Accept">
                    <label for="accept"> I accept the terms and conditions </label>
                </div>
                <button id="register-button">register</button>
            </form>
        </div>
    </div>
</body>