function rsToDoll()
{
    var amt = document.getElementById("rsamt").value;
    var convertedAmt = (amt*0.0117).toFixed(2);
    document.getElementById("doll").innerText = `Converted Amt : ${convertedAmt} USD`;
}
function dollToRs(){
    var amt = document.getElementById("dollamt").value;
    var convertedAmt = (amt*85.52).toFixed(2);
    document.getElementById("rs").innerText = `Converted Amt : ${convertedAmt} USD`;
}