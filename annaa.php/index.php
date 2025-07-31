<?php
$hostname = "0.0.0.0";
$username = "root";
$password = "root";
$dbname = "anaa";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $tipe = $_POST['tipe'];
  $alamat = $_POST['alamat'];
  $tlp = $_POST['tlp'];
  $sql = "INSERT INTO tabel (`id`, `nama`, `tipe`, `alamat`, `tlp`) VALUES (NULL, '$nama', '$tipe', '$alamat', '$tlp')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$sql = "SELECT * FROM tabel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  //while($row = $result->fetch_assoc()) {
    //echo "Id: " . $row["Id_User"]. " - Name: " . $row["Tipe_User"]. " " . $row["Nama_User"]. "<br>";
 // }
} else {
  echo "0 results";
}
$conn->close();
?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Form User</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #e0f7fa;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200vh;
      }
      .container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 1500px;
        display: flex;
        padding: 20px;
      }
      .sidebar {
        background-color:#8fbedc;
        padding: 50px;
        border-radius: 10px;
        width: 25%;
        text-align: center;
      }
      .sidebar img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
      }
      .sidebar h2 {
        margin: 10px 0;
      }
      .sidebar button {
        background: color #8fbedc ;
        border: none;
        color: white;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
      }
      .sidebar button:hover {
        background-color :#8fbedc;
      }
      .content {
        padding: 20px;
        width: 75%;
      }
      .content h2 {
        margin-bottom: 20px;
      }
      .content .form-group {
        margin-bottom: 15px;
      }
      .content .form-group label {
        display: block;
        margin-bottom: 20px;
      }
      .content .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .content .buttons {
        margin-top: 20px;
      }
      .content .buttons button {
        background-color: #8fbedc;
        border: none;
        color: white;
        padding: 10px 20px;
        margin-right: 10px;
        border-radius: 5px;
        cursor: pointer;
      }
      .content .buttons button:hover {
        background-color: #338fc2 ;
      }
      .content table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      .content table,
      .content th,
      .content td {
        border: 1px solid #ccc;
      }
      .content th,
      .content td {
        padding: 10px;
        text-align: left;
      }
      .content tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      .content tr:hover {
        background-color: #e0f7fa;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="sidebar">
        <img alt="Admin profile picture" height="100" src="pinguin.jpg" width="100" />
        <h2>Admin</h2>
        <button>Kelola User</button>
        <button>Kelola Laporan</button>
        <button>Logout</button>
      </div>
      <div class="content">
        <h2>Kelola User</h2>
        <div class="form-group">
          <form method="POST">
          <label for="tipe_user"> Tipe User </label>
          <input id="tipe_user" type="text" name="tipe"/>
        </div>
        <div class="form-group">
          <label for="nama"> Nama </label>
          <input id="nama" type="text" name="nama"/>
        </div>
        <div class="form-group">
          <label for="telepon"> Telepon </label>
          <input id="telepon" type="text" name="tlp"/>
        </div>
        <div class="form-group">
          <label for="alamat"> Alamat </label>
          <input id="alamat" type="text" name="alamat"/>
        </div>
        <div class="buttons">
          <button>Tambah</button>
          <button>Edit</button>
          <button>Hapus</button>
          </form>
        </div>
        <table>
          <thead>
            <tr>
              <th>Id_user</th>
              <th>Tipe_user</th>
              <th>Nama_user</th>
              <th>Alamat</th>
              <th>Telepon</th>
            </tr>
          </thead>
          <tbody>
           <?php
           while($row = $result->fetch_assoc()) {
           ?>
            <tr>
              <td><?= $row['id']?></td>
              <td><?= $row['tipe']?></td>
              <td><?= $row['nama']?></td>
              <td><?= $row['alamat']?></td>
              <td><?= $row['tlp']?></td>
            </tr>
         <?php
             }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
