
// variables para usar despues en el seteo de la fecha de expiracion de las cookies
var now = new Date();
var time = now.getTime();
time += 3600 * 1000;
now.setTime(time);

// chequea si la cookie theme esta seteada
if (document.cookie.length != 0)
{
  var cookiesArray = document.cookie.split("; ");
  for (var i = 0; i < cookiesArray.length; i++)
  {
    var nameValueArray = cookiesArray[i].split("=");
    if (nameValueArray[0] == "theme")
    {
      if (nameValueArray[1] == "navidad")
      {
        document.getElementById('theme').href = 'css/paletaColoresNavidad.css';
      }
    }
  }
}
