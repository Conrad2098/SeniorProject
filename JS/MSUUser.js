function createUser(){
    var name = document.getElementById("name").value;
    var pass = document.getElementById("password").value;
    var confPass = document.getElementById("confirmPass").value;
    var email = document.getElementById("userEmail").value;
    var institution = document.getElementById("userInst").value;

    var alertmsg = regexCheck(name, pass, confPass, email, institution);

    if(alertmsg != false){
        alert(alertmsg);
    }else{
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                if(this.responseText == "false"){
                    alert("There is already an account with this email address. Please enter another.");
                }else if(this.responseText == "Error Inserting"){
                    alert("There was a problem creating the account. Please try again later.");
                }else{
                    alert("An administrator must now approve your account. You will now be redirected to the home page.");
                    window.location.assign("./msstateDrupal.html");
                }
            }
        };
        req.open("GET", "php/MSUCreateUser.php?q=" + name + "&r=" + pass + "&s=" + email + "&t=" + institution , true);
        req.send();
    }
}

function login(){
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    
    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            if(this.responseText == "false"){
                alert("Invalid Email or Password");
            }else if(this.responseText == "Error"){
                alert("Error Logging in. Please try again later.");
            }else if(this.responseText == "Password Match1"){
                document.cookie = "email=" + email + "; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
                document.cookie = "x=e9F7iK45E!; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/"
                window.location.assign("./msstateDrupal.html");
            }else if(this.responseText == "Password Match0"){
                var value = makeid();
                document.cookie = "email=" + email + "; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
                document.cookie = "x=" + value + "; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
                window.location.assign("./msstateDrupal.html");
            }else{
                alert("Invalid Email or Password");
            }
        }
    };
    req.open("GET", "php/MSULogin.php?q=" + email + "&r=" + pass, true);
    req.send();
}

function logout(){
    document.cookie = "email=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
    document.cookie = "x=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
    window.location.assign("./msstateDrupal.html");
}

function loginSwap(){
    var test = document.cookie;
    var email = test.search("email=")
    if(email != -1){
        var x = test.search("x=");
        if(x != -1){
            document.getElementById("account").innerHTML ="<a href='./MSUAccountPage.html'>Account</a>";
        }
    }
}

function regexCheck(name, pass, confPass, email, institution){
    var errormsg = "";

    var namePat = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    var passPat = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    var emailPat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var instPat = /^(?!\s*$).+/g;

    if(namePat.test(name) == false){
        errormsg = "Name must be in the following format: John Doe.";
    }
    if(passPat.test(pass) == false){
        errormsg = errormsg + "\n" + "Password must have at least one uppercase character, one lowercase character, one number, and be at least 6 characters long.";
    }
    if(pass != confPass){
        errormsg = errormsg + "\n" + "Passwords must match."
    }
    if(emailPat.test(email) == false){
        errormsg = errormsg + "\n" + "Email must be in the following format: someone@example.com"
    }
    if(instPat.test(institution) == false){
        errormsg = errormsg + "\n" + "Must list an Institution you are associated with.";
    }

    if(errormsg == ""){
        return false;
    }else{
        return errormsg;
    }

}

function makeid() {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 10; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }

 function isAdmin(){
     var check = document.cookie;
     var loggedIn = check.search("x=");
     var admin = check.search("x=e9F7iK45E!");
     if(loggedIn != -1){
         if(admin != -1){
            return "admin";
         }else{
            return "user";
         }
     }else{
         return "notIn";
     }
 }

 function adminPanel(){
     var admin = isAdmin();
     var internal = document.getElementById("navBar").innerHTML;

     if(admin == "admin"){
         document.getElementById("navBar").innerHTML = internal + "<li class='last leaf'><a href='./MSUAdminPage.html'>Admin</li>";
     }
 }

 function welcome(){

    var admin = isAdmin();
    
    if(admin == "admin"){
        document.getElementById("welcome").innerHTML = "Welcome Admin";
    }else if(admin == "user"){
        document.getElementById("welcome").innerHTML = "Welcome User";
    }else if(admin == "notIn"){
        window.location.assign("./login.html");
    }
 }

 function removeEdit(){
    var admin = isAdmin();

    if(admin == "admin"){
        document.getElementById("removedit").innerHTML = "<button onclick='removeRecord()'>Remove Record</button><button onclick='editRedir()'>Edit Record</button>";
    }else if(admin == "user"){
        document.getElementById("removeEditButtons").innerHTML = "";
    }
 }

 function removeRecord(){

    var id = sessionStorage.getItem("msuColumn");

    var confirm = prompt("You are about to permanently remove this record from the database.\n To confim this, please type 'Confirm'.", "");

    if(confirm == "Confirm"){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){

                if(this.responseText == "Record Deleted. Redirecting to the Browse page."){
                    alert("Record Deleted. Redirecting to the Browse page.");
                    window.location.assign("./browse.html");
                }else{
                    alert(this.responseText);
                }

            }
        }
        req.open("GET", "php/MSURemoveRecord.php?q=" + id, true);
        req.send();
    }else{
        alert("Removal Canceled.")
    }
 }

 function passChange(){
    if(document.getElementById("currentPass").value == "" || document.getElementById("newPass").value == ""){
        alert("Please type your current and desired passwords in the boxes.");
        return;
    }

    var oldPass = document.getElementById("currentPass").value;
    var newPass = document.getElementById("newPass").value;

    var cook = "; " + document.cookie;
    var parts = cook.split("; email=");
    if(parts.length == 2){
        var i = parts.pop().split(";").shift();
    }

    var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                if(this.responseText == "WrongOld"){
                    alert("Old password is incorrect. Please try again.");
                }else if(this.responseText == "Error"){
                    alert("Failed. Please try again later.");
                }else{
                    alert("Password Changed");
                }
            }
        }
    req.open("GET", "./php/MSUChangePass.php?q=" + oldPass + "&r=" + newPass + "&s=" + i, true);
    req.send();
 }

 function removeAccount(){
    var cook = "; " + document.cookie;
    var parts = cook.split("; email=");
    if(parts.length == 2){
        var i = parts.pop().split(";").shift();
    }

    var confirm = prompt("Confirm that you wish to delete your account by entering your password:");

        if(confirm != null){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){

                if(this.responseText == "WrongPass"){
                    alert("Wrong Password");
                }else if(this.responseText == "Error"){
                    alert(this.responseText);
                }else{
                    alert("Account Deleted. Redirecting back to home page.");
                    document.cookie = "email=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
                    document.cookie = "x=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
                    window.location.assign("./msstateDrupal.html");
                }

            }
        }
        req.open("GET", "php/MSURemoveAccount.php?q=" + confirm + "&r=" + i, true);
        req.send();
    }
 }

 function addRecord(){
    var lib = document.getElementById("Library").value;
    var city = document.getElementById("City").value;
    var country = document.getElementById("Country").value;
    var web = document.getElementById("Website").value;
    var manu = document.getElementById("Manuscript").value;
    var author = document.getElementById("Author").value;
    var birth = document.getElementById("Birthdate").value;
    var death = document.getElementById("Deathdate").value;
    var notes = document.getElementById("Notes").value;
    var OorC = document.getElementById("OorC").value;

    var reg = addRegexCheck(lib, city, country, web, manu, author, birth, death, notes);
    
    if(reg == "Match"){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                if(this.responseText == "Success"){
                    alert("Record Successfully Added.")
                }else{
                    alert(this.responseText)
                }
            }
        }
        req.open("GET", "php/MSUAddRecord.php?q=" + lib + "&r=" + city + "&s=" + country + "&t=" + web + "&u=" + manu + "&v=" + author + "&w=" + birth + "&x=" + death + "&y=" + notes + "&z=" + OorC, true);
        req.send();
    }
    else{
        alert(reg);
    }
 }

 function addRegexCheck(lib, city, country, web, manu, author, birth, death, notes){
    var libReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var cityReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var countryReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var webReg = /^(None)|\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/i;
    var manuReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var authReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var birthReg = /^(Unknown)|^(?:(0[1-9]|1[012])[\/.](0[1-9]|[12][0-9]|3[01])[\/.][1-9][0-9]{3})$|[1-9][0-9]{1,3}/;
    var deathReg = /^(Unknown)|^(?:(0[1-9]|1[012])[\/.](0[1-9]|[12][0-9]|3[01])[\/.][1-9][0-9]{3})$|[1-9][0-9]{1,3}/;
    var notesReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;

    var msg = "";

    if(!libReg.test(lib)){
        msg = msg + "Library must be Alpha-numeric. May include international characters.\n";
    }if(!cityReg.test(city)){
        msg = msg + "City must be Alpha-number. May include international characters.\n";
    }if(!countryReg.test(country)){
        msg = msg + "Country must be Alphabetical. May include international characters.\n";
    }if(!webReg.test(web)){
        msg = msg + "Website must be in one of the following forms: http://example.com/, www.example.com, or None.\n";
    }if(!manuReg.test(manu)){
        msg = msg + "Manuscript must be Alpha-numeric. May include international characters.\n";
    }if(!authReg.test(author)){
        msg = msg + "Author must be Alpha-numeric. May include international characters.\n";
    }if(!birthReg.test(birth)){
        msg = msg + "Birthdate must be in one of the following forms: mm/dd/yyyy, yyyy, or Unknown.\n";
    }if(!deathReg.test(death)){
        msg = msg + "Deathdate must be in one of the following forms: mm/dd/yyyy, yyyy, or Unknown.\n";
    }if(!notesReg.test()){
        msg = msg + "Notes must be Alpha-numeric. May include international characters.";
    }

    if(msg == ""){
        return "Match";
    }else{
        return msg;
    }
 }

 function editRedir(){
    var loc = document.getElementById("loc").innerHTML;
    var date = document.getElementById("bAndD").innerHTML;

    var locArray = loc.split(", ");
    var dateArray = date.split("-");
    var city = locArray[0];
    var country = locArray[1];
    var birth = dateArray[0];
    var death = dateArray[1];

    localStorage.setItem("name",document.getElementById("name").innerHTML);
    localStorage.setItem("lib",document.getElementById("lib").innerHTML);
    localStorage.setItem("city",city);
    localStorage.setItem("country",country);
    localStorage.setItem("link",document.getElementById("link").innerHTML);
    localStorage.setItem("author",document.getElementById("author").innerHTML);
    localStorage.setItem("birth",birth);
    localStorage.setItem("death",death);
    localStorage.setItem("notes",document.getElementById("notes").innerHTML);
    localStorage.setItem("OorC",document.getElementById("OorC").innerHTML);

     window.location.assign("MSUEditPage.html");
 }

 function editPop(){
     document.getElementById("Manuscript").value = localStorage.getItem("name");
     document.getElementById("Library").value = localStorage.getItem("lib");
     document.getElementById("City").value = localStorage.getItem("city");
     document.getElementById("Country").value = localStorage.getItem("country");
     document.getElementById("Website").value = localStorage.getItem("link");
     document.getElementById("Author").value = localStorage.getItem("author");
     document.getElementById("Birthdate").value = localStorage.getItem("birth");
     document.getElementById("Deathdate").value = localStorage.getItem("death");
     document.getElementById("Notes").value = localStorage.getItem("notes");
     document.getElementById("OorC").value = localStorage.getItem("OorC");
 }

 function editRecord(){
    var lib = document.getElementById("Library").value;
    var city = document.getElementById("City").value;
    var country = document.getElementById("Country").value;
    var web = document.getElementById("Website").value;
    var manu = document.getElementById("Manuscript").value;
    var author = document.getElementById("Author").value;
    var birth = document.getElementById("Birthdate").value;
    var death = document.getElementById("Deathdate").value;
    var notes = document.getElementById("Notes").value;
    var OorC = document.getElementById("OorC").value;

    var reg = addRegexCheck(lib, city, country, web, manu, author, birth, death, notes);

    if(reg == "Match"){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                if(this.responseText == "Success"){
                    alert("Record Successfully Edited.")
                    localStorage.removeItem("name");
                    localStorage.removeItem("lib");
                    localStorage.removeItem("city");
                    localStorage.removeItem("country");
                    localStorage.removeItem("link");
                    localStorage.removeItem("author");
                    localStorage.removeItem("birth");
                    localStorage.removeItem("death");
                    localStorage.removeItem("notes");
                    localStorage.removeItem("OorC");
                    window.location.assign("./MSUdetails.html");
                }else{
                    alert(this.responseText)
                }
            }
        }
        req.open("GET", "php/MSUEditRecord.php?id=" + sessionStorage.getItem("msuColumn") + "&q=" + lib + "&r=" + city + "&s=" + country + "&t=" + web + "&u=" + manu + "&v=" + author + "&w=" + birth + "&x=" + death + "&y=" + notes + "&z=" + OorC, true);
        req.send();
    }
    else{
        alert(reg);
    }
 }