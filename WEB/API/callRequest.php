<script>
    function getClassement() {
        fetch('API/callRequest.php').then((resp) => resp.json()).then(function(data) {
            //data : réponse http de l'api
            console.log(data);

            //Récupérer element + innerhtml
            var tab = document.getElementById('affiche');
            tab.innerHTML = data;
        }).catch(function(error) {
            console.log(error);
        });
    }
</script>