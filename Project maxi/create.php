<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Controleer of POST-gegevens niet leeg zijn
if (!empty($_POST)) {
    // Plaats gegevens niet leeg voeg een nieuwe rij record in
    // Stel de variabelen in die worden ingevoegd, we moeten controleren of de POST-variabelen bestaan, anders kunnen we ze standaard blanco maken
    $ID = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Controleer of POST-variabele "naam" bestaat, zo niet, stel de waarde dan in op blanco, in principe hetzelfde voor alle variabelen

    $Naam = isset($_POST['name']) ? $_POST['name'] : '';
    $Afdeling = isset($_POST['Afdeling']) ? $_POST['Afdeling'] : '';
    $Datum = isset($_POST['Datum']) ? $_POST['Datum'] : '';
    $Minutentelaat = isset($_POST['Minutentelaat']) ? $_POST['Minutentelaat'] : '';
    $Redentelaat = isset($_POST['Redentelaat']) ? $_POST['Redentelaat'] : '';
    // Voeg een nieuwe rij in de medewerkerstabel in
    $stmt = $pdo->prepare('INSERT INTO medewerkers VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$ID, $Naam, $Afdeling, $Datum, $Minutentelaat, $Redentelaat,]);
    // Uitvoer bericht
    $msg = 'Created Successfully!😤';
}
?>

<?=template_header('create')?>
<body>
    
    <main style="width: 600px;  margin: 90px auto;">
        <h2 style="text-align:center;">Nieuwe melding te late medewerker🙁</h2>
        <hr class="lijn">
            <div class="frame">
                 <form action="create.php" method="post">
        
                        <label for="naam_student">Naam medewerker</label>
                    
                        <input type="text" class="form-control" id="name" name="name" required>
                        <br>


                        <label for="Afdeling">Afdeling</label>
                    
                        <select class="form-control" id="Afdeling" name="Afdeling">
                            <option>Development</option>
                            <option>Support</option>
                            <option>Sales</option>
                            <option>Office</option>                
                        </select><br>
                        
        
                        <label for="Datum">Datum:</label>
                        <input type="text" class="form-control" id="Datum" name="Datum" required><br>

                        <label for="Minuten te laat"> Minuten te laat</label>
                        <select class="form-control" id="Minutentelaat" name="Minutentelaat">
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>25</option>
                            <option>30</option>
                            <option>35</option>
                            <option>40</option>
                            <option>45</option>
                            <option>50</option>
                            <option>55</option>
                            <option>60</option> 
                            <option>meer dan een uur🙁</option><br> 
                    </select>
                    

                    
                    <div class="form-group">
                        <label for="Redentelaat">Redentelaat:</label><br>
                        <textarea class="form-control-inp" rows="5" id="Redentelaat" name="Redentelaat"></textarea>
                    </div>
                
                    <input type="submit" value="Opslaan">
           
                </form>
            </div>
    </main>

</body>
<div class="content update">

    
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
