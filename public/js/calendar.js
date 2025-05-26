document.addEventListener("DOMContentLoaded", () => {
  const calendarContainer = document.getElementById("calendar");
  if (!calendarContainer) return;

  const icsUrl = "https://cloud.blumenthal7.de/remote.php/dav/public-calendars/tMeiiTEQJsoY88zL?export";

  fetch(icsUrl)
    .then(res => res.text())
    .then(data => {
      const jcalData = ICAL.parse(data);
      const comp = new ICAL.Component(jcalData);
      const vevents = comp.getAllSubcomponents("vevent");

      const events = vevents.map(evt => {
        const event = new ICAL.Event(evt);
        return {
          summary: event.summary,
          location: event.location,
          description: event.description,
          start: event.startDate.toJSDate(),
          end: event.endDate.toJSDate(),
        };
      });

      // Zeitraum: heute bis in einem Monat
      const now = new Date();
      const oneMonthFromNow = new Date();
      oneMonthFromNow.setMonth(now.getMonth() + 1);

      const upcomingEvents = events
        .filter(e => e.start >= now && e.start <= oneMonthFromNow)
        .sort((a, b) => a.start - b.start);

      if (upcomingEvents.length === 0) {
        calendarContainer.innerHTML = "<p>In den nächsten 30 Tagen sind keine Veranstaltungen geplant.</p>";
        return;
      }

      upcomingEvents.forEach(e => {
        const div = document.createElement("div");
        div.innerHTML = `
          <h3>${e.summary}</h3>
          <p><strong>Wann:</strong> ${e.start.toLocaleString()}</p>
          ${e.location ? `<p><strong>Wo:</strong> ${e.location}</p>` : ""}
          ${e.description ? `<p>${e.description}</p>` : ""}
          <hr>
        `;
        calendarContainer.appendChild(div);
      });
    })
    .catch(err => {
      calendarContainer.innerHTML = "Kalender konnte nicht geladen werden.";
      console.error(err);
    });
});
