// JavaScript code to display flight data
fetch('FlightInsert.php')
  .then(response => response.json())
  .then(data => {
    const flightData = document.getElementById('flight-data');
    flightData.innerHTML = '';
    data.forEach(flight => {
      const flightHTML = `
        <h3>Flight ${flight.flight_no}</h3>
        <p>Flight Name: ${flight.flight_name}</p>
        <p>Source: ${flight.source}</p>
        <p>Destination: ${flight.destination}</p>
        <p>Departure Time: ${flight.departure_time}</p>
        <p>Arrival Time: ${flight.arrival_time}</p>
        <p>Duration: ${flight.duration}</p>
        <p>Cost: ${flight.cost}</p>
        <hr>
      `;
      flightData.innerHTML += flightHTML;
    });
  });
