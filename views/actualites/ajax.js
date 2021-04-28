// ajax_xml.js
//------------------------------------------------------
// function ajaxCallXml()
//------------------------------------------------------
document.getElementById("ajaxButt").addEventListener("click", ajaxCall);
let libelleTheme = document.getElementById("libelle_T");

function ajaxCall() {
  // console.log("hello")
  let libTheme = libelleTheme.value;
  console.log(libTheme);

  let xhr = new XMLHttpRequest();
  console.log(xhr);
  // fournisseur de service
  xhr.open("GET", 'services/serviceNewTheme.php?lib-theme='+libTheme); 
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.responseText;
      processResponse(data);
    }
  };
}

function processResponse(data){
    
  const listeThemes = JSON.parse(data);
  // console.log(listeThemes);
  
  // 'Vide' le select
  document.getElementById("theme").options.length = 0;
  
  listeThemes.forEach( (theme)=>{
      
      let option = document.createElement("option");
      option.value = theme.idTheme;
      option.label = theme.libelle;
      
      //var t = document.createTextNode(myArray[i].libelle); 
      //option.appendChild(t);
      
      document.getElementById("theme").appendChild(option);
      
  });

}

// on instantie un objet

//------------------------------------------------------
// function processResponse(data)
//------------------------------------------------------
// function processResponse(data) {
//   // document.getElementById("output").innerHTML = data; il affichera le type de data!

//   // Parsing XML avec JS
//   let listeImg = data.getElementsByTagName("image");
//   console.log(listeImg, "mes images");

//   //   On boucle
//   for (let i = 0; i < listeImg.length; i++) {
