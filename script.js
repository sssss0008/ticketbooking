document.getElementById("bookingForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch("book_ticket.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById("responseMessage").innerHTML = `
                    🎉 Booking Successful! Your Booking ID: <strong>${data.booking_id}</strong>
                `;
            } else {
                document.getElementById("responseMessage").innerHTML = `
                    ❌ Booking Failed: ${data.error}
                `;
            }
        })
        .catch((error) => {
            document.getElementById("responseMessage").innerHTML = `
                ❌ An error occurred: ${error.message}
            `;
        });
});
