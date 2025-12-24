document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');

    if (!calendarEl) {
      return;
    }

    var eventsUrl = calendarEl.dataset.eventsUrl || '';
    var selectedClubId = calendarEl.dataset.clubId || '';

    if (containerEl) {
      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText
          };
        }
      });
    }

    var modalEl = document.getElementById('calendar-event-modal');
    var modal = modalEl && window.bootstrap ? new bootstrap.Modal(modalEl) : null;
    var form = document.getElementById('calendar-event-form');
    var errorEl = document.getElementById('calendar-event-error');
    var addButton = document.getElementById('calendar-add-event');
    var deleteButton = document.getElementById('calendar-event-delete');
    var saveButton = document.getElementById('calendar-event-save');

    function formatDateLocal(date) {
      if (!date) {
        return '';
      }
      var pad = function(value) {
        return String(value).padStart(2, '0');
      };
      return date.getFullYear() + '-' + pad(date.getMonth() + 1) + '-' + pad(date.getDate()) +
        'T' + pad(date.getHours()) + ':' + pad(date.getMinutes());
    }

    function setError(message) {
      if (!errorEl) {
        return;
      }
      if (!message) {
        errorEl.classList.add('d-none');
        errorEl.textContent = '';
        return;
      }
      errorEl.classList.remove('d-none');
      errorEl.textContent = message;
    }

    function populateForm(data) {
      if (!form) {
        return;
      }
      form.querySelector('#calendar-event-id').value = data.id || '';
      form.querySelector('#calendar-event-title').value = data.title || '';
      form.querySelector('#calendar-event-type').value = data.tipo || '';
      form.querySelector('#calendar-event-start').value = data.fecha_inicio || '';
      form.querySelector('#calendar-event-end').value = data.fecha_fin || '';
      form.querySelector('#calendar-event-location').value = data.sede || '';
      form.querySelector('#calendar-event-capacity').value = data.cupos || '';
      form.querySelector('#calendar-event-status').value = data.estado || 'programado';
      if (data.club_id) {
        form.querySelector('#calendar-event-club').value = data.club_id;
      }

      if (deleteButton) {
        if (data.id) {
          deleteButton.classList.remove('d-none');
        } else {
          deleteButton.classList.add('d-none');
        }
      }
    }

    function openModal(payload) {
      setError('');
      populateForm(payload);
      if (modal) {
        modal.show();
      }
    }

    async function sendRequest(payload) {
      var response = await fetch(eventsUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      });
      var data = await response.json();
      if (!response.ok || !data.ok) {
        throw new Error(data.message || 'No fue posible guardar los cambios.');
      }
      return data;
    }

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialView: 'dayGridMonth',
      navLinks: true,
      editable: true,
      droppable: false,
      dayMaxEvents: true,
      events: eventsUrl ? {
        url: eventsUrl,
        method: 'GET',
        extraParams: function() {
          return {
            club_id: selectedClubId
          };
        }
      } : [],
      dateClick: function(info) {
        var startDate = info.date;
        var endDate = new Date(startDate.getTime());
        endDate.setHours(endDate.getHours() + 1);
        openModal({
          id: '',
          title: '',
          tipo: '',
          fecha_inicio: formatDateLocal(startDate),
          fecha_fin: formatDateLocal(endDate),
          sede: '',
          cupos: '',
          estado: 'programado',
          club_id: selectedClubId || ''
        });
      },
      eventClick: function(info) {
        var event = info.event;
        openModal({
          id: event.id,
          title: event.title,
          tipo: event.extendedProps.tipo || '',
          fecha_inicio: formatDateLocal(event.start),
          fecha_fin: formatDateLocal(event.end || event.start),
          sede: event.extendedProps.sede || '',
          cupos: event.extendedProps.cupos || '',
          estado: event.extendedProps.estado || 'programado',
          club_id: event.extendedProps.club_id || ''
        });
      },
      eventDrop: function(info) {
        sendRequest({
          action: 'update',
          id: info.event.id,
          fecha_inicio: info.event.start,
          fecha_fin: info.event.end || info.event.start
        }).catch(function(error) {
          info.revert();
          setError(error.message);
        });
      },
      eventResize: function(info) {
        sendRequest({
          action: 'update',
          id: info.event.id,
          fecha_inicio: info.event.start,
          fecha_fin: info.event.end || info.event.start
        }).catch(function(error) {
          info.revert();
          setError(error.message);
        });
      }
    });

    calendar.render();

    if (addButton) {
      addButton.addEventListener('click', function() {
        openModal({
          id: '',
          title: '',
          tipo: '',
          fecha_inicio: '',
          fecha_fin: '',
          sede: '',
          cupos: '',
          estado: 'programado',
          club_id: selectedClubId || ''
        });
      });
    }

    if (saveButton && form) {
      saveButton.addEventListener('click', async function() {
        try {
          setError('');
          var payload = {
            action: form.querySelector('#calendar-event-id').value ? 'update' : 'create',
            id: form.querySelector('#calendar-event-id').value || undefined,
            club_id: form.querySelector('#calendar-event-club').value,
            titulo: form.querySelector('#calendar-event-title').value,
            tipo: form.querySelector('#calendar-event-type').value,
            fecha_inicio: form.querySelector('#calendar-event-start').value,
            fecha_fin: form.querySelector('#calendar-event-end').value,
            sede: form.querySelector('#calendar-event-location').value,
            cupos: form.querySelector('#calendar-event-capacity').value,
            estado: form.querySelector('#calendar-event-status').value
          };
          await sendRequest(payload);
          if (modal) {
            modal.hide();
          }
          calendar.refetchEvents();
        } catch (error) {
          setError(error.message);
        }
      });
    }

    if (deleteButton) {
      deleteButton.addEventListener('click', async function() {
        var eventId = form ? form.querySelector('#calendar-event-id').value : '';
        if (!eventId) {
          return;
        }
        try {
          await sendRequest({
            action: 'delete',
            id: eventId
          });
          if (modal) {
            modal.hide();
          }
          calendar.refetchEvents();
        } catch (error) {
          setError(error.message);
        }
      });
    }
});

