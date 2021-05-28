
function getClassement() {
    fetch('API/request.php')
        .then(resp => {
            resp.json().then(data => {
                const json = JSON.parse(data);
                for(r=0;r<data.length;r++){
                    let row = document.createElement("TR");
                    for(c=0;c<5;c++){
                        let cell = row.createElement("TD");    
                        cell.innerHTML = json[c];
                        //console.log(data[c]);
                    }                   
                }                
                console.log(data);
            });
        }).catch(function (error) {
            console.log(error);
        });
}

setInterval(getClassement(), 5000);

