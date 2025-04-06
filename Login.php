<html lang="it">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    .logo-caduceo {
      font-family: 'Raleway', sans-serif;
      font-weight: 500;
      color: #4790cb;
    }
    </style>

  </head>
  <body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
      <div class="flex items-center justify-center mb-6">
        <img
          alt="Caduceus symbol"
          class="mr-2"
          height="50"
          src="https://cdn.discordapp.com/attachments/741090406527271004/1358365254177914900/ChatGPT_Image_Apr_5_2025_08_20_47_PM_1.png?ex=67f393b9&is=67f24239&hm=f243577d0a617a404414dca51d0057b6d23417bf1b7cce24f80458fd575a82bd&"
          width="50"
        />
        <h1 class="text-2xl logo-caduceo">
          <font color="#4790cb">CADUCEO</font>
        </h1>
      </div>
      <div class="flex border-b mb-6">
        <button
          class="flex-1 py-2 text-center text-1xl border-b-2 border-blue-600"
        >
          <font color="#4790cb">Log In</font>
        </button>
      </div>
      <?php
            // Inizializza il messaggio di errore come vuoto
            $error_email = "";
            $error_password = "";
            // Connessione al database
            $servername = "localhost";
            $username = "root"; // Utente di default di XAMPP
            $password = "";     // Password vuota di default in XAMPP
            $dbname = "pazienti_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            // Gestione del form
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = $_POST['password'];
                // Validazione email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $error_email = "Email Error.";
                }

                // Controllo se l'email esiste nel database
                $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Email trovata, verifica della password
                    $row = $result->fetch_assoc();
                    $hashed_password = $row['password'];
            
                    if (password_verify($password, $hashed_password)) {

                      header("Location: Dashboard.php");
                      exit();
                    } else {
                      $error_password = "Password Error";
                    }
                } else {
                  $error_email = "Email Error.";
                }
            
                $stmt->close();

            }

            $conn->close();
            ?>

      <form action="" method="POST">
        <div class="mb-4">
          <?php if (!empty($error_email)): ?>
            <p class="text-red-600 text-sm mt-2">
            The email address entered is not registered. Verify your email and try again or 
              <a href="SignUp.php" class="text-red-600 underline">Sign up.</a>.
            </p>
          <?php endif; ?>
          <label class="block text-gray-700" for="email">Email</label>
          <input
            class="w-full px-3 py-2 border rounded"
            name="email"
            required=""
            type="email"
            placeholder="Email"
          />
        </div>
        <div class="mb-6">
          <label class="block text-gray-700" for="password">Password</label>
          <input
            class="w-full px-3 py-2 border rounded"
            name="password"
            required=""
            type="password"
            placeholder="Password"
          />
          <?php if (!empty($error_password)): ?>
            <p class="text-red-600 text-sm mt-2">
              Incorrect password. Please try again or click <a href="#" class="underline">Forgot Password</a> to reset it.
            </p>
          <?php endif; ?>
        </div>
        <!-- Bottone per inoltrare i dati -->
        <div class="col-span-2 flex justify-center">
          <button
            class="w-full bg-blue-600 text-white py-2 rounded"
            type="submit"
          >
            Log in
          </button>
        </div>
      </form>
      <p class="mt-6 text-center text-gray-700">
        Don't have an account?
        <a class="text-blue-600" href="SignUp.php"> Sign up </a>
      </p>
    </div>

    
  </body>
</html>
