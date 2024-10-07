function fetchAndDisplayPrayerTimes() {
    const today = new Date();
    const formattedDate = [
        ('0' + today.getDate()).slice(-2),
        ('0' + (today.getMonth() + 1)).slice(-2),
        today.getFullYear(),
    ].join('-');

    const url = `https://api.aladhan.com/v1/timingsByCity/${formattedDate}?city=Manchester&country=United+Kingdom&method=3&latitudeAdjustmentMethod=2`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        const timings = data.data.timings;

        const prayers = ["Fajr", "Sunrise", "Dhuhr", "Asr", "Maghrib", "Isha"];

        prayers.forEach(prayer => {
            const element = document.getElementById(prayer);
            if (element) {
                element.textContent = timings[prayer];
            }
        });
    })
    .catch(error => console.error('Error fetching prayer times:', error));
}

fetchAndDisplayPrayerTimes();
