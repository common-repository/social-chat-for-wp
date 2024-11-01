  

document.getElementById("name").addEventListener("keyup", function(){
  var nome = document.getElementById('name').value;
  var usuario = document.getElementById('email').value;
  var senha = document.getElementById('password').value;
  var continueButton = document.getElementById("continue-button");
  var instaling2 = document.getElementById("instaling2");
  if (usuario.length >=10 && senha.length >=6 && nome.length >= 1) {
   
    continueButton.disabled = false;
    continueButton.style.backgroundColor = "#49DA1F"
    continueButton.style.color = "white"
    continueButton.addEventListener("click", 
      ()=> {
        continueButton.style.display = 'none';
        instaling2.style.display = 'block';
        instaling2.style.backgroundColor = 'rgb(73, 218, 31)';
        instaling2.style.disabled = true;
      })

  }else {
    continueButton.disabled = true;
    continueButton.style.backgroundColor = "#f0f0f0"
    continueButton.style.color = "#424242"
  }

});

document.getElementById("password").addEventListener("keyup", function(){
  var nome = document.getElementById('name').value;
  var usuario = document.getElementById('email').value;
  var senha = document.getElementById('password').value;
  var continueButton = document.getElementById("continue-button");
  var instaling2 = document.getElementById("instaling2");
  if (usuario.length >=10 && senha.length >=6 && nome.length >= 1) {
   
    continueButton.disabled = false;
    continueButton.style.backgroundColor = "#49DA1F"
    continueButton.style.color = "white"
    continueButton.addEventListener("click", 
      ()=> {
        continueButton.style.display = 'none';
        instaling2.style.display = 'block';
        instaling2.style.backgroundColor = 'rgb(73, 218, 31)';
        instaling2.style.disabled = true;
      })

  }else {
    continueButton.disabled = true;
    continueButton.style.backgroundColor = "#f0f0f0"
    continueButton.style.color = "#424242"

  }

});

document.getElementById("email").addEventListener("keyup", function(){
  var nome = document.getElementById('name').value;
  var usuario = document.getElementById('email').value;
  var senha = document.getElementById('password').value;
  var continueButton = document.getElementById("continue-button");
  var instaling2 = document.getElementById("instaling2");
  if (usuario.length >=10 && senha.length >=6 && nome.length >= 1) {
    
    continueButton.disabled = false;
    continueButton.style.backgroundColor = "#49DA1F"
    continueButton.style.color = "white"
    continueButton.addEventListener("click", 
      ()=> {
        continueButton.style.display = 'none';
        instaling2.style.display = 'block';
        instaling2.style.backgroundColor = 'rgb(73, 218, 31)';
        instaling2.style.disabled = true;
      })

  }else {
    continueButton.disabled = true;
    continueButton.style.backgroundColor = "#f0f0f0"
    continueButton.style.color = "#424242"

  }

});


//Get params to errors
const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('error');
if (myParam) {
  setTimeout(()=>{
     document.querySelector('.error-message').style.bottom = '-80px'
  }, 3000)
}


