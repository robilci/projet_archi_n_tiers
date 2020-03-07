document.addEventListener("DOMContentLoaded", function(event) {
    let buttonAdd = document.getElementById("buttonAddVehicle");
    buttonAdd.addEventListener('click', addVehicule);
});

// ----- name of fields ------ //
let names;
let nbVehicles = 1;
let lastElement = document.getElementById("lastElement");
let xmlhttpVehiclesName;
let xmlhttpVehiclesRoles;
let selectedVehicle = 1;
let divRolesName = "roleVehicles";
let mainDivVehicleName = "divVehicle";

function addVehicule() {

    if (window.XMLHttpRequest)
    {   // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttpVehiclesRoles=new XMLHttpRequest();
    }
    else
    {   // code for IE6, IE5
        xmlhttpVehiclesRoles=new ActiveXObject("Microsoft.XMLHTTP");
    }

    names = ["vehicleName" + nbVehicles,
        "vehicleDateDeparture" + nbVehicles,
        "vehicleDateArrival" + nbVehicles,
        "vehicleDateReturn" + nbVehicles,
        "vehiclePatrol" + nbVehicles,
        nbVehicles];

    let mainDiv = document.createElement("div");
    mainDiv.setAttribute("class", "center-block border border-secondary rounded p-3 m-3");
    mainDiv.setAttribute("id", mainDivVehicleName + nbVehicles);

    // ----- field 1 - name of vehicle ------ //
    let vehicleNameDiv = createDivFormGroup();
    let vehicleNameSelect = createSelect(names[0]);

    requestVehiclesName();
    xmlhttpVehiclesName.onreadystatechange=function()
    {
        if (xmlhttpVehiclesName.readyState === 4 && xmlhttpVehiclesName.status === 200)
        {
            vehicleNameSelect.appendChild(createOption("Séléctionnez un véhicule"));
            let vehicles = JSON.parse(xmlhttpVehiclesName.responseText);
            for(let i = 0; i < vehicles.length; i++){
                vehicleNameSelect.appendChild(createOption(vehicles[i]["Vehicule_Code"]));
            }
        }
    }

    vehicleNameSelect.addEventListener('change', function(e){
        if(e.target.selectedIndex !== 0) {
            selectedVehicle = e.target.id;

            xmlhttpVehiclesRoles.open("POST", "/ajax/vehicles/roles", true);
            xmlhttpVehiclesRoles.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttpVehiclesRoles.send("name=" + e.target.options[e.target.selectedIndex].value);
        }
    });

    xmlhttpVehiclesRoles.onreadystatechange=function()
    {
        if (xmlhttpVehiclesRoles.readyState === 4 && xmlhttpVehiclesRoles.status === 200)
        {
            let oldRoles = Array.from(document.getElementsByName(divRolesName + selectedVehicle));
            for(var i = 0; i < oldRoles.length; i++){
               oldRoles[i].remove();
            }

            let mainDivVehicle = document.getElementById(mainDivVehicleName + selectedVehicle);
            let roles = JSON.parse(xmlhttpVehiclesRoles.responseText);
            for(let i = 0; i < roles.length; i++){
                mainDivVehicle.appendChild(createRoleField(roles[i]["Role_Nom"], selectedVehicle));
            }
        }
    }

    vehicleNameDiv.appendChild(createLabel("Nom de l'engin N°" + nbVehicles));
    vehicleNameDiv.appendChild(vehicleNameSelect);

    // ----- field 2 - date of begin ------ //
    let departureDate = createDateField("Date de départ", names[1]);

    // ----- field 3 - date of departure ------ //
    let arrivalDate = createDateField("Date d'arrivée", names[2]);

    // ----- field 4 - date of departure ------ //
    let returnDate = createDateField("Date de retour", names[3]);

    // ----- field 4 - patrol ------ //
    let patrol = createCheckBoxField();

    // title for participants //
    let titleParticipants = document.createElement("h5");
    titleParticipants.innerHTML = "Participants";

    // ----- add all fields inside main div ------ //
    mainDiv.appendChild(vehicleNameDiv);
    mainDiv.appendChild(departureDate);
    mainDiv.appendChild(arrivalDate);
    mainDiv.appendChild(returnDate);
    mainDiv.appendChild(patrol);
    mainDiv.appendChild(document.createElement("hr"));
    mainDiv.appendChild(titleParticipants)

    let titleVehicle = document.createElement("h4");
    titleVehicle.setAttribute("class", "my-4")
    titleVehicle.innerHTML = "Nouveau vehicule numéro " + nbVehicles;

    lastElement.parentNode.insertBefore(mainDiv, lastElement.nextSibling);
    lastElement.parentNode.insertBefore(titleVehicle, lastElement.nextSibling);
    lastElement = mainDiv;
    nbVehicles++;
}

function requestVehiclesRoles(name){
    console.log(name);
    /**/
}

function requestVehiclesName(){

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttpVehiclesName=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttpVehiclesName=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpVehiclesName.open("GET","/ajax/vehicles",true);
    xmlhttpVehiclesName.send();
}

function createDivFormGroup(){
    let div = document.createElement("div");
    div.setAttribute("class", "form-group");
    return div;
}

function createLabel(text){
    let label = document.createElement("label");
    label.innerHTML = text;
    return label;
}

function createSelect(name){
    let select = document.createElement("select");
    select.setAttribute("class", "form-control");
    select.setAttribute("name", name);
    select.setAttribute("id", names[names.length - 1]);
    return select;
}

function createOption(text){
    let option = document.createElement("option");
    option.innerHTML = text;
    return option;
}

function createDateField(text, name){
    let div = createDivFormGroup();
    let label = createLabel(text);
    let inputDate = document.createElement("input");
    inputDate.setAttribute("class", "form-control");
    inputDate.setAttribute("type", "datetime-local");
    inputDate.setAttribute("value", "2020-08-19T13:45:00");
    inputDate.setAttribute("name", name);
    div.appendChild(label);
    div.appendChild(inputDate);
    return div;
}

function createCheckBoxField(){
    let div = document.createElement("div");
    div.setAttribute("class", "form-check");
    let label = createLabel("Ronde");
    let checkbox = document.createElement("input");
    checkbox.setAttribute("type", "checkbox");
    checkbox.setAttribute("class", "form-check-input mx-2");
    checkbox.setAttribute("name", names[4]);
    div.appendChild(label);
    div.appendChild(checkbox);
    return div;
}

function createRoleField(roleName, vehicleId){
    let divRole = document.createElement("div");
    divRole.setAttribute("class", "form-group col-md-5");
    let labelRole = createLabel("Rôle");
    let input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "form-control");
    input.setAttribute("readonly", true);
    input.setAttribute("name", "vehicleRole" + vehicleId);
    input.setAttribute("value", roleName);
    divRole.appendChild(labelRole);
    divRole.appendChild(input);

    let divFireFighter = document.createElement("div");
    divFireFighter.setAttribute("class", "form-group col-md-4 my-2");
    let labelFireFighter = createLabel("Pompiers");
    let select = createSelect("vehicleRoleFireFighter" + vehicleId);

    let xmlhttpFirefighters;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttpFirefighters=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttpFirefighters=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttpFirefighters.open("GET","/ajax/firefighters",true);
    xmlhttpFirefighters.send();

    xmlhttpFirefighters.onreadystatechange=function()
    {
        if (xmlhttpFirefighters.readyState === 4 && xmlhttpFirefighters.status === 200)
        {
            let firefighters = JSON.parse(xmlhttpFirefighters.responseText);
            console.log(firefighters);
            for(let i = 0; i < firefighters.length; i++){
                select.appendChild(createOption(firefighters[i]["Prenom"] + " " + firefighters[i]["Nom"]));
            }
        }
    }

    divFireFighter.appendChild(labelFireFighter);
    divFireFighter.appendChild(select);

    let mainDiv = document.createElement("div");
    mainDiv.setAttribute("class", "form-row");
    mainDiv.setAttribute("name", divRolesName + vehicleId);
    mainDiv.appendChild(divRole);
    mainDiv.appendChild(divFireFighter);

    return mainDiv;
}



