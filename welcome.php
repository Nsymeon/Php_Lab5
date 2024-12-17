<?php
    $language = isset($_COOKIE['preferred_language']) ? $_COOKIE['preferred_language'] : 'en';// Ανάκτηση γλώσσας από το cookie
    $name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '';// Ανάκτηση ονόματος από το cookie
    $uproperty = isset($_COOKIE['uproperty']) ? $_COOKIE['uproperty'] : '';
    if ($language == 'el') { // Περιεχόμενο ανάλογα με τη γλώσσα
        $greeting = "Καλωσήρθες " . $name. "!";
        $message = "Αυτή η σελίδα είναι στα Ελληνικά.";
        $uproperty = "Η πρώην Ιδιότητα είναι:" . $uproperty. "!";
    } else {
        $greeting = "Welcome " . $name. "!";
        $message = "This page is in English.";
        $uproperty = "The ex property was:" . $uproperty. "!";
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f0f8ff; display: flex; justify-content: center; align-items: center; height: 100vh; color: #333; }
        .container { text-align: center; background: #fff; padding: 20px 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        h1 { font-size: 2em; margin-bottom: 10px; color: #007bff; }
        p { font-size: 1.2em; margin-bottom: 20px; }
        a { color: #007bff; text-decoration: none; font-weight: bold; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $greeting; ?></h1>
        <p><?= $message ?></p>
        <p><?= $uproperty ?></p>
        <a href="register.php">Επιστροφή στην αρχική σελίδα</a>
    <div>
</body>
</html>
