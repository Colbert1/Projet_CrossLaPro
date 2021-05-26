<script>
    function getClassement() {
        const table = document.querySelector('table'); 
        fetch('API/request.php')
            .then((resp) => resp.json())
            .then(resp => {
                const row = document.createElement('tr');
                row.createElement('td').textContent = resp['ds_num'];
                row.createElement('td').textContent = resp['']
            }).catch(function(error) {
                console.log(error);
            });
    }

    setInterval(getClassement(),5000);
</script>