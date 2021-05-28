function participant(data){


}

function getClassement() {
    const table = $('#tab');

    $(document).ready( function () {
        table.DataTable({
            paging:false,
            scrollY:400
        });
    } );

    table.column("clRang").render()

    fetch('API/request.php')
        .then(resp => {
            resp.json().then(data => {
                console.log(data);
                console.log(data.length);

                let value = new Array(data.length);
                for(let i=0;i<data.length;i++){
                    for(let j=0;j<6;j++){
                        value[i][j] = data[j];
                        console.log(data[j]);
                        console.log(value[i][j]);
                    }
                }
            });
        }).catch(function (error) {
            console.log(error);
        });
}

setInterval(getClassement(), 5000);

