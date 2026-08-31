// let password = document.getElementById('thetextpassword').value;

// if()
// let passwordbtn = document.getElementById('hideorshowbtn').innerHTML;

// function show()
// {
//     alert("WORKED");
// }

// function dochanges()
// {
// let btext = document.getElementById("btntext").innerHTML;
// let text = document.getElementById('passwordvalue').value;
// let showp = text;
// let textlength = text.length;
// hiddenpassword = "";
//   if(btext == "Hide")
//   {
//     for(let i=0;i<textlength;i++)
//     {
//      hiddenpassword +="*";
//     }
//     document.getElementById("passwordvalue").value = hiddenpassword;
//     document.getElementById("btntext").innerHTML = "Show";
//   }
//   else if(btext == "Show")
//   {
//     document.getElementById("passwordvalue").value = showp;
//     document.getElementById("btntext").innerHTML = "Hide";

//   }
// }


const passwordField = document.querySelector("#password");

function switchVisibility() 
{
  if(passwordField.getAttribute("type") === "password")
  {
    passwordField.setAttribute("type","text");
  }
  else
  {
    passwordField.setAttribute("type","password");
  }

}