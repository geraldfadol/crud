
let id = $("input[name*='patient_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let patientname = $("input[name*='patient_name']");
    let patientage = $("input[name*='patient_age']");
    let address = $("input[name*='address']");
    let contactnumber = $("input[name*='mobile_number']");
    let primvac = $("input[name*='vaccine_type']");
    let boosvac = $("input[name*='booster_type']");

    id.val(textvalues[0]);
    patientname.val(textvalues[1]);
    patientage.val(textvalues[2]);
    address.val(textvalues[3]);
    contactnumber.val(textvalues[4]);
    primvac.val(textvalues[5]);
    boosvac.val(textvalues[6]);
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}