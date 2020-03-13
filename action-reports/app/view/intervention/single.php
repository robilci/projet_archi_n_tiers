<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row" id="gradient">
                <div class="col-md-4">
                    <img src="/image/inter.png" class="img-responsive">
                </div>
                <div class="col-md-8" id="overview">
                    <?php

                    if(isset($otherInfos))
                    {
                        ?>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <ul class="pb-product-details-ul">
                                    <li><strong> Numéro : </strong> <?php echo $otherInfos->Numero ?></li>
                                    <li><strong> Date début: </strong><?php echo $otherInfos->Date_Debut ?></li>
                                    <li><strong> Date fin : </strong><?php echo $otherInfos->Date_Fin ?></li>
                                    <li><strong> Adresse : </strong> <?php echo $otherInfos->Adresse ?></li>
                                    <li><strong> Important : </strong><?php  if($otherInfos->Important ==1) echo 'oui'; else echo 'non'?></li>
                                    <li><strong> OPM : </strong><?php  if($otherInfos->OPM ==1) echo'oui'; else echo 'non'?></li>
                                    <li><strong> Etat : </strong><?php echo $otherInfos->Etat ?></li>
                                    <li><strong> Commentaire : </strong><?php echo $otherInfos->Commentaire ?></li>
                                </ul>
                            </div>

                        </div>

                    <?php }?>
                </div>
            </div>
            <div class="row">
                <div class="tabs_div">
                    <ul>

                        <li>Responsable</li>
                        <li>Requerant</li>
                        <li>Pompiers</li>
                        <li>Vehicules</li>

                    </ul>
                    <div>
                        <table class="table">
                            <tbody>
                            <?php if (isset($responsable)) {

                                ?>
                                <tr>
                                    <td class="success">Nom:</td>
                                    <td><?php echo $responsable->Nom; ?></td>
                                </tr>
                                <tr>
                                    <td class="success">Prénom:</td>
                                    <td><?php echo $responsable->Prenom; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table">
                            <tbody>
                            <?php if (isset($requerant)) {

                                ?>
                                <tr>
                                    <td class="success">Description:</td>
                                    <td><?php echo $requerant->Description ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Vehicule</th>
                            <th>Role</th>


                            </thead>
                            <tbody>
                            <?php if (isset($listPompiers)) {
                                foreach ($listPompiers as $val) {

                                    ?>
                                    <tr>
                                        <td><?php echo $val[0] ?></td>
                                        <td><?php echo $val[1] ?></td>
                                        <td><?php echo $val[2] ?></td>
                                        <td><?php echo $val[3] ?></td>


                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th>Code</th>
                            <th>Date départ</th>
                            <th>Date arrivee</th>
                            <th>Date retour</th>
                            <th>Description</th>
                            <th>Nombre de places disponibles</th>
                            <th>Role</th>

                            </thead>
                            <tbody>
                            <?php if (isset($listVehicles)) {
                                foreach ($listVehicles as $val) {
                                    //var_dump($listVehicles);

                                    ?>
                                    <tr>
                                        <td><?php echo $val[0] ?></td>
                                        <td><?php echo $val[1] ?></td>
                                        <td><?php echo $val[2] ?></td>
                                        <td><?php echo $val[3] ?></td>
                                        <td><?php echo $val[4] ?></td>
                                        <td><?php echo $val[5] ?></td>
                                        <td><?php echo $val[6] ?></td>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    jQuery(function ($) {
        $(".tabs_div").shieldTabs();
    });
</script>

