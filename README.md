# GitHub Activity CLI

Este es un proyecto de línea de comandos desarrollado con **Laravel** y **PHP** que permite obtener y mostrar la actividad reciente de un usuario de GitHub directamente desde la terminal.

## 🔗 Enlace al reto original

👉 [Github User Activity en roadmap.sh](https://roadmap.sh/projects/github-user-activity)

## 🧠 Descripción

Esta aplicación CLI acepta un nombre de usuario de GitHub como argumento, consulta la API de GitHub para obtener su actividad reciente y la muestra de forma legible por consola. Es una excelente práctica para trabajar con APIs, manipular datos JSON y crear interfaces de línea de comandos.

## 🛠️ Uso

Ejecuta el comando desde tu terminal:

```bash
php artisan github-activity <username>
```

Por ejemplo:

```bash
php artisan github-activity luishidalgoo27
```

### 💡 Resultado esperado

```
- luishidalgoo27 created luishidalgoo27/GitHub-User-Activity at 2025-06-15T19:47:36Z
- luishidalgoo27 created luishidalgoo27/GitHub-User-Activity at 2025-06-15T19:47:31Z
- luishidalgoo27 looked at luishidalgoo27/wepayit at 2025-06-13T12:25:37Z
- luishidalgoo27 Update README.md push in luishidalgoo27/RoadMap---Task-Tracker at 2025-06-13T12:25:17Z
- luishidalgoo27 looked at luishidalgoo27/Rastreador-de-tareas at 2025-06-13T12:21:07Z
- luishidalgoo27 created luishidalgoo27/Rastreador-de-tareas at 2025-06-13T12:21:02Z
- luishidalgoo27 created luishidalgoo27/Rastreador-de-tareas at 2025-06-13T12:20:59Z
- luishidalgoo27 Update README.md push in luishidalgoo27/BingoHidalgo at 2025-06-12T17:14:18Z
- luishidalgoo27 readme push in luishidalgoo27/BingoHidalgo at 2025-06-12T17:03:00Z
- luishidalgoo27 created luishidalgoo27/PROYECTO-BINGO at 2025-06-12T16:55:45Z
...
```

## 🔍 Características

- Consulta la API pública de GitHub:  
  `https://api.github.com/users/<username>/events`

- Muestra acciones como:
  - Pushes
  - Issues
  - Stars
  - Forks
  - Pull requests, entre otros.

- Manejo de errores: nombres de usuario inválidos o problemas de conexión son manejados con mensajes claros.

## ❌ Limitaciones

- No utiliza librerías externas para hacer peticiones HTTP (usa `file_get_contents` o `cURL` nativo).
- La actividad se obtiene en tiempo real, sin caché.

## ✨ Ideas para mejoras

- Filtrar por tipo de evento (issues, push, etc).
- Mejorar el formato de salida (por ejemplo, usar colores).
- Implementar sistema de caché para evitar llamadas repetidas.
- Mostrar detalles adicionales de cada evento.

## 📄 Licencia

Este proyecto está bajo la licencia [MIT](LICENSE).
