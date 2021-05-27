function getClassement() {
    const table = document.querySelector('table');

    fetch('API/request.php')
        .then(resp => {
            resp.json().then(data => {
                console.log(data);
                console.log(data.length);
                for(let i=0;i<data.length;i++){
                    for(let j=0;j<6;j++){
                        let value = data[i][j];
                    }
                }
            });
        }).catch(function (error) {
            console.log(error);
        });
}

setInterval(getClassement(), 5000);

