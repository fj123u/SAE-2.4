<h1>Tableau de bord du Festival</h1>
<table>
    <tr>
        <th>Billets Vendus</th>
        <th>Chiffre d'affaire</th>
        <th>Total des Concerts</th>
    </tr>
    <tr>
        <?php foreach ($stats as $stat) {?>
            <th><?php echo $stat["nbBilletsVendus"]; ?></th>
            <th><?php echo $stat["chiffreAffaires"]; ?></th>
            <th><?php echo $stat["nbConcerts"]; ?></th>
        <?php }?>
    </tr>
</table>
<table>
    <tr>
        <th>Scene</th>
        <th>Nombre de Concert</th>
    </tr>
    <?php foreach ($concertScene as $conc) {?>
        <tr>
        <th><?php echo $conc["nomScene"]; ?></th>
        <th><?php echo $conc["nbConcert"]; ?></th>
        </tr>
    <?php }?> 
</table>