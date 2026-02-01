<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$input = file_get_contents("php://input");
$data  = json_decode($input, true);

date_default_timezone_set("Asia/Kolkata");

require_once 'db.php';

// PHPMailer files
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../includes/mailer/emailtemplates.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($data['queryForm'])) {
    // Form Data
    $howWebsite = $data['Easy2Effective'] ?? '';
    $name       = $data['name'] ?? '';
    $number     = $data['number'] ?? '';
    $email      = $data['email'] ?? '';
    $message    = $data['message'] ?? '';

    // ---------------- VALIDATIONS ----------------

    // Phone validation (exactly 10 digits)
    $number = preg_replace('/\D/', '', $number); // remove non-digits
    if (strlen($number) != 10) {
        echo json_encode([
            "status"  => "error",
            "message" => "Invalid phone number. Phone must be exactly 10 digits."
        ]);
        exit;
    }

    // Email format validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status"  => "error",
            "message" => "Invalid email address."
        ]);
        exit;
    }

    // ---------------- INSERT FIRST (mail_sent = No) ----------------
    $stmt = $conn->prepare(
        "INSERT INTO customer_queries 
        (how_website, customer_name, customer_phone, customer_email, customer_message, mail_sent)
        VALUES (?, ?, ?, ?, ?, 'No')"
    );

    $stmt->bind_param("sssss", $howWebsite, $name, $number, $email, $message);
    $stmt->execute();

    $insert_id = $stmt->insert_id;

    // 1) Admin mail (optional - even if fails, query saved)
    sendAdminMail($howWebsite, $name, $number, $email, $message);

    // 2) User mail (IMPORTANT)
    $userMailSent = sendUserMail($data);

    // Update ONLY if user mail sent
    if ($userMailSent) {
        $update = $conn->prepare("UPDATE customer_queries SET mail_sent='Yes' WHERE id=?");
        $update->bind_param("i", $insert_id);
        $update->execute();

        echo json_encode([
            "status"  => "success",
            "message" => "SEND SUCCESSFULLY"
        ]);
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "SEND SUCCESSFULLY"
        ]);
    }
}


// ---------------- ADMIN MAIL ----------------
function sendAdminMail($howWebsite, $name, $number, $email, $message) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'easy2effective.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@easy2effective.com';
        $mail->Password = 'no-reply#@E2e';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('no-reply@easy2effective.com', 'Easy2Effective');

        // Admin emails only
        $mail->addAddress('prem.kumar.850775@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Customer Query';

        $mail->Body = "
            <h3>New Query Received</h3>
            <p><b>Website:</b> $howWebsite</p>
            <p><b>Name:</b> $name</p>
            <p><b>Phone:</b> $number</p>
            <p><b>Email:</b> $email</p>
            <p><b>Message:</b> $message</p>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


// ---------------- USER MAIL ----------------
function sendUserMail($data) {
    $mail = new PHPMailer(true);
    $template = new MailTemplate();

    try {
        $mail->isSMTP();
        $mail->Host = 'easy2effective.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@easy2effective.com';
        $mail->Password = 'no-reply#@E2e';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('no-reply@easy2effective.com', 'Easy2Effective');

        // User email only
        $mail->addAddress($data['email']);

        $mail->isHTML(true);
        $mail->Subject = "Thank You for Reaching Out to Easy2Effective";

        $mail->Body = $template->userTemplate($data);

        return $mail->send();
    } catch (Exception $e) {
        return false;
    }
}
?>