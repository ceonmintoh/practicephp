<?
$pdo = new PDO(
    $dsn,
    $username,
    $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    try {
    $statement = $pdo->prepare("UPDATE user SET name = :name");
    $pdo->beginTransaction();
    $statement->execute(["name"=>'Bob']);
    $statement->execute(["name"=>'Joe']);
    $pdo->commit();
    }
    catch (\Exception $e) {
    if ($pdo->inTransaction()) {
    $pdo->rollback();
    // If we got here our two data updates are not in the database
    }
    throw $e;
    }
?>