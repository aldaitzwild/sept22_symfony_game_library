const relatedGames = document.getElementById('relatedGames');
const gameId = document.getElementById('gameId').value;

fetch('/api/game/related/' + gameId)
    .then((response) => response.json())
    .then((gameList) => {
        for (const game of gameList) {
            relatedGames.innerHTML += '<div><h3>' + game.title + '</h3><img src="' + game.cover + '"></div>';
        }
    })