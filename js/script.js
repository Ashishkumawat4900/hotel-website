function sendWhatsApp() {
    var name = document.getElementById("name").value;
    var date = document.getElementById("date").value;
    var room = document.getElementById("room").value;

    if (name.trim() === "" || date.trim() === "") {
        alert("Please fill all details");
        return;
    }

    // 🔴 PUT HOTEL OWNER NUMBER HERE (with country code)
    var phoneNumber = "918302694500"; 
    // Example: 91 + 9876543210 → 919876543210

    var message = 
        "Hotel Booking Request\n" +
        "Name: " + name + "\n" +
        "Date: " + date + "\n" +
        "Room Type: " + room;

    var whatsappURL =
        "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);

    window.location.href = whatsappURL;
}



function openBooking() {
    document.getElementById("bookingModal").style.display = "block";
}

function closeBooking() {
    document.getElementById("bookingModal").style.display = "none";
}



function checkAvailability() {
    let room = document.querySelector('[name="room"]').value;
    if (!room) return;

    fetch("check_availability.php", {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: `room=${room}`
    })
    .then(res => res.text())
    .then(data => {
        let msg = document.getElementById("availabilityMsg");
        if (data.trim() === "AVAILABLE") {
            msg.innerHTML = "✅ Room Available";
            msg.style.color = "green";
        } else {
            msg.innerHTML = "❌ Room Not Available";
            msg.style.color = "red";
        }
    });
}


function calculatePrice() {
  let room = document.querySelector('[name="room"]').value;
  let rooms = document.querySelector('[name="rooms"]').value;
  if (!room || !rooms) return;

  fetch("get_price.php", {
    method: "POST",
    headers: {"Content-Type":"application/x-www-form-urlencoded"},
    body: `room=${room}`
  })
  .then(res => res.text())
  .then(price => {
    let base = price * rooms;
    let gst = base * 0.05;
    let total = base + gst;

    document.getElementById("priceBox").innerHTML =
      `Base: ₹${base}<br>
       GST (5%): ₹${gst.toFixed(2)}<br>
       <b>Total: ₹${total.toFixed(2)}</b>`;
  });
}



