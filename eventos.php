<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div id="calendar">

                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          customButtons: {
            eventoButton: {
              text: 'Añadir evento',
              click: function() {
                window.location.href= "eventoAdd.php";
              }
            }
          },  
          headerToolbar: { left: 'dayGridMonth,timeGridWeek, eventoButton', center: 'title'},
          locale: 'es',
          buttonText: { 
            today: 'Hoy',
            week: 'Semana',
            month: 'Mes'
          },
          
          events: function(info, successCallback, failureCallback){
            fetch('datos.php')
            .then(respuesta=>respuesta.json())
            .then(function(eventos){
                var events=[];
                eventos.forEach(function(evento){
                    // console.log(evento);
                events.push({
                    id: evento.idEvento,
                    title: evento.tituloEvento,
                    start: evento.inicioEvento,
                    end: evento.finEvento,
                    color: evento.color,
                    description: evento.descripcion,
                    allDay: true
                });
            
                });
                successCallback(events);
                })
            .catch((error) => {
                failureCallback(error);
            })
      
            
          },
          eventClick: function(info){
            // alert(info.event.extendedProps.description);
            // Swal.fire(
            //     info.event.title,
            //     info.event.extendedProps.description,
            //     'success'
            // )
            Swal.fire({
              id: info.event.id,
              title: info.event.title,
              showDenyButton: true,
              showCancelButton: true,
              cancelButtonText: 'Cancelar',
              denyButtonText: 'Editar',
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
              } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
                window.location.href= "eventoUpdate.php?id?="+info.event.id; 
              }
            })
          },
          
        });
        calendar.render();
      });

    </script>

</body>
</html>