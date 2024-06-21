
        const addEventButton = document.getElementById('addEventButton');
        const slideInForm = document.getElementById('slideInForm');
        const closeSlideInForm = document.getElementById('closeSlideInForm');
        const saveEventButton = document.getElementById('saveEventButton');
        const participantsList = document.getElementById('participantsList');
        const addParticipantButton = document.getElementById('addParticipantButton');

        addEventButton.addEventListener('click', () => {
            slideInForm.classList.add('active');
        });

        closeSlideInForm.addEventListener('click', () => {
            slideInForm.classList.remove('active');
        });

        addParticipantButton.addEventListener('click', () => {
            const participantInput = document.createElement('input');
            participantInput.type = 'text';
            participantInput.placeholder = 'Nombre del participante';
            participantInput.className = 'w-full p-2 mb-2 border border-gray-300 rounded';
            participantsList.insertBefore(participantInput, addParticipantButton);
        });

        saveEventButton.addEventListener('click', () => {
            const eventName = document.getElementById('eventName').value;
            const eventDirector = document.getElementById('eventDirector').value;
            const eventDate = document.getElementById('eventDate').value;

            if (eventName && eventDirector && eventDate) {
                const newEventCard = document.createElement('div');
                newEventCard.className =
                    'flex flex-col justify-between w-full h-24 p-4 text-white bg-blue-500 rounded shadow-md';
                newEventCard.innerHTML = `
                    <h3 class="font-bold">${eventName}</h3>
                    <p>${eventDirector}</p>
                    <p>${eventDate}</p>
                `;
                document.querySelector('.grid').insertBefore(newEventCard, document.getElementById('newEventCard'));

                slideInForm.classList.remove('active');
                document.getElementById('eventForm').reset();
                participantsList.querySelectorAll('input').forEach(input => input.remove());
            } else {
                alert('Please fill all fields');
            }
        });
