
document.addEventListener('DOMContentLoaded', function() {
    let people = [];
    let currentIndex = 0;
    const itemsPerPage = 3;

    const fetchPeople = async () => {
        try {
            const response = await fetch('../config/getPeople');
            if (!response.ok) throw new Error('Network response was not ok');
            people = await response.json();
            renderPeople();
        } catch (error) {
            console.error('There was a problem with the fetch operation:', error);
        }
    };

    const renderPeople = () => {
        const peopleList = document.getElementById('peopleList');
        peopleList.innerHTML = '';
        const endIndex = Math.min(currentIndex + itemsPerPage, people.length);
        for (let i = currentIndex; i < endIndex; i++) {
            const person = people[i];
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item', 'people-list-item');
            listItem.innerHTML = `<img src="${person.profile_image}" alt="${person.firstname}"> ${person.firstname} ${person.lastname}`;
            listItem.dataset.id = person.id;
            listItem.addEventListener('click', function() {
                listItem.classList.toggle('active');
            });
            peopleList.appendChild(listItem);
        }
        adjustArrowVisibility();
    };

    const adjustArrowVisibility = () => {
        document.querySelector('.arrow-up').style.display = currentIndex === 0 ? 'none' : 'block';
        document.querySelector('.arrow-down').style.display = currentIndex + itemsPerPage >= people.length ? 'none' : 'block';
    };

    const scrollUp = () => {
        if (currentIndex > 0) {
            currentIndex -= itemsPerPage;
            renderPeople();
        }
    };

    const scrollDown = () => {
        if (currentIndex + itemsPerPage < people.length) {
            currentIndex += itemsPerPage;
            renderPeople();
        }
    };

    document.querySelector('.arrow-up').addEventListener('click', scrollUp);
    document.querySelector('.arrow-down').addEventListener('click', scrollDown);

    document.getElementById('taskForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const selectedPeople = [];
        document.querySelectorAll('.list-group-item.active').forEach(item => {
            selectedPeople.push(item.dataset.id);
        });

        const taskName = document.getElementById('taskName').value;

        fetch('../config/saveTask', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ taskName, selectedPeople }),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('There was a problem with the save task operation:', error);
        });
    });

    fetchPeople();
})
