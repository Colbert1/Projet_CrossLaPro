
function getClassement() {
    const table = document.getElementById('tab');

    fetch('API/request.php')
        .then((resp) => {
            document.createElement('tr');
            document.innerHTML = "<td>" + resp['ds_num'] + "</td>";
            /*row.createElement('td').textContent = resp['ds_num'];
            row.createElement('td').textContent = resp['us_nom'];
            row.createElement('td').textContent = resp['us_prenom'];
            row.createElement('td').textContent = resp['cl_nom'];
            row.createElement('td').textContent = resp['ts_temps'];*/
        }).catch(function (error) {
            console.log(error);
        });
}

setInterval(getClassement(), 5000);