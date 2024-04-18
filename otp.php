<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $api_key = 'v2_uTj0smC6YcksE5Ib9Oe3gdEhFHI.5S5B';
    $sender_id = '9865527793';
    $mobile_numbers = $_POST['mobile_numbers']; // Comma-separated list of user's mobile numbers
    $otp = rand(100000, 999999); // Generate OTP

    // Store OTP in your database along with the user's registration data
    $db = new PDO('mysql:host=localhost;dbname=my_database', 'root', '');

    $stmt = $db->prepare('INSERT INTO users (otp) VALUES (?)');
    $stmt->execute([$otp]);

    // Check the length of the `$mobile_numbers` variable
    if (strlen($mobile_numbers) < 10) {
        echo 'Invalid phone number.';
        exit;
    }
    
    // Send OTP via Sparrow SMS
    $message = "Your OTP is: $otp";
    $args = http_build_query([
        'token' => $api_key,
        'from' => $sender_id,
        'to' => $mobile_numbers,
        'text' => $message,
    ]);
    
    $url = "http://api.sparrowsms.com/v2/sms/";

    // Use a try-catch block to handle any errors
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status_code === 200) {
            echo 'OTP sent successfully!';
        } else {
            echo 'Error: Could not send OTP. HTTP Status Code:' . $status_code;
            // You can also display the response for more details
            // echo 'Response: ' . $response;
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
<form method="POST" action="">
    <label for="mobile_numbers">Mobile Numbers (comma-separated):</label>
    <input type="text" name="mobile_numbers" id="mobile_numbers" required>
    <button type="submit">Send OTP</button>
</form>
