function processTags() {
  //console.log("click sur processTags");
  // L'index de la bonne option - 0 pour la premiere etc ... -
  let selectedIndex = document.getElementById("tags").selectedIndex;
  // La bonne option grace à l'index de l'option séléctionnée
  let selectedOption = document.getElementById("tags").options[selectedIndex];

  // On retire l'option

  document.getElementById("tags").removeChild(selectedOption);

  // on l ajoute au select de droite
  document.getElementById("tags-for-news").appendChild(selectedOption);

  // on désélectionne l'iption
  selectedOption.selected = false;
}
function processTags4News() {
  console.log("click sur processTagsForNews()");
  //l'option disparait de la liste de droite
  let selectedIndex = document.getElementById("tags-for-news").selectedIndex;
  // La bonne option grace à l'index de l'option séléctionnée
  let selectedOption = document.getElementById("tags-for-news").options[selectedIndex];

  // On retire l'option

  document.getElementById("tags-for-news").removeChild(selectedOption);

  // on l ajoute au select de droite
  document.getElementById("tags").appendChild(selectedOption);

  //   deselectionner
  selectedOption.selected = false;
}

function envoyer() {
  console.log("traitement final");
  // rendre selected la liste de droite
  //   document.getElementById("tags-for-news")
  for (
    let i = 0;
    i < document.getElementById("tags-for-news").options.length;
    i++
  ) {
    document.getElementById("tags-for-news").options[i].selected = true;
    // console.log(document.getElementById("tags-for-news").options[i]);
  }
  document.getElementById("zeForm").submit();
}
