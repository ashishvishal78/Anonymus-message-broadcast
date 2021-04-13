function sen_msg(str, id) {
    console.log(str);
    if (str == "") {
      // document.getElementById("txtHint").innerHTML = "";
      return;
    } 
    else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("recieved");
          // document.getElementById("area").innerHTML+="<ul><li><p>"+this.responseText+"</p></li></ul>";
          document.getElementById("message").value="";
        }
      };
      xmlhttp.open("GET","action.php?q="+str+"&id="+id,true);
      xmlhttp.send();
      // xmlhttp.open("POST", "action.php", true);
      // xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      // xmlhttp.send("q="+encodeURIComponent(str)+"&txt="+encodeURIComponent(id));
    }
}

function start_un(){
  if(document.getElementById('uname').value==="")
  {
    console.log("here");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        document.getElementById('uname').value=this.responseText;
        document.getElementById('show_uname').innerText="USERID:"+this.responseText;
      }
    };
    xmlhttp.open("GET","uname.php",true);
    xmlhttp.send();
  }
}

function addmember(id){
  if(document.getElementById('uname').value!="")
  {
    console.log("id :",id);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log("submit",this.responseText);
        document.getElementById('is_member').innerText=this.responseText;
      }
    };
    xmlhttp.open("GET","addmember.php?q="+id,true);
    xmlhttp.send();
    // xmlhttp.open("POST", "addmember.php", true);
    // xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // xmlhttp.send("q="+encodeURIComponent(id));
  }
}

function removemember(id){
  if(document.getElementById('uname').value!="")
  {
    console.log("id :",id);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log("submit",this.responseText);
        document.getElementById('is_member').innerText=this.responseText;
      }
    };
    xmlhttp.open("GET","removemember.php?q="+id,true);
    xmlhttp.send();
    // xmlhttp.open("POST", "removemember.php", true);
    // xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // xmlhttp.send("q="+encodeURIComponent(id));
  }
}

function openNav() {
  document.getElementById("profile").style.width = "80vw";
}

function closeNav() {
  document.getElementById("profile").style.width = "0";
}