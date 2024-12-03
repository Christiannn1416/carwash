import requests

url = "http://localhost/carwash/admin/servicio.api.php?"

payload = {}
files=[

]
headers = {
  'Cookie': 'PHPSESSID=66cou6qf1gca1le4espeggmuk0'
}

response = requests.request("GET", url, headers=headers, data=payload, files=files)

print(response.text)
