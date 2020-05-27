<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$errors = $errors ?? false;
$data = $data ?? [];
$success = false;
$head = false;
if (!isset($errors['email'])){
    if(isset($data['email'])) {
        if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid E-mail";
    }
}
if (!isset($errors['password']) and !isset($errors['confirmPassword'])) {
    if ($data) {
        if ($data['password'] != $data['confirmPassword']) {
            $errors['password'] = $errors['confirmPassword'] = 'Passwords doesnt match';
        }
    }
}
if (!$errors and $data) {
     $success = $router->database->register($data);
}
if ($success) {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    try {
        //Server settings

        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = '68e598921a35a8';                     // SMTP username
        $mail->Password = 'af50ce955bc7e7';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('admin@techpower.com', 'TechPower');
        $mail->addAddress($data['email'], 'Joe User');
        $body = "<a href='http://localhost:8080/verify.php?vkey={$success}'>Verify Your Account</a>";
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'E-mail Verification';
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);
        $mail->send();
        header('Location:/verification?email='.$data['email']);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    if ($data) {
        {
            echo "The user already exists with that email";
        }
    }
}

?>

<div class="account-register">
    <h1>NEWSLETTER</h1>
    <hr>
    <p>If you already have an account with us, please login at the <a href="login.html">login page</a>.</p>
    <legend>Your Personal Details</legend>
    <hr>
    <div class="container">
        <form action="/register" method="post">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input  value="<?php  if($errors) echo $data['firstName'];  ?>" name="firstName" type="text" class="form-control <?php echo isset($errors['firstName']) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="invalid-feedback">
                    <?php echo $errors['firstName'] ?? '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input name="lastName" value="<?php  if($errors) echo $data['lastName'];  ?>" type="lastName" class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="invalid-feedback">
                    <?php echo $errors['lastName'] ?? '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input value="<?php  if($errors) echo $data['email'];  ?>" name="email" type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?? '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
                <div class="invalid-feedback">
                    <?php echo $errors['password'] ?? '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input name="confirmPassword" type="password" class="form-control <?php echo isset($errors['confirmPassword']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
                <div class="invalid-feedback">
                    <?php echo $errors['confirmPassword'] ?? '' ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>