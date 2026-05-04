<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact & Booking</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: Poppins, sans-serif;
            background: #f5f5f5;
        }

        .contact-section {
            max-width: 1100px;
            margin: 60px auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        /* ===== BOOKING FORM ===== */
        .booking-form h2 {
            margin-bottom: 20px;
            color: #b98a23;
            font-family: 'Playfair Display', serif;
        }

        .booking-form label {
            font-size: 13px;
            color: #0c0b0b;
            margin-top: 10px;
            display: block;
        }

        .booking-form input,
        .booking-form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

       .booking-form button {
    margin-top: 25px;
    width: 100%;
    padding: 15px;
    font-size: 18px;
    font-weight: 600;
    letter-spacing: 1px;
    color: white;
    border: none;
    border-radius: 35px;
    cursor: pointer;
    background: linear-gradient(135deg, #ff2f92, #00ff9d);
    box-shadow:
        0 0 10px rgba(255, 47, 146, 0.6),
        0 0 20px rgba(0, 255, 157, 0.6),
        0 0 40px rgba(255, 47, 146, 0.4);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}


/* Hover effect */
.booking-form button:hover {
    transform: translateY(-4px) scale(1.03);
    box-shadow:
        0 0 15px rgba(255, 47, 146, 0.9),
        0 0 30px rgba(0, 255, 157, 0.9),
        0 0 60px rgba(255, 47, 146, 0.6);
}

@keyframes neonPulse {
    0% {
        box-shadow:
            0 0 10px rgba(255, 47, 146, 0.6),
            0 0 20px rgba(0, 255, 157, 0.6);
    }
    50% {
        box-shadow:
            0 0 25px rgba(255, 47, 146, 1),
            0 0 50px rgba(0, 255, 157, 1);
    }
    100% {
        box-shadow:
            0 0 10px rgba(255, 47, 146, 0.6),
            0 0 20px rgba(0, 255, 157, 0.6);
    }
}

.booking-form button {
    animation: neonPulse 2.5s infinite;
}


/* Click effect */
.booking-form button:active {
    transform: scale(0.96);
}


        /* ===== CONTACT INFO ===== */
        .contact-info h2 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
        }

        .contact-item {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .contact-item i {
            color: brown;
            margin-right: 10px;
        }

        .contact-item a {
            text-decoration: none;
            color: #333;
        }

        .contact-item a {
            color: #504f4d;          /* WhatsApp green */
            text-decoration: none;
            font-weight: 600;
        }

        .contact-item a:hover {
            text-decoration: underline;
        }

        iframe {
            width: 100%;
            height: 200px;
            border-radius: 12px;
            border: none;
            margin-top: 20px;
        }

        body.dark {
    background: #cdccc9;
    color: #eee;
}

body.dark .contact-section {
    background: #605b5b;
}

body.dark .contact-item i {
    color: #b88933;
}

body.dark a {
    color: #eee;
}

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .contact-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="dark">

<div class="contact-section">

    <!-- BOOK NOW FORM -->
    <div class="booking-form">
        <h2>Book Your Stay</h2>

        <form action="book.php" method="POST">

            <label>Your Name</label>
            <input type="text" name="name" required>

            <label>Your Email</label>
            <input type="email" name="email" required>

            <label>Check-in Date</label>
            <input type="date" name="checkin" required>

            <label>Check-out Date</label>
            <input type="date" name="checkout" required>

            <label>Number of Persons</label>
            <select name="persons" required>
                <option value="">Select</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5+</option>
            </select>
            <label>Room Type</label>
            <select name="room">
                <option>Single Room</option>
                <option>Double Room</option>
                <option>Deluxe Room</option>
                <option>King Room</option>
            </select>

            <button type="submit">Book Now</button>
        </form>
    </div>

    <!-- CONTACT DETAILS -->
    <div class="contact-info">
        <h2>Contact Us</h2>

        <div class="contact-item">
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:Royalhotel.reengus@gmail.com">Royalhotel.reengus@gmail.com</a>
        </div>

        <div class="contact-item">
            <i class="fa-solid fa-phone"></i>
            <a href="tel:+918302694500 , 01575224500">+91 8302694500, 01575224500</a>
            </div>


        <div class="contact-item">
            <i class="fa-brands fa-whatsapp"></i>
            <a href="https://wa.me/918302694500" target="_blank">
                +91 8302694500
            </a>
        </div>

        <div class="contact-item">
            <i class="fa-brands fa-instagram"></i>
            <a href="https://www.instagram.com/royalhotel.reengus?igsh=ZzJ0bjIyb3l2cDdvl" target="_blank">royalhotel.reengus</a>
        </div>

        <div class="contact-item">
            <i class="fa-solid fa-location-dot"></i>
            Royal Hotel & Restaurant ,Reengus Railway station Road,Reengus,Sikar,Rajasthan,India
        </div>

        <!-- GOOGLE MAP -->
        <iframe 
            src="https://www.google.com/maps?q=Royal Hotel Ringas&output=embed">
        </iframe>
    </div>

</div>


</body>
</html>
