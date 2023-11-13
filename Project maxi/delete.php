<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Controleer of de medewerker-ID bestaat
if (isset($_GET['id'])) {
    // Selecteer het record dat verwijderd gaat worden
    $stmt = $pdo->prepare('SELECT * FROM medewerkers WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $medewerkers = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$medewerkers) {
        exit('medewerker doesn\'t exist with that ID!');
    }
    // Zorg ervoor dat de gebruiker de verwijdering bevestigt
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // Gebruiker heeft op de knop "Ja" geklikt, record verwijderen
            $stmt = $pdo->prepare('DELETE FROM medewerkers WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Je hebt de medewerker verwijdered!😁';
        } else {
            // Gebruiker heeft op de knop "Nee" geklikt, stuur hem terug naar de gelezen pagina
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>
<?=template_header('Delete')?>
<div class="center">
<div class="content delete">
	<h2>Verwijder medewerker #<?=$medewerkers['ID']?></h2>
    <hr class="lijn">
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Weet u zeker dat u <?=$medewerkers['Naam']?> wilt verwijderen uit het systeem?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$medewerkers['ID']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$medewerkers['ID']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

</div>