<div class="row col-md-12 py-4">
    <div class="center-block col-md-5">
        <h1 class="text-center">Création d'intervention</h1>
        <form method="post" action="/intervention/create/confirm">
            <input id="nbVehicle" name="nbVehicle" type="text" style="display: none">
            <div class="p-5 rounded" style="background: #dce8f1">
                <div class="form-group">
                    <label>Responsable</label>
                    <select class="form-control" id="responsible" name="responsible">
                    </select>
                </div>

                <div class="form-group">
                    <label>Type d'intervention</label>
                    <select class="form-control" name="type">
                        <?php
                            for($i = 0; $i < sizeof($types); $i++){
                                echo '<option value="' .$types[$i]["TI_Code"] .'">'. $types[$i]["Description"] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Numéro d'intervention</label>
                    <input required="required" type="text" class="form-control" name="interventionNumber" placeholder="Numéro">
                </div>
                <div class="form-group">
                    <label>Commune d'intervention</label>
                    <input required="required" type="text" class="form-control" name="town" placeholder="Commune">
                </div>
                <div class="form-group">
                    <label>Adresse d'intervention</label>
                    <input required="required" type="text" class="form-control" name="adress" placeholder="Adresse">
                </div>
                <div class="form-group">
                    <label>Requerant</label>
                    <select class="form-control" name="applicant">
                        <option value="1" selected="selected">Alerte locale</option>
                        <option value="2">CODIS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date et heure de déclenchement</label>
                    <input class="form-control" type="datetime-local" name="beginDate" value="2020-08-19T13:45:00">
                </div>
                <div class="form-group">
                    <label>Date et heure de fin</label>
                    <input class="form-control" type="datetime-local" name="endDate" value="2020-08-19T13:45:00">
                </div>

                <div class="form-group">
                    <label>Commentaire</label>
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>

                <div id="lastElement" class="row">
                    <div class="form-check">
                        <label>Important</label>
                        <input name="important" type="checkbox" class="form-check-input mx-2" id="exampleCheck1">
                    </div>

                    <div class="form-check mx-5">
                        <label>OPM</label>
                        <input name="opm" type="checkbox" class="form-check-input mx-2" >
                    </div>
                    <br>
                </div>

                <! -- Block appear here after adding a new vehicle  -->

                <button type="button" class="btn btn-md btn-info center-block py-2" id="buttonAddVehicle">Ajouter un vehicule</button>

                <hr>
                <button type="submit" class="btn btn-primary btn-lg mt-5 center-block">Confirmer</button>
            </div>
        </form>
    </div>
</div>

<script src="/js/create.js" charset="UTF-8"></script>
