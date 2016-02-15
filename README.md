![Newbie_logo](http://img11.hostingpics.net/pics/941980logotransparent.png)

# IMPORTANT
[TRELLO](https://trello.com/b/g2MpFDzA)

## Règles à suivre
> Pour travailler sur l'OS, vous devez en premier lieu, travailler avec le système d'exploitation `Windows` et avoir [WAMP](http://www.wampserver.com/) d'installé (ou un équivalent), ensuite vous devez suivre la partie `BDD`.

- Les seuls fichiers que vous avez le droit de modifier sont ceux du dossier `app`
  - Exception le fichier `package.json` qui est un fichier personnel (voir la partie `package.json` pour plus d'informations), vous pouvez donc le modifier à votre guise. En cas de problèmes, retéléchargez-le. Par contre, faites très attention à ne jamais `commit` ce fichier.
- Si vous voulez rajouter des images, faites-le dans le dossier `images` (à faire en cas de nécessité)
- Avant de faire des changements importants, demandez l'avis du groupe
- Respectez la syntaxe et si possible prenez le temps de commenter vos lignes de code

### BDD
1. Commencez par créer une base de données `newbie` dans phpmyadmin avec `utf8_unicode_ci` comme interclassement
2. [Téléchargez ce fichier](https://drive.google.com/open?id=0B9r0GJvYkipNYzhTa09fSXJMMU0)
3. Une fois le fichier téléchargé, allez dans votre base de données et cliquez sur `Importer`, puis choisissez le fichier `profil.sql` et faites `exécuter`
4. Vérifiez maintenant que votre mot de passe est vide (que vous n'avez pas de mot de passe)
5. Votre base de données est maintenant opérationnelle

> Votre base de données est personnelle, vous pouvez donc la modifier à votre guise. En cas de problèmes, vous pouvez la supprimer et refaire les étapes ci-dessus.

### Package.json
Ce fichier est celui qui gère la fenêtre de l'OS. Lors de la première ouverture, le code est le suivant :
```
{
  "name": "Newbie",
  "version": "0.2.0",
  "description": "Newbie OS",
  "main": "app/index.html",
  "window": {
    "toolbar": true,
    "fullscreen": false,
    "frame": true,
    "icon": "app/images/favicon.png"
  },
  "dependencies": {
    "mysql": "^2.10.2"
  }
}
```
Ce code n'est pas pratique pour travailler, car il enlève certains boutons utiles pour celui qui n'est pas là pour jouer.
Vous pouvez donc le remplacer par ce code :
```
{
  "name": "Newbie",
  "version": "0.2.0",
  "description": "Newbie OS",
  "main": "app/index.html",
  "window": {
    "toolbar": true,
    "fullscreen": false,
    "frame": true,
    "icon": "app/images/favicon.png",
    "width": `largeur de votre écran, ex:1920`,
    "height": `hauteur de votre écran, ex:1080`
  },
  "dependencies": {
    "mysql": "^2.10.2"
  }
}
```
> Ce fichier est personnel, vous pouvez donc le modifier à votre guise. En cas de problèmes, retéléchargez-le. Par contre, faites très attention à ne jamais `commit` ce fichier.

#### Contact
Si vous rencontrez un problème ou si vous avez des questions :
* Notre mail : `sambenuts.contact@gmail.com`
