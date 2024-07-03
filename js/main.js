let open = false;
function expand() {
    if (open) { 
        document.querySelector("#no-display1").style.display = "none";
        
        open = false;
        return false;
    } else {
        document.querySelector("#no-display1").style.display = "flex";
        open = true;
        return false;
    }
    return false;
}

function search() {
    var date1 = new Date(document.querySelector("#vertrek-datum").value);
    var date1_2 = new Date(document.querySelector("#vertrek-datum2").value);
    var date2 = new Date(document.querySelector("#aankomst-datum").value);
    var date2_2 = new Date(document.querySelector("#aankomst-datum2").value);
    if (date1 > date2) {
        alert("Vertek datum moet voor de terugkomstdatum zijn");
        return false;
    }
    if (date1 > date1_2) {
        alert("Vertrek datum 1 moet voor vertrek datum 2 zijn");
        return false;
    }
    if (date2 > date2_2) {
        alert("terugkomst datum 1 moet voor terugkomst datum 2 zijn");
        return false;
    }
}

function createAccount() {
    let wwVeld1 = document.querySelector("#password").value;
    let wwVeld2 = document.querySelector("#passwordRepeat").value
    if (wwVeld1 != wwVeld2) {
        alert("Voer hetzelfde wachtwoord in");
        return false;
    } else {
        alert("Account aangemaakt");
    }
}

function resetPassword() {
    let wwVeld1 = document.querySelector("#password").value;
    let wwVeld2 = document.querySelector("#password2").value;
    if (wwVeld1 != wwVeld2) {
        alert("Voer hetzelfde wachtwoord in");
        return false;
    } else {
        alert("Wachtwoord veranderd");
    }
}