// ajax_xml.js
//------------------------------------------------------
// function ajaxCallXml()
//------------------------------------------------------
document.getElementById("ajaxButt").addEventListener("click", ajaxCall);
let libelleTheme = document.getElementById("libelle_T");

function ajaxCall() {
  let libTheme = libelleTheme.value;
  console.log(libTheme);

  let xhr = new XMLHttpRequest();
  console.log(xhr);
  xhr.open("GET", "services/serviceNewTheme.php?lib-them=" + libTheme); // fournisseur de service
  xhr.send();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.responseText;
      console.log(data);
      processResponse(data);
    }
  };
}

function processResponse(data) {}
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
