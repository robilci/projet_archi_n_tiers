
<div class="container" style="background-color: aliceblue; padding-left: 50px; padding-top: 30px ">
    <h1 style="margin-bottom: 20px">Créer intervention</h1>
    <div class="form-group row">
        <label for="numeroIntervention">Numero intervention</label>
        <div class="col-sm-10">
            <input  type="text"  class="form-control" name="numeroIntervention" placeholder="Numero intervention">
        </div>
    </div>
    <div class="form-group row">
        <label for="opm">OPM</label>
        <div class="col-sm-10" style="margin-left: 105px">
            <input type="text"  class="form-control" name="opm" placeholder="OPM">
        </div>
    </div>
    <div class="form-group row">
        <label for="important">Important ?</label>
        <div class="col-sm-10" style="margin-left: 80px">
            <input type="checkbox"  name="important" placeholder="Numero intervention">
        </div>
    </div>
    <div class="form-group row">
        <label for="date_debut">Date debut</label>
        <div class="col-sm-10" style="margin-left: 65px">
            <input  class="form-control" type="date" name="date_debut" >
        </div>
    </div>
    <div class="form-group row">
        <label for="date_fin">Date debut</label>
        <div class="col-sm-10" style="margin-left: 65px">
            <input  class="form-control" type="date" name="date_fin" >
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAddress">Adresse</label>
       <div class="col-sm-10" style="margin-left: 80px">
           <input type="text"  class="form-control"  name="adresse" placeholder="chercher adresse" >
       </div>
    </div>
    <div class="form-group row" >
        <label for="type">Type</label>
        <div class="col-sm-10" style="margin-left: 100px">
            <input type="text"  class="form-control" name="type" placeholder="type" >
        </div>
    </div>
    <div class="form-group row">
        <label for="type">Requerant</label>
        <div class="col-sm-10" style="margin-left: 65px">
            <input type="text"  class="form-control" name="requerant" placeholder="chercher requerant" >
        </div>
    </div>
    <div class="form-group row">
        <label for="type">Responsable</label>
        <div class="col-sm-10" style="margin-left: 45px">
            <select custom-select my-1 mr-sm-2 name="responsable" class="custom-select mr-sm-2" >
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <input class="btn btn-primary" type="button" name="submit" value="Créer" >
    </div>
</diV>
