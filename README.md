# biblioweb-cedric

1. La session demarre en $_SESSION['statut'] = 'unknown'
2. apres sign-in l'utilisateur est en $_SESSION['statut'] = 'novice'. cela permet d'afficher un message d'accueil et une photo de bienvenue
3. L'enregistrement db se mets en $_SESSION['statut'] = 'membre'
4. Après déco reco il aura donc le statut de $_SESSION['statut'] = 'membre'
