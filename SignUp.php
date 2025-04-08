<html lang="it">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sign up Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css">
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
        <h1 class="text-2xl Open Sans">
          <font color="#4790cb">CADUCEO</font>
        </h1>
      </div>
      <div class="flex border-b mb-6">
        <button
          class="flex-1 py-2 text-center text-1xl border-b-2 border-blue-600"
        >
          <font color="#4790cb">Sign up</font>
        </button>
      </div>
      <?php
    // Inizializza array errori
    $errors = [
        'email' => '',
        'password' => '',
        'conf_password' => '',
    ];

    // Connessione al database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dottore_db";

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
            $errors['email'] = "Invalid email or User already registered";
        }

        // Validazione password
        if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password)) {
            $errors['password'] = "Password must be at least 8 characters long, including uppercase letters, lowercase letters, and numbers.";
        }

        // Conferma password
        if ($password !== $password_confirm) {
            $errors['conf_password'] = "Passwords do not match";
        }

        // Controllo se l'email è già registrata
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['email'] = "Invalid email or User already registered";
        }

        $stmt->close();

        // Se non ci sono errori, procedi con l'inserimento nel database
        if (!array_filter($errors)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (email, name, surname, password, phone_number) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $email, $name, $surname, $hashed_password, $phone_number);

            if ($stmt->execute()) {
              header("Location: Login.php");
              exit();
            }

            $stmt->close();
        }
    }

    $conn->close();
?>

<form class="grid grid-cols-2 gap-6" action="" method="POST">
  <!-- Colonna Sinistra -->
  <div class="flex flex-col">
    <div class="mb-4">
      <label class="block text-gray-700" for="email">Email</label>
      <div class="relative">
        <input
          class="w-full px-3 py-2 border rounded <?php echo !empty($errors['email']) ? 'input-error' : ''; ?>"
          name="email"
          required
          type="email"
          placeholder="Email"
        />
        <?php if (!empty($errors['email'])): ?>
        <span class="error-symbol absolute top-2 right-2" data-error="<?php echo $errors['email']; ?>">!</span>
        <?php endif; ?>
      </div>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700" for="password">Password</label>
      <div class="relative">
        <input
          class="w-full px-3 py-2 border rounded <?php echo !empty($errors['password']) ? 'input-error' : ''; ?>"
          name="password"
          required
          type="password"
          placeholder="Password"
        />
        <?php if (!empty($errors['password'])): ?>
        <span class="error-symbol absolute top-2 right-2" data-error="<?php echo $errors['password']; ?>">!</span>
        <?php endif; ?>
      </div>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700" for="password-confirm">Confirm password</label>
      <div class="relative">
        <input
          class="w-full px-3 py-2 border rounded <?php echo !empty($errors['conf_password']) ? 'input-error' : ''; ?>"
          name="password-confirm"
          required
          type="password"
          placeholder="Confirm password"
        />
        <?php if (!empty($errors['conf_password'])): ?>
        <span class="error-symbol absolute top-2 right-2" data-error="<?php echo $errors['conf_password']; ?>">!</span>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Colonna Destra -->
  <div class="flex flex-col">
    <div class="mb-4">
      <label class="block text-gray-700" for="name">Name</label>
      <input
        class="w-full px-3 py-2 border rounded"
        name="name"
        required
        type="text"
        placeholder="Name"
      />
    </div>
    <div class="mb-4">
      <label class="block text-gray-700" for="surname">Surname</label>
      <input
        class="w-full px-3 py-2 border rounded"
        name="surname"
        required
        type="text"
        placeholder="Surname"
      />
    </div>
    <div class="mb-4">
      <label class="block text-gray-700" for="phone_number">Phone number</label>
      <input
        class="w-full px-3 py-2 border rounded"
        name="phone_number"
        required
        type="tel"
        pattern="[0-9]{10}"
        placeholder="Phone number"
      />
    </div>
  </div>

  <!-- Bottone per inoltrare i dati -->
  <div class="col-span-2 flex justify-center">
    <button
      class="w-full bg-blue-600 text-white py-2 rounded"
      type="submit"
    >
      Sign up
    </button>
  </div>
</form>

      <p class="mt-6 text-center text-gray-700">
        Do you have an account?
        <a class="text-blue-600" href="Login.php"> Log in </a>
      </p>
    </div>
  </body>
</html>
