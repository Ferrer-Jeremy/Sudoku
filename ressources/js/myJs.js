function envoiAjax()
{
	var textArea = document.getElementById('input').value;

	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            var html = this.responseText;
            var html ="";

            var json_reponse = JSON.parse(this.responseText);

            html += "<table class='table table-bordered'>"+
                        "<tbody>";;

            for(var i = 0; i < json_reponse.length; i++)
            {
                html += "<tr>";

                for(var y = 0; y < json_reponse[i].length; y++)
                {
                    html += "<td>"+
                            json_reponse[i][y]+
                            "</td>";
                }

                html += "</tr>";
            }

            html += "</tbody>"+
                    "</table>";

            document.getElementById("results").innerHTML = html;
        }
    };


    xhttp.open("POST", "controleur.php",true);
    xhttp.setRequestHeader("content-Type", "application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-Requested-With","XMLHttpRequest");
    xhttp.send("textArea="+textArea);
}