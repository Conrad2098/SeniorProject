function createWUser(){
    var name = document.getElementById("loginName").value;
    var pass = document.getElementById("password").value;
    var confPass = document.getElementById("confPassword").value;
    var email = document.getElementById("email").value;
    var institution = document.getElementById("institution").value;
    var alertmsg = wRegexCheck(name, pass, confPass, email, institution);

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
                    window.location.assign("http://localhost/seniorproject/theW.html");
                }
            }
        };
        req.open("GET", "http://localhost/seniorproject/php/WCreateUser.php?q=" + name + "&r=" + pass + "&s=" + email + "&t=" + institution , true);
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
                document.cookie = "wEmail=" + email + "; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
                document.cookie = "y=t8Fin83Aj!; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/"
                window.location.assign("http://localhost/seniorproject/theW.html");
            }else if(this.responseText == "Password Match0"){
                var value = makeid()
                document.cookie = "wEmail=" + email + "; expires=Thu, 18 Dec 2100 12:00:00 UTC; paht=/";
                document.cookie = "y=" + value + "; expires=Thu, 18 Dec 2100 12:00:00 UTC; path=/";
                window.location.assign("http://localhost/seniorproject/theW.html");
            }else{
                alert("Invalid Email or Password");
            }
        }
    };
    req.open("GET", "http://localhost/seniorproject/php/WLogin.php?q=" + email + "&r=" + pass, true);
    req.send();
}

function logout(){
    document.cookie = "wEmail=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
    document.cookie = "y=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
    window.location.assign("http://localhost/seniorproject/theW.html");
}

function accountSwap(){
    var test = document.cookie;
    var test1 = test.search("wEmail=")
    if(test1 != -1){
        var test2 = test.search("y=");
        if(test2 != -1){
            document.getElementById("swap").innerHTML ="<a href='http://localhost/seniorproject/WAccountPage.html' class='readon'>Account</a>";
        }
    }
}

function wRegexCheck(name, pass, confPass, email, institution){
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
    var loggedIn = check.search("y=");
    var admin = check.search("y=t8Fin83Aj!");
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
    var internal = document.getElementById("naviBar").innerHTML;

    if(admin == "admin"){
        document.getElementById("naviBar").innerHTML = internal + " | <a href='http://localhost/seniorproject/WAdminPage.html' class='readon'>Admin</a>";
    }
}

function welcome(){

    var admin = isAdmin();
    
    if(admin == "admin"){
        document.getElementById("welcomeMessage").innerHTML = "Welcome Admin";
    }else if(admin == "user"){
        document.getElementById("welcomeMessage").innerHTML = "Welcome User";
    }else if(admin == "notIn"){
        window.location.assign("./login.html");
    }
 }

 function removeEditAdd(){
    var admin = isAdmin();

    if(admin == "admin"){
        document.getElementById("removeEditButtons").innerHTML = "<button onclick='remove()' class='bigsearch-button'>Remove Record</button><button onclick='editRedirect()' class='bigsearch-button'>Edit Record</button>";
    }else if(admin == "user"){
        document.getElementById("removeEditButtons").innerHTML = "";
    }
 }

 function remove(){

    var id = sessionStorage.getItem("item");

    var confirm = prompt("You are about to permanently remove this record from the database.\n To confim this, please type 'Confirm'.", "");

    if(confirm == "Confirm"){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){

                if(this.responseText == "Record Deleted. Redirecting to the Browse page."){
                    alert(this.responseText);
                    window.location.assign("http://localhost/seniorproject/WResults.html");
                }else{
                    alert(this.responseText);
                }

            }
        }
        req.open("GET", "http://localhost/seniorproject/php/WRemoveRecord.php?q=" + id, true);
        req.send();
    }else{
        alert("Removal Canceled.")
    }
 }

 function changePass(){
    if(document.getElementById("currentPass").value == "" || document.getElementById("newPass").value == ""){
        alert("Please type your current and desired passwords in the boxes.");
        return;
    }

    var oldPass = document.getElementById("currentPass").value;
    var newPass = document.getElementById("newPass").value;

    var cook = "; " + document.cookie;
    var parts = cook.split("; wEmail=");
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
    req.open("GET", "http://localhost/seniorproject/php/WChangePass.php?q=" + oldPass + "&r=" + newPass + "&s=" + i, true);
    req.send();
}

 function deleteAccount(){
    var cook = "; " + document.cookie;
    var parts = cook.split("; wEmail=");
    if(parts.length == 2){
        var i = parts.pop().split(";").shift();
    }

    var confirm = prompt("Confirm that you wish to delete your account by entering your password:");

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){

            if(this.responseText == "WrongPass"){
                alert("Wrong Password");
            }else if(this.responseText == "Error"){
                alert(this.responseText);
            }else if(this.responseText == "Account deleted."){
                alert("Account Deleted. Redirecting back to home page.");
                document.cookie = "email=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
                document.cookie = "y=; expires=Thu, 18 Dec 2010 12:00:00 UTC; path=/";
                window.location.assign("http://localhost/seniorproject/theW.html");
            }else{
                alert(this.responseText);
            }
        }
    }
    req.open("GET", "http://localhost/seniorproject/php/WRemoveAccount.php?q=" + confirm + "&r=" + i, true);
    req.send();
 } 
 
 function recordAdd(){
    var inst = document.getElementById("institution").value;
    var coll = document.getElementById("collection").value;
    var instcollnum = document.getElementById("instcollnum").value;
    var incDates = document.getElementById("inclusivedates").value;
    var extent = document.getElementById("extent").value;
    var subHeads = document.getElementById("subjectheadings").value;
    var desc = document.getElementById("description").value;
    var link = document.getElementById("link").value;
    var notes = document.getElementById("notes").value;

    var reg = addRegexCheck(inst, coll, instcollnum, incDates, extent, subHeads, desc, link, notes);
    
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
        req.open("GET", "http://localhost/seniorProject/php/WAddRecord.php?q=" + inst + "&r=" + coll + "&s=" + instcollnum + "&t=" + incDates + "&u=" + extent + "&v=" + subHeads + "&w=" + desc + "&x=" + link + "&y=" + notes, true);
        req.send();
    }
    else{
        alert(reg);
    }
 }

 function addRegexCheck(inst, coll, instcollnum, incDates, extent, subHeads, desc, link, notes){
    var instReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var collReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var instcollnumReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var incDatesReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var extentReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var authReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var descReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;
    var linkReg = /^(None)|\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/i;
    var notesReg = /^[A-z\x00-\xff\s'\.,-\/#!$%\^&\*;:{}=\-_`~()]{1,}/;

    var msg = "";

    if((!instReg.test(inst))){
        msg = msg + "Institution must be Alpha-numeric. May include international characters.\n";
    }if(!collReg.test(coll)){
        msg = msg + "Collection Title must be Alpha-numeric. May include international characters.\n";
    }if(!instcollnumReg.test(instcollnum)){
        msg = msg + "Institution Collumn Number must be Alpha-numeric. May include international characters.\n";
    }if(!incDatesReg.test(incDates)){
        msg = msg + "Inclusive Dates must be Alpha-numeric. May include international characters.\n";
    }if(!extentReg.test(extent)){
        msg = msg + "Extent must be Alpha-numeric. May include international characters.\n";
    }if(!authReg.test(subHeads)){
        msg = msg + "Subject headings must be Alpha-numeric. May include international characters.\n";
    }if(!descReg.test(desc)){
        msg = msg + "Description must be Alpha-numeric. May include international characters.\n";
    }if(!linkReg.test(link)){
        msg = msg + "Link must be alpha-numeric and in one of the following forms: http://example.com/, www.example.com, or None.\n";
    }if(!notesReg.test(notes)){
        msg = msg + "Notes must be Alpha-numeric. May include international characters.";
    }

    if(msg == ""){
        return "Match";
    }else{
        return msg;
    }
}

 function editRedirect(){
    localStorage.setItem("inst",document.getElementById("inst").innerHTML);
    localStorage.setItem("coll",document.getElementById("coll").innerHTML);
    localStorage.setItem("instcollnum",document.getElementById("instcollnum").innerHTML);
    localStorage.setItem("incdates",document.getElementById("incdates").innerHTML);
    localStorage.setItem("extent",document.getElementById("extent").innerHTML);
    localStorage.setItem("subHead",document.getElementById("subHead").innerHTML);
    localStorage.setItem("desc",document.getElementById("desc").innerHTML);
    localStorage.setItem("link",document.getElementById("link").innerHTML);
    localStorage.setItem("notes",document.getElementById("notes").innerHTML);
    localStorage.setItem("id", document.getElementById("id").innerHTML);

     window.location.assign("http://localhost/seniorProject/WEditRecord.html");
 }

 function recordEPop(){
    document.getElementById("institution").value = localStorage.getItem("inst");
    document.getElementById("collection").value = localStorage.getItem("coll");
    document.getElementById("instcollnum").value = localStorage.getItem("instcollnum");
    document.getElementById("inclusivedates").value = localStorage.getItem("incdates");
    document.getElementById("extent").value = localStorage.getItem("extent");
    document.getElementById("subjectheadings").value = localStorage.getItem("subHead");
    document.getElementById("description").value = localStorage.getItem("desc");
    document.getElementById("link").value = localStorage.getItem("link");
    document.getElementById("notes").value = localStorage.getItem("notes");
 }

 function recordEdit(){
    var inst = document.getElementById("institution").value;
    var coll = document.getElementById("collection").value;
    var instcollnum = document.getElementById("instcollnum").value;
    var incDates = document.getElementById("inclusivedates").value;
    var extent = document.getElementById("extent").value;
    var subHeads = document.getElementById("subjectheadings").value;
    var desc = document.getElementById("description").value;
    var link = document.getElementById("link").value;
    var notes = document.getElementById("notes").value;

    var reg = addRegexCheck(inst, coll, instcollnum, incDates, extent, subHeads, desc, link, notes);
    
    if(reg == "Match"){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                if(this.responseText == "Success"){
                    alert("Record Successfully Edited.")
                    localStorage.removeItem("inst");
                    localStorage.removeItem("coll");
                    localStorage.removeItem("instcollnum");
                    localStorage.removeItem("incdates");
                    localStorage.removeItem("extent");
                    localStorage.removeItem("subHead");
                    localStorage.removeItem("desc");
                    localStorage.removeItem("link");
                    localStorage.removeItem("notes");
                    sessionStorage.setItem("item", coll);
                    window.location.assign("http://localhost/seniorProject/Wdetails.html");
                }else{
                    alert(this.responseText)
                }
            }
        }
        req.open("GET", "http://localhost/seniorProject/php/WEditRecord.php?id=" + localStorage.getItem("id") + "&q=" + inst + "&r=" + coll + "&s=" + instcollnum + "&t=" + incDates + "&u=" + extent + "&v=" + subHeads + "&w=" + desc + "&x=" + link + "&y=" + notes, true);
        req.send();
    }
    else{
        alert(reg);
    }
}

function verifyTable(){
    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
         document.getElementById("verifyTable").innerHTML = this.responseText
        }
    };
    req.open("GET", "./php/WVerifyTable.php", true);
    req.send();
 }

function verifyUser(){
    var id = document.getElementById("id").innerHTML;

    var req = new XMLHttpRequest();
   req.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200){
        if(this.response == "Fail"){
           alert(this.responseText);
        }else{
            alert("User Access Granted.");
            location.reload();
        }
       }
   };
   req.open("GET", "./php/WVerifyUser.php?q=" + id, true);
   req.send();
}

function verifyAdmin(){
   var id = document.getElementById("id").innerHTML;
   var confirm = prompt("You are about to grant this user admin-level permissions. Type 'Confirm' to contiune.");

   if(confirm == 'Confirm'){
       var req = new XMLHttpRequest();
       req.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200){
           if(this.response == "Fail"){
              alert(this.responseText);
           }else{
               alert("Admin Access Granted.");
               location.reload();
           }
          }
      };
      req.open("GET", "./php/WVerifyAdmin.php?q=" + id, true);
      req.send();
   }
}

function rejectUser(){
   var id = document.getElementById("id").innerHTML;
   var confirm = prompt("You are about to reject this user's account. Type 'Confirm' to contiune.");

   if(confirm == 'Confirm'){
       var req = new XMLHttpRequest();
       req.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200){
            if(this.response == "Fail"){
                alert(this.responseText);
            }else{
                alert("Account Rejected.");
                location.reload();
            }
          }
      };
      req.open("GET", "./php/WRejectUser.php?q=" + id, true);
      req.send();
   }
}

function commentTable(){
    var req = new XMLHttpRequest();
       req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
            if(this.response == "Fail"){
                alert(this.responseText);
            }else{
                document.getElementById("commentTable").innerHTML = this.responseText;
            }
          }
      };
      req.open("GET", "./php/WCommentTable.php", true);
      req.send();
}

function removeComment(x){
    var comm = document.getElementById("Comment" + x).innerHTML;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            if(this.response == "Fail"){
                alert(this.responseText);
            }else{
                alert("Comment Removed.");
                location.reload();
            }
        }
    };
    req.open("GET", "./php/WRemoveComment.php?q=" + comm, true);
    req.send();
}

function commentBox(){
    var admin = isAdmin();

    if(admin == "user"){
        document.getElementById("commentBox").innerHTML = "<textarea placeholder='Comment Here...' id='comment' style='width: 50%; height: 100px'></textarea><br><button onclick='submitComment()'>Submit Comment</button>";
    }
}

function submitComment(){
    var coll = document.getElementById("coll").innerHTML;
    
    var cook = "; " + document.cookie;
    var parts = cook.split("; wEmail=");
    if(parts.length == 2){
        var i = parts.pop().split(";").shift();
    }

    var comm = document.getElementById("comment").value;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            if(this.responseText == "false"){
                alert("Error");
            }else{
                alert("Comment submitted to Admins.")
            }
        }
    }
    req.open("GET", "http://localhost/seniorproject/php/WSubmitComment.php?q=" + coll + "&r=" + i + "&s=" + comm, true);
    req.send();
}