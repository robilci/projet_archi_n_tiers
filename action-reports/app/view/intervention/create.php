<div class="row col-md-12 py-4">
    <div class="center-block col-md-5">
        <h1 class="text-center">Création d'intervention</h1>
        <form>
            <div class="p-5 rounded" style="background: #dce8f1">
                <div class="form-group">
                    <label>Numéro d'intervention</label>
                    <input type="text" class="form-control" name="interventionNumber" placeholder="Numéro">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label>Commune d'intervention</label>
                    <input type="text" class="form-control" id="town" placeholder="Commune">
                </div>
                <div class="form-group">
                    <label>Adresse d'intervention</label>
                    <input type="text" class="form-control" id="adress" placeholder="Adresse">
                </div>
                <div class="form-group">
                    <label>Adresse d'intervention</label>
                    <input type="text" class="form-control" id="adress" placeholder="Adresse">
                </div>
                <div class="form-group">
                    <label>Type d'intervention</label>
                    <input type="text" class="form-control" id="type" placeholder="Type">
                </div>
                <div class="form-group">
                    <label>Requerant</label>
                    <select class="form-control" name="applicant">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date et heure de déclenchement</label>
                    <input class="form-control" type="datetime-local" name="beginDate" value="2020-08-19T13:45:00">
                </div>
                <div id="lastElement" class="form-group">
                    <label>Date et heure de fin</label>
                    <input class="form-control" type="datetime-local" name="endDate" value="2020-08-19T13:45:00">
                </div>

                <! -- Block appear after adding a new vehicle  -->
                <!--<div class="center-block border border-secondary rounded p-3 m-3">
                    <div class="form-group">
                        <label>Nom de l'engin</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date et heure de départ</label>
                        <input class="form-control" type="datetime-local" name="beginDate" value="2020-08-19T13:45:00">
                    </div>
                    <div class="form-group">
                        <label>Date et heure d'arrivées</label>
                        <input class="form-control" type="datetime-local" name="beginDate" value="2020-08-19T13:45:00">
                    </div>
                    <div class="form-group">
                        <label>Date et heure de retour</label>
                        <input class="form-control" type="datetime-local" name="beginDate" value="2020-08-19T13:45:00">
                    </div>
                    <div class="form-check">
                        <label>Ronde</label>
                        <input type="checkbox" class="form-check-input mx-2" id="exampleCheck1">
                    </div>
                    <hr>
                    <h5>Participants</h5>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Rôle</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Pompier</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <! -- End of block  -->

                <button type="button" class="btn btn-md btn-info center-block py-2" id="buttonAddVehicle">Ajouter un vehicule</button>

                <button type="submit" class="btn btn-primary mt-3">Confirmer</button>
            </div>
        </form>
    </div>
</div>

<script src="/js/create.js"></script>
