const relatedGames = document.getElementById('relatedGames');
const gameId = document.getElementById('gameId').value;

fetch('/api/game/related/' + gameId)
    .then((response) => response.json())
    .then((gameList) => {
        relatedGames.innerHTML = "";
        for (const game of gameList) {
            relatedGames.innerHTML += '<div class="col-3 animate__animated animate__fadeIn"><h3>' + game.title + '</h3><img src="' + game.cover + '"></div>';
        }
    })