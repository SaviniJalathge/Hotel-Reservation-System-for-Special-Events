let editMode = false;
let editIndex = -1;

// Function to convert image to Base64
function getBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
    });
}

// Form submission: Add or update event
document.getElementById('event-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    const title = document.getElementById('event-title').value;
    const description = document.getElementById('event-description').value;
    const date = document.getElementById('event-date').value;
    const photoInput = document.getElementById('event-photo');
    
    let photo = '';
    if (photoInput.files.length > 0) {
        photo = await getBase64(photoInput.files[0]); // Convert image to Base64
    }

    let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

    if (editMode) {
        // Update existing event
        events[editIndex] = { title, description, date, photo };
        editMode = false;
        editIndex = -1;
    } else {
        // Add new event
        events.push({ title, description, date, photo });
    }

    localStorage.setItem('events', JSON.stringify(events));
    displayEvents();
    this.reset();
});

// Display the list of events with edit and delete buttons
function displayEvents() {
    const events = JSON.parse(localStorage.getItem('events')) || [];
    const eventList = document.getElementById('admin-event-list');
    eventList.innerHTML = events.map((event, index) => `
        <div class="event">
            <h3>${event.title}</h3>
            <p>${event.description}</p>
            <small>${new Date(event.date).toDateString()}</small>
            ${event.photo ? `<img src="${event.photo}" alt="${event.title}" style="max-width: 100%; height: auto;">` : ''}
            <button onclick="editEvent(${index})">Edit</button>
            <button onclick="deleteEvent(${index})">Delete</button>
        </div>
    `).join('');
}

// Edit an event
function editEvent(index) {
    const events = JSON.parse(localStorage.getItem('events'));
    const event = events[index];

    document.getElementById('event-title').value = event.title;
    document.getElementById('event-description').value = event.description;
    document.getElementById('event-date').value = event.date;
    editMode = true;
    editIndex = index;
}

// Delete an event
function deleteEvent(index) {
    let events = JSON.parse(localStorage.getItem('events'));
    events.splice(index, 1); // Remove the event at the specified index
    localStorage.setItem('events', JSON.stringify(events));
    displayEvents();
}

// Display events when the page loads
document.addEventListener('DOMContentLoaded', displayEvents);
