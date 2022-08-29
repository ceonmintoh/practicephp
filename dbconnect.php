<?
$handle = new PDO('mysql:charset=utf8mb4');
//if you're using mysqli, you can call set_charset():
$conn = mysqli_connect('localhost', 'root', '', 'users');
$conn->set_charset('utf8mb4');

// object oriented style

mysqli_set_charset($conn, 'utf8mb4');// procedural style

//PDO supports two kinds of placeholders (placeholders cannot be used for column or table names, only values):
    //1. Named placeholders. A colon(:), followed by a distinct name (eg. :user)
    // using named placeholders
    $sql = 'SELECT name, email, user_level FROM users WHERE userID = :user';
    $prep = $conn->prepare($sql);
    $prep->execute(['user' => $_GET['user']]); // associative array
    $result = $prep->fetchAll();
    //2. Traditional SQL positional placeholders, represented as ?:
    // using question-mark placeholders
    $sql = 'SELECT name, user_level FROM users WHERE userID = ? AND user_level = ?';
    $prep = $conn->prepare($sql);
    $prep->execute([$_GET['user'], $_GET['user_level']]); // indexed array
    $result = $prep->fetchAll();
?> 
</P>
