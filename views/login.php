<?php
$errors = $errors ?? false;
$data = $data ?? [];

if (!isset($errors['email'])){
    if(isset($data['email'])) {
        if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid E-mail";
    }
}
if (!$errors) {
    if(isset($data['password'])) {
        $stmt = $router->database->pdo->prepare("SELECT firstName,password,verified FROM users WHERE email = :email");
        $stmt->bindValue(':email',$data['email']);
        $stmt->execute();
        $result = $stmt->fetch();
        if($result && $result['verified'] == 1 && password_verify($data['password'],$result['password'])){
            $_SESSION['currentUser'] = $result['firstName'];
            header('Location:/');
        }
        else
        {
            echo '<div style="margin-top:30px" class="container alert alert-danger">';
            echo 'Invalid E-mail/password or unverified account';
            echo '</div>';
        }
    }
}

?>

<div class="login-container">
        <div class="new-customer">
            <h1>New Customer</h1>
            <h4>Register</h4>
            <hr>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <hr>
            <a href="register.html"><button>Continue</button></a>
        </div>

        <div class="returning-customer">
            <h1>Returning Customer</h1>
            <h4>I am a returning customer</h4>
            <hr>
            <form action="/login" method="post">
                <label for="email">E-Mail Address</label>
                <input type="text" name="email" placeholder="E-mail Address">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
                <hr>
                <button type="submit">Login</button>
            </form>

        </div>
    </div>
</div>