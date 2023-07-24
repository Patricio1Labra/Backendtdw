# Evaluación 3
Nombre: Patricio Labra Medina

Carrera: Ingeniería Civil Informática

API guardar preferencias: http://localhost:8000/api/perros/agregar/{perro}

POST http://localhost:8000/api/perros/agregar/1
Content-Type: application/json

{
  "perro_candidato_id": 4,
  "preferencia": "aceptado"
}

POST http://localhost:8000/api/perros/agregar/1
Content-Type: application/json

{
  "perro_candidato_id": 2,
  "preferencia": "aceptado"
}

API ver preferencias http://localhost:8000/api/perros/{perro}
