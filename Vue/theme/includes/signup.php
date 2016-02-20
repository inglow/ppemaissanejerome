  <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create a new account...</h4>
                </div>
                <div class="modal-body">
                    <script type="text/javascript" src="Vue/ajax/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#mdp1").bind("mouseover mouseout click keyup mouseenter",function(){
var mdp=$('#mdp1').val();

var mdplength = $('#mdp1').val().length;


$.ajax({
type: "POST",
  
   success: function(){ // si l'appel a bien fonctionné
          if(mdplength<6)
            {
          $("#mdp2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 6 charactère minimum!</font>");
          
        }else
          {
          $("#mdp2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Mot de passe validé!</font>");
          
        }
        
       }
       });});});
$(document).ready(function(){
  $("#pseudo1").bind("mouseover mouseout click keyup mouseenter",function(){
var pseudo=$('#pseudo1').val();

var pseudolength = $('#pseudo1').val().length;


$.ajax({
type: "POST",
data: "pseudo="+$("#pseudo1").val(), // données à transmettre
  url: "Vue/ajax/ajax.pseudo.php", 
   success: function(msg){ // si l'appel a bien fonctionné
          if(pseudolength<6)
            {
          $("#pseudo2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 6 charactère minimum!</font>");
          
        }else
          {
          $("#pseudo2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Pseudo validé!</font>");
          
        }
        if(msg==0 || pseudolength<6) // si la connexion en php a fonctionnée
        {
          if(msg==0)
          {
                  $("#pseudo2").html("<font color=\"red\"> Pseudo déja existant sur le site</font>");
              
          // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
          } 
          else // si la connexion en php n'a pas fonctionnée
        {
          $("#pseudo2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 6 charactère minimum!");
          

          // on affiche un message d'erreur dans le span prévu à cet effet
        }
        }
        else
        {
          $("#pseudo2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Pseudo validé!</font>");
                

        }
        
     }
       });});});
$(document).ready(function(){
  $("#email").bind("mouseover mouseout click keyup mouseenter",function(){
var email=$('#email').val();

var emaillength = $('#email').val().length;


$.ajax({
type: "POST",
data: "email="+$("#email").val(), // données à transmettre
  url: "Vue/ajax/ajax.email.php", 
   success: function(msg){ // si l'appel a bien fonctionné
        
        if(msg==0) // si la connexion en php a fonctionnée
        {
          $("#email2").html("<img src=\"Vue/ajax/refusee.jpg\"><font color=\"red\"> Email déja existante sur le site</font>");
          // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
        }
      
        else // si la connexion en php n'a pas fonctionnée
        {
          $("#email2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Email inexistante sur le site!</font>");
          // on affiche un message d'erreur dans le span prévu à cet effet
        }
     }
       });});});

$(document).ready(function(){
  $("#nomp").bind("mouseover mouseout click keyup mouseenter",function(){
var nomp=$('#nomp').val();

var nomplength = $('#nomp').val().length;


$.ajax({
type: "POST",
  
   success: function(){ // si l'appel a bien fonctionné
          if(nomplength<3)
            {
          $("#nomp2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 3 charactère minimum!</font>");
          
        }else
          {
          $("#nomp2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Nom validé!</font>");
          
        }
        
       }
       });});
});
$(document).ready(function(){
  $("#prenomp").bind("mouseover mouseout click keyup mouseenter",function(){
var prenomp=$('#prenomp').val();

var prenomplength = $('#prenomp').val().length;


$.ajax({
type: "POST",
  
   success: function(){ // si l'appel a bien fonctionné
          if(prenomplength<3)
            {
          $("#prenomp2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 3 charactère minimum!</font>");
          
        }else
          {
          $("#prenomp2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> prenom validé! </font>");
          
        }
        
       }
       });});
});
$(document).ready(function(){
  $("#telephone").bind("mouseover mouseout click keyup mouseenter",function(){
var telephone=$('#telephone').val();

var telephonelength = $('#telephone').val().length;


$.ajax({
type: "POST",
  
   success: function(){ // si l'appel a bien fonctionné
          if(isNaN(telephone) || telephonelength!=10)
            {
          $("#telephone2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 10 chiffres requis</font>");
          
        }else
          {
          $("#telephone2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Téléphone accepté!</font>");
          
        }
        
       }
       });});
});
$(document).ready(function(){
  $("#cp").bind("mouseover mouseout click keyup mouseenter",function(){
var cp=$('#cp').val();

var cplength = $('#cp').val().length;


$.ajax({
type: "POST",
  
   success: function(){ // si l'appel a bien fonctionné
          if(isNaN(cp) || cplength!=5)
            {
          $("#cp2").html("<img src=\"Vue/ajax/refusee.jpg\"> <font color=\"red\"> 5 chiffres requis</font>");
          
        }else
          {
          $("#cp2").html("<img src=\"Vue/ajax/validee.png\"> <font color=\"green\"> Code Postal Validée!</font>");
          
        }
        
       }
       });});
});
$(document).ready( function () { 
  $("#mdp1, #email, #nom, #prenom, #telephone, #pseudo1").bind("mouseover mouseout click keyup mouseenter", function() {  // à la soumission du formulaire             
    $.ajax({ // fonction permettant de faire de l'ajax
       type: "POST", // methode de transmission des données au fichier php
       url: "Vue/ajax/ajax.inscription.php", // url du fichier php
       data: "pseudo="+$("#pseudo1").val()+"&mdp="+$("#mdp1").val()+"&email="+$("#email").val()+"&nomp="+$("#nomp").val()+"&prenomp="+$("#prenomp").val()+"&telephone="+$("#telephone").val()+"&cp="+$("#cp").val(), // données à transmettre
       success: function(msg){ // si l'appel a bien fonctionné
        if(msg==0) // si la connexion en php a fonctionnée
        {
          $("#erreur").html("<span id=\"confirmMsg\">Vous pouvez maintenant appuyer sur valider ");
                  $("#submit").show();

          $("#erreur").css({"background-color": "green" ,"padding-top":"2%","padding-bottom":"2%","border":"10px","border-color":"white" ,"text-align":"center", "border-style":"dashed", "font-size":"200%", "color":"white"});
          // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
        }
        else // si la connexion en php n'a pas fonctionnée
        {
          $("#erreur").css({"background-color": "red" ,"padding-top":"2%","padding-bottom":"2%","border":"10px","border-color":"white" ,"text-align":"center", "border-style":"dashed", "font-size":"200%", "color":"white"});
          $("#erreur").html("Veuillez respecter les indications présent ci-dessus en rouge!<br>et aussi les champs obligatoires pour valider");
                  $("#submit").hide();

          // on affiche un message d'erreur dans le span prévu à cet effet
        }
       }
    });
    return false; // permet de rester sur la même page à la soumission du formulaire
  });
});

</script>
</head>

<body>

<h2>Inscription</h2>
<form method="post" action="index.php?action=sinscrire" id="form2">

*pseudo:<input type="text" name="pseudo1" id="pseudo1" placeholder="Votre pseudo" class="form-control" required/><label id="pseudo2"></label><br>
*mdp: <input type="password" name="mdp1" id="mdp1" placeholder="Votre mot de passe" class="form-control" required/><label id="mdp2"></label><br>
*nom:<input type="nomp" name="nomp" id="nomp" placeholder="Votre nom" class="form-control" required/><label id="nomp2"></label><br>
*Votre prenom:  <input id="prenomp" name="prenomp" type="text" placeholder="Votre prenom" class="form-control"required><label id="prenomp2"></label><br/>
*Votre email:  <input id="email" name="email" type="email" placeholder="Votre email" class="form-control" required><label id="email2"></label><br/>
Votre adresse:  <input id="adresse" name="adresse" type="text" placeholder="Votre adresse" class="form-control"><label id="adresse2"></label><br/>
*Votre code postal:  <input id="cp" name="cp" type="text" placeholder="Votre Code postal" class="form-control"required><label id="cp2"></label><br/>
*Votre téléphone:  <input id="telephone" name="telephone" type="text" placeholder="Votre téléphone" class="form-control" required><label id="telephone2"></label><br>Pour vous joindre juste en cas de non-présence au rendez-vous<br/>
Votre avatar ou photos:  <input id="avatar" name="avatar" type="text" placeholder="Votre avatar" class="form-control"><br/>
Les champs obligatoire sont marqués avec une étoile.
<br>
<div id="erreur"></div>
<input type="reset" id="annuler" name="Annuler"class="btn btn-purity btn-lg" />
<input type="submit" id="submit" name="Inscription" class="btn btn-purity btn-lg" />
</form>
                </div>
              
            </div>
        </div>
    </div>