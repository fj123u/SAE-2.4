<h1>Tableau de bord du Festival</h1>
<table>
    <tr>
        <th>Billets Vendus</th>
        <th>Chiffre d'affaire</th>
        <th>Total des Concerts</th>
    </tr>
    <tr>
        <?php foreach ($stats as $stat) {?>
            <td><?php echo $stat["nbBilletsVendus"]; ?></td>
            <td><?php echo $stat["chiffreAffaires"]; ?></td>
            <td><?php echo $stat["nbConcerts"]; ?></td>
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
            <td><?php echo $conc["nomScene"]; ?></td>
            <td><?php echo $conc["nbConcert"]; ?></td>
        </tr>
    <?php }?> 
</table>