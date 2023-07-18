<!DOCTYPE html>
<html>
<head>
  <title>Détails de l'élément</title>
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

    .element {
      background-color: #ffffff;
      padding: 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <h2>Détails de l'élément</h2>
  <?php
    // Vérifier si le paramètre "id" est présent dans GET
    if (isset($_GET['id'])) {
      // Récupérer la valeur du paramètre "id"
      $id = $_GET['id'];

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
      $id = $conn->real_escape_string($id);

      // Interroger la base de données pour récupérer les informations de l'élément
      $query = "SELECT * FROM autocompletion WHERE id = '$id'";
      $result = $conn->query($query);

      // Afficher les informations de l'élément
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<div class="element">';
        echo '<h3>' . $row['keyword'] . '</h3>';
        echo '<p>' . $row['suggestions'] . '</p>';
        echo '</div>';
      } else {
        echo 'Aucun élément trouvé.';
      }

      // Fermer la connexion à la base de données
      $conn->close();
    } else {
      echo 'Aucun identifiant d élément spécifié.';
    }
  ?>
</body>
</html>
