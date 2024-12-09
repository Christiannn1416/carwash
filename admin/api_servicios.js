const myHeaders = new Headers();
myHeaders.append("Cookie", "PHPSESSID=7tovjq6do0h7n96dl7h4skcmcd");

const formdata = new FormData();

const requestOptions = {
  method: "GET",
  headers: myHeaders,
  redirect: "follow",
};

fetch("http://localhost/carwash/admin/servicio.api.php", requestOptions)
  .then((response) => response.text())
  .then((result) => console.log(result))
  .catch((error) => console.error(error));
