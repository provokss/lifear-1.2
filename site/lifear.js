/* debut 1er popup */
function openForm() {
  document.getElementById("popupForm").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}
//fin 1er popup
//debut 2em popup
function openConfirmation(userId) {
  var confirmationPopup = document.querySelector("#confirmation-" + userId);
  if (confirmationPopup) {
    confirmationPopup.style.display = "block";
  }
}
function closeConfirmation(userId) {
  var confirmationPopup = document.querySelector("#confirmation-" + userId);
  if (confirmationPopup) {
    confirmationPopup.style.display = "none";
  }
}
// fonction pour soumettre le formulaire d'ajout d'utilisateur
function addUser() {
  document.querySelector("form").submit();
}
//fin 2em popup
//debut 3em popup
function OpenConfirmation() {
  var confirmationPopup = document.getElementById("confirmation-popup");
  if (confirmationPopup) {
    confirmationPopup.style.display = "block";
  }
}
function CloseConfirmation() {
  var confirmationPopup = document.querySelector("#confirmation-popup");
  if (confirmationPopup) {
    confirmationPopup.style.display = "none";
}
}
// fin 3em popup
// Pour le span cacher

window.onload = function() {
  document.getElementById('fileInput').addEventListener('change', function() {
      
      // Récupérer l'élément img
      var imagePreview = document.getElementById('imagePreview');
      
      // Créer un objet FileReader
      var reader = new FileReader();
      
      // Définir ce qui se passe une fois que le fichier est chargé
      reader.onload = function(event) {
          imagePreview.src = event.target.result;
      }
      
      // Lire le fichier
      reader.readAsDataURL(this.files[0]);
  });
}
