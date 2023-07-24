# Evaluación 3
Nombre: Patricio Labra Medina

Carrera: Ingeniería Civil Informática

API guardar preferencias: http://localhost:8000/api/perros/agregar/{perro}
```json
{
  "perro_candidato_id": 4,
  "preferencia": "aceptado"
}
```
```json
{
  "perro_candidato_id": 3,
  "preferencia": "rechazado"
}
```
API ver preferencias http://localhost:8000/api/perros/{perro}

```json
{
   "aceptados":[
      {
         "id":1,
         "perro_interesado_id":1,
         "perro_candidato_id":4,
         "preferencia":"aceptado",
         "created_at":"2022-12-10T12:34:50",
         "updated_at":"2022-12-10T12:34:50"
      }
   ],
   "rechazados":[
      
   ]
}
```
```json
{
   "aceptados":[
      
   ],
   "rechazados":[
      {
         "id":1,
         "perro_interesado_id":1,
         "perro_candidato_id":3,
         "preferencia":"rechazado",
         "created_at":"2022-12-10T12:35:05",
         "updated_at":"2022-12-10T12:35:05"
      }
   ]
}
```
