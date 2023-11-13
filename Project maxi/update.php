<?php

include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Controleer of de contact-id bestaat, bijvoorbeeld update.php?id=1 krijgt de contactpersoon met de id van 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // Dit deel is vergelijkbaar met create.php, maar in plaats daarvan werken we een record bij en voegen we het niet in
        $ID = isset($_POST['ID']) ? $_POST['ID'] : NULL;
        $Naam = isset($_POST['Naam']) ? $_POST['Naam'] : '';
        $Afdeling = isset($_POST['Afdeling']) ? $_POST['Afdeling'] : '';
        $Datum = isset($_POST['Datum']) ? $_POST['Datum'] : '';
        $Minutentelaat = isset($_POST['Minutentelaat']) ? $_POST['Minutentelaat'] : '';
        $Redentelaat = isset($_POST['Redentelaat']) ? $_POST['Redentelaat'] : '';
       
        // Werk het medewerkers bij
        $stmt = $pdo->prepare('UPDATE medewerkers SET ID = ?, Naam = ?,  Afdeling = ?,  Datum = ?, Minutentelaat = ?, Redentelaat = ? WHERE id = ?');
        $stmt->execute([$ID, $Naam, $Afdeling, $Datum, $Minutentelaat, $Redentelaat,  $_GET['id']]);
        $msg = 'Updated Successfully!😎';
    }
    // Haalt de medewerker uit het medewerkertabel
    $stmt = $pdo->prepare('SELECT * FROM medewerkers WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $medewerkers = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$medewerkers) {
        exit('medewerkers doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<?=template_header('Read')?>

<div class="content update">
    
        <h2>Update medewerker #<?=$medewerkers['ID']?></h2>
        <form action="update.php?id=<?=$medewerkers['ID']?>" method="post">
            <label for="ID">ID</label>
            <label for="Naam">Naam</label>
            <input type="text" name="ID" placeholder="1" value="<?=$medewerkers['ID']?>" id="ID">
            <input type="text" name="Naam" placeholder="John Doe" value="<?=$medewerkers['Naam']?>" id="Naam">
            <label for="Afdeling"> Afdeling</label>
            <label for="Datum"> Datum</label>
            <input type="text" name="Afdeling" placeholder="johndoe@example.com" value="<?=$medewerkers['Afdeling']?>" id="Afdeling">
            <input type="text" name="Datum" placeholder="johndoe@example.com" value="<?=$medewerkers['Datum']?>" id="Datum">
            <label for="Minuten te laat">Minuten te laat</label>
            <label for="title">Reden te laat</label>
            <input type="text" name="Minutentelaat"  value="<?=$medewerkers['Minutentelaat']?>" id="Minuten te laat">
            <input type="text" name="Redentelaat"  value="<?=$medewerkers['Redentelaat']?>" id="Reden te laat">
    
            <input type="submit" value="Update">
        </form>
        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>
    </div>


