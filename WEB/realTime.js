//Partie 1 : main
setInterval(classement(),30000);

//***************************************

function next()
{

}

function fetchapi()
{
    var url = "request.php";
    var req = new Request(url);

    //Target req then execute local function next()
    fetch(req).then(next());
}

function classement()
{

}

