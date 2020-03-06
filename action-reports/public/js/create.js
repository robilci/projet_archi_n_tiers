document.addEventListener("DOMContentLoaded", function(event) {
    let buttonAdd = document.getElementById("buttonAddVehicle");
    buttonAdd.addEventListener('click', addVehicule);
});

// ----- name of fields ------ //
let names;
let nbVehicles = 1;
let lastElement = document.getElementById("lastElement");

function addVehicule() {
    names = ["vehicleName" + nbVehicles,
        "vehicleDateDeparture" + nbVehicles,
        "vehicleDateArrival" + nbVehicles,
        "vehicleDateReturn" + nbVehicles,
        "vehiclePatrol" + nbVehicles];

    let mainDiv = document.createElement("div");
    mainDiv.setAttribute("class", "center-block border border-secondary rounded p-3 m-3");

    // ----- field 1 - name of vehicle ------ //
    let vehicleNameDiv = createDivFormGroup();
    let vehicleNameSelect = createSelect(names[0]);

    vehicleNameSelect.appendChild(createOption());
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
    mainDiv.appendChild(createRoleField("Conducteur", "1"));

    let titleVehicle = document.createElement("h4");
    titleVehicle.setAttribute("class", "my-4")
    titleVehicle.innerHTML = "Nouveau vehicule numéro " + nbVehicles;

    lastElement.parentNode.insertBefore(mainDiv, lastElement.nextSibling);
    lastElement.parentNode.insertBefore(titleVehicle, lastElement.nextSibling);
    lastElement = mainDiv;
    nbVehicles++;
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
    return select;
}

function createOption(){
    let option = document.createElement("option");
    option.innerHTML = "test";
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

function createRoleField(roleName, roleNumber){
    let divRole = document.createElement("div");
    divRole.setAttribute("class", "form-group col-md-5");
    let labelRole = createLabel("Rôle");
    let input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("class", "form-control");
    input.setAttribute("id", "vehicleRole" + roleNumber);
    input.setAttribute("value", roleName);
    divRole.appendChild(labelRole);
    divRole.appendChild(input);

    let divFireFighter = document.createElement("div");
    divFireFighter.setAttribute("class", "form-group col-md-4 my-2");
    let labelFireFighter = createLabel("Pompiers");
    let select = createSelect("vehicleRoleFireFighter" + roleNumber);
    select.appendChild(createOption());
    divFireFighter.appendChild(labelFireFighter);
    divFireFighter.appendChild(select);

    let mainDiv = document.createElement("div");
    mainDiv.setAttribute("class", "form-row");
    mainDiv.appendChild(divRole);
    mainDiv.appendChild(divFireFighter);

    return mainDiv;
}

