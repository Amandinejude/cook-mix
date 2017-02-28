$(document).on('ready', function () {

	$("#loginForm").submit(function(event){ // Formulaire login
		event.preventDefault(); 
		$.ajax({

			url : $(this).attr('action'),
			type : 'POST',
			dataType : 'json',
			data:$(this).serialize(),

			success : function(reponse){

				if(reponse.hasOwnProperty('user')) {
					$('#signIn').modal('hide');
					location.reload(true); // Rafraichie la page
				}

				else {
					document.getElementById("signInModalAlertMsg").classList.remove('hide');  // Supprime la class hideen
					document.getElementById("signInModalAlertMsg").classList.add('alert-'+reponse.type); //  Ajoute la classe pour l'alert
					document.getElementById("signInModalAlertMsg").innerHTML = reponse.msg;   // Affiche le message d'erreur
				}
		  
			},

			error : function(reponse, statut, erreur){ // En cas d'error (code error 404)
			},

			complete : function(reponse, statut){ // fonction qui s'execute une fois le success ou error. 
			}
		}); // FIN REQUETE AJAX LOGIN
	}); // FIN SUBMIT LOGIN


	$("#signupForm").submit(function(event){ // Formulaire inscription
		event.preventDefault();
		$.ajax({

			url : $(this).attr('action'), // Url enregistrer dans le formulaire
			type : 'POST', // Methode d'envoi de l'action
			dataType : 'json', //type de reponse attendue
			data:$(this).serialize(), //data récuperees depuis le formulaire

			success : function(reponse){

				if(reponse.type=='success') {
					$('#signUp').modal('hide');
					
					location.reload(true);
		
				}

				else {
					document.getElementById("signUpModalAlertMsg").classList.remove('hide');
					document.getElementById("signUpModalAlertMsg").classList.add('alert-'+reponse.type);
					document.getElementById("signUpModalAlertMsg").innerHTML = reponse.msg;   
				}
			},

			error : function(reponse, statut, erreur){
			},

			complete : function(reponse, statut){
			}
		}); // FIN REQUETE AJAX LOGIN
	}); // FIN SUBMIT LOGIN
	
	
	var theCookie = document.cookie.split(';'); // recupere les cookies stockés / .slipt les séparer et les mets en tableau 
	if (theCookie.indexOf("visited=true") == -1) { // si cookie visited = true
		var fifteenDays = 1000*60*60*24*15; // délais du cookie
		var expires = new Date((new Date()).valueOf() + fifteenDays); //date d'expiration du cookie
		document.cookie = "visited=true;expires=" + expires.toUTCString(); //enregistre le cookie
		$("#myModal").modal('show'); // ouvrir la modal
	}
	
	
	
	$('#recherche').autocomplete({ // appelé a chaque fois q'un caractere est ecrit dans la barre de recherche
		source: function( request, response ) {
			var type = "places"; // initialise une place par defaut
			$.each($(".filter"), function(val) { //boucle sur la class filter
				if($(this).hasClass("active")) // check si la class active est utilisée :
					type = $(this).attr("id") //  -> recupere l'id  place ou recipe
			});
			if(type == "places"){ //places
				$.ajax({
					url: "http://localhost/cook-mix/public/admin/places", // l'url
					dataType: "jsonp", //type de datas
					data: {
						nom: request.term, // l'input
						search: type //le type (places ou recipes)
					},
					complete : function(reponse, statut, erreur){
						var obj = JSON.parse(reponse.responseText); // converti  le json en objet
						$("#portfoliolist").html(""); // on vide le portfolio
						$.each( obj, function( val) { // boucle des elements pour les ajouter au portfolio avec .append
							$("#portfoliolist").append("<div class='portfolio web placeId' data-cat='web' href='#portfolioModa"+obj[val].pl_id+"' data-toggle='modal' id='"+obj[val].pl_id+"' style='display: block;'> 	<div class='portfolio-wrapper'> 	   <!--Ici j'insere mes requetes et je pointe vers le dossier miniatures pour afficher les qui correspondent au résultat de cafés qui s'affiche. --> 		<img src='/cook-mix/public/assets/"+obj[val].pl_picture+"' alt=''> 		<div class='caption'> 			<div class='caption-text'> 			   <!-- Ici j'insere mes requetes pour afficher le nom et l'adresse du café. --> 				<a class='text-title'>"+obj[val].pl_name+"</a> 				<span class='text-category'>"+obj[val].pl_instagram+"</span> 			</div> 			<div class='caption-bg'></div> 		</div> 	</div> </div>");
						});
					}
				});
			}else{ // recipes
				$.ajax({
					url: "http://localhost/cook-mix/public/selectPlace2", // l'url
					dataType: "jsonp", //type de datas
					data: {
						nom: request.term, // l'input
						search: type 
					},
					complete : function(reponse, statut, erreur){
						var obj = JSON.parse(reponse.responseText); // converti  le json en objet
						$("#portfoliolist").html(""); // on vide le portfolio
						$.each( obj, function( val) { // boucle des elements pour les ajouter au portfolio avec .append
							$("#portfoliolist").append("<div class='portfolio web placeId' data-cat='web' href='#portfolioModa"+obj[val].pl_id+"' data-toggle='modal' id='"+obj[val].pl_id+"' style='display: block;'> 	<div class='portfolio-wrapper'> 	   <!--Ici j'insere mes requetes et je pointe vers le dossier miniatures pour afficher les qui correspondent au résultat de cafés qui s'affiche. --> 		<img src='/cook-mix/public/assets/"+obj[val].pl_picture+"' alt=''> 		<div class='caption'> 			<div class='caption-text'> 			   <!-- Ici j'insere mes requetes pour afficher le nom et l'adresse du café. --> 				<a class='text-title'>"+obj[val].pl_name+"</a> 				<span class='text-category'>"+obj[val].pl_instagram+"</span> 			</div> 			<div class='caption-bg'></div> 		</div> 	</div> </div>");
						});
					}
				});
			}
		},
		minLength: 0 // minimum de caractere pour la recherche
	});	
});