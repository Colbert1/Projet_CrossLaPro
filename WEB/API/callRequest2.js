function showTab(jsonObj) {
    const participants = jsonObj['ds_num'];
    const table = document.getElementById('tab');

    for (let i = 0; i < participants.length; i++) {
        const row = document.createElement('tr');
        const cellRank = document.createElement('td');
        const cellName = document.createElement('td');
        const cellSurname = document.createElement('td');
        const cellGrade = document.createElement('td');
        const cellTime= document.createElement('td');
        
        cellRank.textContent = participants[i].rank;
        cellName.textContent = participants[i].us_nom;
        cellSurname.textContent = participants[i].us_prenom;
        cellGrade.textContent = participants[i].cl_nom;
        cellTime.textContent = participants[i].ts_temps;
  
      const superPowers = participants[i].powers;
      for (let j = 0; j < superPowers.length; j++) {
        const listItem = document.createElement('li');
        listItem.textContent = superPowers[j];
        myList.appendChild(listItem);
      }
        row.appendChild(cellRank);
        row.appendChild(cellName);
        row.appendChild(cellSurname);
        row.appendChild(cellGrade);
        row.appendChild(cellTime);

        table.appendChild(row);
    }
}

function getClassement(){
    const url = "./API/request.php";
    const req = new XMLHttpRequest();

    req.open('GET',url);
    req.responseType = 'json';
    req.send();

    req.onload = function() {
        const classement = req.response;
        showTab(classement);
    }
}

setInterval(getClassement(), 5000);