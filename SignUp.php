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
  </head>
  <body class="bg-gray-100 flex items-center justify-center min-h-screen">
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
      <form class="grid grid-cols-2 gap-6" action="Register.php" method="POST">
        <!-- Colonna Sinistra -->
        <div class="flex flex-col">
          <div class="mb-4">
            <label class="block text-gray-700" for="email">Email</label>
            <input
              class="w-full px-3 py-2 border rounded"
              name="email"
              required=""
              type="email"
              placeholder="Email"
            />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700" for="password">Password</label>
            <input
              class="w-full px-3 py-2 border rounded"
              name="password"
              required=""
              type="password"
              placeholder="Password"
            />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700" for="password-confirm">
              Confirm password
            </label>
            <input
              class="w-full px-3 py-2 border rounded"
              name="password-confirm"
              required=""
              type="password"
              placeholder="Confirm password"
            />
          </div>
        </div>

        <!-- Colonna Destra -->
        <div class="flex flex-col">
          <div class="mb-4">
            <label class="block text-gray-700" for="name">Name</label>
            <input
              class="w-full px-3 py-2 border rounded"
              name="name"
              required=""
              type="text"
              placeholder="Name"
            />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700" for="surname">Surname</label>
            <input
              class="w-full px-3 py-2 border rounded"
              name="surname"
              required=""
              type="text"
              placeholder="Surname"
            />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700" for="phone_number">Phone number</label>
            <input
              class="w-full px-3 py-2 border rounded"
              name="phone_number"
              required=""
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
