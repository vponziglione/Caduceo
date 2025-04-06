<html>
    <head>
        <title>
            Log in
        </title>
    </head>
    <body>
        <?php
            // Connessione al database
            $servername = "localhost";
            $username = "root"; // Utente di default di XAMPP
            $password = "";     // Password vuota di default in XAMPP
            $dbname = "users_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            // Gestione del form
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $name = htmlspecialchars($_POST['name']);
                $surname = htmlspecialchars($_POST['surname']);
                $phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_NUMBER_INT);
                $password = $_POST['password'];
                $password_confirm = $_POST['password-confirm'];

                // Validazione email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    die("Email non valida.");
                }

                // Validazione nome e cognome
                if (empty($name) || empty($surname)) {
                    die("Nome e cognome sono obbligatori.");
                }

                // Validazione numero di telefono
                if (!preg_match("/^[0-9]{10}$/", $phone_number)) {
                    die("Numero di telefono non valido. Deve contenere 10 cifre.");
                }

                // Validazione password
                if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password)) {
                    die("La password deve avere almeno 8 caratteri, incluse lettere maiuscole, minuscole e numeri.");
                }

                // Conferma password
                if ($password !== $password_confirm) {
                    die("Le password non corrispondono.");
                }

                // Crittografia della password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Query preparata
                $stmt = $conn->prepare("INSERT INTO users (email, name, surname, password, phone_number) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $email, $name, $surname, $hashed_password, $phone_number);

                if ($stmt->execute()) {
                    echo "Registrazione completata con successo!";
                } else {
                    echo "Errore: " . $stmt->error;
                }

                $stmt->close();
            }

            $conn->close();
        ?>
    </body>
</html>