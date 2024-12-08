<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ticket_type = $_POST['ticket_type'];
    $booking_id = "TICKET-" . strtoupper(uniqid());

    $stmt = $conn->prepare("INSERT INTO bookings (booking_id, name, email, phone, ticket_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $booking_id, $name, $email, $phone, $ticket_type);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "booking_id" => $booking_id]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
    $conn->close();
}
?>
