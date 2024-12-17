<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {// Έλεγχος αν η φόρμα υποβλήθηκε
    if (isset($_POST['name']) && isset($_POST['language']) && isset($_POST['uproperty'])) {// Έλεγχος αν το πεδίο name και language υπάρχει στη φόρμα
        $language = $_POST['language']; // Λήψη επιλογής γλώσσας από τη φόρμα
        $name = $_POST['name']; // Λήψη ονόματος από τη φόρμα
        $uproperty = $_POST['uproperty']; // Λήψη ιδιότητας από τη φόρμα
        setcookie('preferred_language', $language, time() + (30 * 24 * 60 * 60));// Αποθήκευση γλώσσας στο cookie για 30 ημέρες
        setcookie('name', $name, time() + (30 * 24 * 60 * 60)); // Cookie για το όνομα
        setcookie('uproperty', $uproperty, time() + (30 * 24 * 60 * 60)); // Cookie για το όνομα
        header('Location: welcome.php');    // Redirect σε άλλη σελίδα
        exit();
    } else {
        echo "Παρακαλώ συμπληρώστε όλα τα απαιτούμενα πεδία.";// Αν λείπουν δεδομένα, εμφάνιση μηνύματος
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
            body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; }
            .form-container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); width: 400px; }
            .form-container h2 { text-align: center; margin-bottom: 20px; }
            .form-group { margin-bottom: 15px; display: flex; flex-direction: column; }
            label { font-weight: bold; margin-bottom: 5px; }
            input[type="text"], select, button { padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; }
            button { background-color: #007bff; color: #fff; border: none; cursor: pointer; margin-top: 10px; }
            button:hover { background-color: #0056b3; }
</style>
        <title>Εγγραφή χρήστη</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
</head>
<script>
function validateForm() { // Ορισμός συνάρτησης για την επικύρωση της φόρμας
    const name = document.getElementById("name").value.trim(); // Λήψη της τιμής του πεδίου "name", αφαίρεση των κενών στην αρχή/τέλος
    const email = document.getElementById("email").value.trim(); // Λήψη της τιμής του πεδίου "email", αφαίρεση των κενών στην αρχή/τέλος    
    const uproperty = document.getElementById("uproperty").value.trim(); // Λήψη της τιμής του πεδίου "message", αφαίρεση των κενών στην αρχή/τέλος    
    const nameRegex = /^[a-zA-Zα-ωΑ-Ω ]+$/; // Regular Expression για την επικύρωση του ονόματος (μόνο γράμματα και κενά)
        if (!nameRegex.test(name)) { // Έλεγχος αν το όνομα ταιριάζει με το μοτίβο
        alert("Το όνομα πρέπει να περιέχει μόνο γράμματα και κενά."); // Εμφάνιση μηνύματος σφάλματος
        return false; // Ακύρωση υποβολής της φόρμας
    }
    // Regular Expression για την επικύρωση του email (τυπική μορφή email)
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {     // Έλεγχος αν το email ταιριάζει με το μοτίβο
        alert("Παρακαλώ εισάγετε ένα έγκυρο email."); // Εμφάνιση μηνύματος σφάλματος
        return false; // Ακύρωση υποβολής της φόρμας
    }
    if (uproperty.length < 5) { // Έλεγχος αν η ιδιότητα έχει λιγότερους από 5 χαρακτήρες
        alert("Το πεδίο ιδιότητα πρέπει να περιέχει τουλάχιστον 5 χαρακτήρες."); // Εμφάνιση μηνύματος σφάλματος
        return false; // Ακύρωση υποβολής της φόρμας
    }
    return true; // Αν όλοι οι έλεγχοι περάσουν, επιτρέπεται η υποβολή της φόρμας
}
</script>
<body>
<div class="form-container">
<h2>Εγγραφή χρήστη</h2>
    <form action="register.php" method="POST" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="name">Ονοματεπώνυμο:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        </div>
    <div class="form-group">
        <label for="uproperty">Ιδιότητα:</label>
        <textarea name="uproperty" id="uproperty" required></textarea>
        </div>
    <div class="form-group">
        <label for="language">Γλώσσα Προτίμησης:</label>
        <select name="language" id="language">
            <option value="en">Αγγλικά</option>
            <option value="el">Ελληνικά</option>
        </select>
        </div>
        <button type="submit">Υποβολή</button>
    </form>
</body>
</html>