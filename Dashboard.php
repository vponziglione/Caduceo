<html>
  <head>
    <title>Cartella Clinica</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-100">
    <div class="flex min-h-screen">
      <!-- Sidebar -->
      <div class="w-1/4 bg-white p-4 shadow-md">
        <div class="flex items-center mb-8">
          <img
            alt="Caduceo logo"
            class="mr-2"
            height="40"
            src="https://cdn.discordapp.com/attachments/741090406527271004/1358365254177914900/ChatGPT_Image_Apr_5_2025_08_20_47_PM_1.png?ex=67f393b9&is=67f24239&hm=f243577d0a617a404414dca51d0057b6d23417bf1b7cce24f80458fd575a82bd&"
            width="40"
          />
        <span class="text-xl Open Sans""> 
            
            <font color="#4790cb">Caduceo</font>
        
        </span>
        </div>
        <nav>
          <ul>
            <li class="mb-4">
              <a class="font-semibold" href="#"> <font color="#4790cb">Dashboard</font></a>
            </li>
            <li class="mb-4">
              <a class="text-gray-600" href="#"> Pazienti </a>
            </li>
            <li class="mb-4">
              <a class="text-gray-600" href="#"> Scambio Dati </a>
            </li>
            <li class="mb-4">
              <a class="text-gray-600" href="#"> Attività </a>
            </li>
            <li>
              <a class="text-gray-600" href="#"> Impostazioni </a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Main Content -->
      <div class="w-3/4 p-8">
        <h1 class="text-xl font-bold mb-6">CARTELLA CLINICA</h1>
        <div class="grid grid-cols-2 gap-4 mb-6">
          <div class="bg-white p-4 shadow-md">
            <p>
              <strong> Paziente </strong>
            </p>
            <p>Mario Rossi</p>
            <p>
              <strong> ID Paziente </strong>
            </p>
            <p>123456</p>
          </div>
          <div class="bg-white p-4 shadow-md">
            <p>
              <strong> Data di Nascita </strong>
            </p>
                <p>01/02/1980</p>
            <p>
              <strong> Sesso </strong>
            </p>
            <p>Maschio</p>
          </div>
          <div class="bg-white p-4 shadow-md">
            <p>
              <strong> Ultima Analisi </strong>
            </p>
            <p>25/01/2024 Emoglobina 13,5 g/dL</p>
          </div>
          <div class="bg-white p-4 shadow-md">
            <p>
              <strong> Farmaci Attivi </strong>
            </p>
            <p>Ramipril 5 mg Compresse</p>
          </div>
          <div class="bg-white p-4 shadow-md">
            <p>
              <strong> Diagnosi Recenti </strong>
            </p>
            <p>15/12/2023 Ipertensione essenziale (ICD-10: I10)</p>
          </div>
          <div class="bg-white p-4 shadow-md">
            <p>
              <strong> Farmaci Sostituto </strong>
            </p>
            <p>Lisinopril 5 mg Compresse</p>
          </div>
        </div>
        <div class="mb-6">
          <h2 class="text-xl font-bold mb-4">Referti</h2>
          <table class="min-w-full bg-white shadow-md">
            <thead>
              <tr>
                <th class="py-2 px-4 border-b">Data</th>
                <th class="py-2 px-4 border-b">Descrizione</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-2 px-4 border-b">10/01/2024</td>
                <td class="py-2 px-4 border-b">Radiografia torace</td>
              </tr>
              <tr>
                <td class="py-2 px-4 border-b">20/11/2023</td>
                <td class="py-2 px-4 border-b">ECG di riposo</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div>
          <h2 class="text-xl font-bold mb-4">Storico delle Diagnosi</h2>
          <table class="min-w-full bg-white shadow-md">
            <thead>
              <tr>
                <th class="py-2 px-4 border-b">Data</th>
                <th class="py-2 px-4 border-b">Descrizione</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-2 px-4 border-b">15/12/2023</td>
                <td class="py-2 px-4 border-b">Ipertensione essenziale</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
