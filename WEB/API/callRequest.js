function showTab(classement) 
{
    // const participants = jsonObj['ds_num'];
    const table = document.getElementById('tab');
    table.innerHTML = ""
   
    for (let i = 0; i < classement.length; i++) {
        const row = document.createElement('tr');

        row.className = 'border-b border-blue-200 border-opacity-50 ' + ((i%2)?'bg-gray-100':'') ;

        const cellRank = document.createElement('td');
        const cellDossard = document.createElement('td');
        const cellName = document.createElement('td');
        const cellSurname = document.createElement('td');
        const cellGrade = document.createElement('td');
        const cellTime= document.createElement('td');
        
        cellRank.className = 'border-l text-center'
        cellDossard.className = 'text-center'
        cellName.className = 'text-center'
        cellSurname.className = 'text-center'
        cellGrade.className = 'text-center'
        cellTime.className = 'border-r text-right font-mono'

        cellRank.textContent = '#' + (i + 1);
        cellDossard.textContent = classement[i].ds_num;
        cellName.textContent = classement[i].us_nom;
        cellSurname.textContent = classement[i].us_prenom;
        cellGrade.textContent = classement[i].cl_nom;
        cellTime.textContent = classement[i].ts_temps_total;
  
        row.appendChild(cellRank);
        row.appendChild(cellName);
        row.appendChild(cellSurname);
        row.appendChild(cellGrade);
        row.appendChild(cellTime);

        table.appendChild(row);
    }
}

function getHistorique()
{
    const url = "./API/request.php";
    const req = new XMLHttpRequest();
    const getUrl = document.URL;

    const formData = new FormData();
    let tab = getUrl.split("=");
    let data;

    formData.set("course", tab[1]);
    data = formData.get("course");

    req.open('POST',url);
    req.responseType = 'json';
    req.send(data);

    req.onload = function() {
        const classement = (req.response);
        showTab(classement);
        setTimeout(() => getHistorique(), 5000)
    }
}

getHistorique()


