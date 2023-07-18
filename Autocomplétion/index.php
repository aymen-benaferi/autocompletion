<!DOCTYPE html>
<html>
<head>
  <title>Mon Moteur de Recherche</title>
  <style>
    /* Styles CSS pour la mise en page */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .search-container {
      text-align: center;
      margin: 0 auto;
      max-width: 500px;
    }

    .search-container input[type="text"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
    }

    .search-container input[type=" submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="search-container">
    <form action="search.php" method="GET">
      <input type="text" name="query" placeholder="Entrez votre recherche...">
      <input type="submit" value="Rechercher">
    </form>
  </div>
</body>
</html>
