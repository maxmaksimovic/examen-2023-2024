


<style>
<?php include 'style.css'; ?>
</style>
<?php
include 'functions.php';

// Connect to MySQL database

$pdo = pdo_connect_mysql();

if(!$pdo){
    echo 'Connection error: ' . mysqli_connect_error();
}




// Haal de pagina op via GET-verzoek (URL-parameter: pagina), als deze niet bestaat, wordt de pagina standaard ingesteld op 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Aantal records dat op elke pagina moet worden weergegeven
$records_per_page = 5;
// Bereid de SQL-instructie voor en haal records uit onze medewerkerstabel, LIMIT zal de pagina bepalen
$stmt = $pdo->prepare('SELECT * FROM medewerkers ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Haal de records op zodat we ze in onze sjabloon kunnen weergeven.
$medewerkers = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Krijg het totale aantal medewerkers, dit is zodat we kunnen bepalen of er een volgende en vorige knop moet zijn
$num_medewerker = $pdo->query('SELECT COUNT(*) FROM medewerkers')->fetchColumn();

// Krijg het totale aantal medewerkers, dit is zodat we kunnen bepalen of er een volgende en vorige knop moet zijn
$num_medewerker = $pdo->query('SELECT COUNT(*) FROM medewerkers')->fetchColumn();
?>
<?=template_header('Read')?>

<div class="content read">
	<div class="center">

		<h2>Overzicht van medewerkers die te laat waren 🫠</h2>
		<a href="create.php" class="create-medewerker">Weer eentje te laat!!👎</a>
			
		<table class="tr">


			<thead>
			
		<tr>
			<td>ID</td> 
			<td>Naam</td>
			<td>Afdeling</td>
			<td>Datum</td>
			<td> Minuten te laat</td>
			<td> Reden te laat</td>
			<td></td>
			<td></td>
		</tr>

			</thead>
		<tbody>
		<tr>
		<?php foreach ($medewerkers as $medewerkers): ?>
		<td><?=$medewerkers['ID']?> </td> 
		<td><?=$medewerkers['Naam']?> </td>
		<td> <?=$medewerkers['Afdeling']?> </td>
		<td> <?=$medewerkers['Datum']?> </td>
		<td> <?=$medewerkers['Minutentelaat']?> </td>
		<td> <?=$medewerkers['Redentelaat']?> </td>


		<td><a href="update.php?id=<?=$medewerkers['ID']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a></td> 
		<td><a href="delete.php?id=<?=$medewerkers['ID']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a></td>

		</tbody>
		</tr>
		<?php endforeach; ?>
		</table>


		<div class="pagination">
				
			<?php if ($page > 1): ?>
				<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
			<?php endif; ?>
			
			<?php if ($page*$records_per_page < $num_medewerker): ?>
				<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
			<?php endif; ?>
			
		</div>
	</div>
</div>


