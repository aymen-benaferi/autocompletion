<!DOCTYPE html>
<html>
<head>
  <title>Résultats de recherche</title>
  <style>
    /* Styles CSS pour la mise en page */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    h2 {
      margin-top: 0;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      background-color: #ffffff;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <h2>Résultats de recherche</h2>
  <?php
    // Vérifier si le paramètre "search" est présent dans GET
    if (isset($_GET['search'])) {
      // Récupérer la valeur du paramètre "search"
      $search = $_GET['search'];

      // Connexion à la base de données
      $servername = 'localhost';
      $username = 'root';
      $password = 'azerty';
      $dbname = 'autocompletion';

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Vérifier la connexion
      if ($conn->connect_error) {
        die('Erreur de connexion à la base de données : ' . $conn->connect_error);
      }

      // Échapper les caractères spéciaux pour éviter les injections SQL
      $search = $conn->real_escape_string($search);

    // Interroger la base de données pour récupérer les résultats correspondants
      $query = "SELECT * FROM autocompletion WHERE LOWER(nom) LIKE LOWER('%$search%')";
      $result = $conn->query($query);

    // Afficher les résultats
      if ($result->num_rows > 0) {
       echo '<ul>';
       while ($row = $result->fetch_assoc()) {
       echo '<li>' . $row['nom'] . '</li>';
     }
        echo '</ul>';
     } else {
     echo 'Aucun résultat trouvé.';
    }   

 }
  ?>
</body>
</html>
