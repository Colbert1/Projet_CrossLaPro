function getClassement() {
    const table = document.querySelector('table');

    fetch('API/request.php')
        .then(resp => {
            resp.json().then(data => {
                console.log(data);
            });
            const jsonTab = JSON.parse(resp.responseText);
            document.getElementById('tab').innerHTML = jsonTab;
        }).catch(function (error) {
            console.log(error);
        });
}


setInterval(getClassement(), 5000);

