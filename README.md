# biblioweb-cedric

1. La session demarre en $_SESSION['statut'] = 'unknown'
2. apres sign-in l'utilisateur est en $_SESSION['statut'] = 'novice'. cela permet d'afficher un message d'accueil et une photo de bienvenue
3. L'enregistrement db se mets en $_SESSION['statut'] = 'membre'
4. Après déco reco il aura donc le statut de $_SESSION['statut'] = 'membre'


un user NOVICE peut voir la liste des livres, voir le détail d'un livre.

un user MEMBRE peut voir la liste des livres, voir le détail d'un livre, louer un livre (à implémenter). 

un user ADMIN peut voir la liste des livres, voir le détail d'un livre, louer un livre (à implémenter), ajouter des auteurs, promote ou retrograde un user, gerer les locations(à implémenter), ajouter livre(à corriger), effacer livre (à corriger).
