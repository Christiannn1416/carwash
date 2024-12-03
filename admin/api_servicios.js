const myHeaders = new Headers();
myHeaders.append("Cookie", "PHPSESSID=66cou6qf1gca1le4espeggmuk0");

const formdata = new FormData();
formdata.append("servicio", "cambio");
formdata.append("descripcion", "servicio cambio");
formdata.append("precio", "1");

const requestOptions = {
  method: "GET",
  headers: myHeaders,
  body: formdata,
  redirect: "follow",
};

fetch("http://localhost/carwash/admin/servicio.api.php?", requestOptions)
  .then((response) => response.text())
  .then((result) => console.log(result))
  .catch((error) => console.error(error));
