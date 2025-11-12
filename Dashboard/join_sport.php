<!-- <?php
session_start();
include 'db.php';

if (isset($_POST['add_sport'])) {

    $user_id = $_SESSION['user_id'];
    $sport_id = intval($_POST['sport_id']);

    // ✅ Get coach for this sport
    $coach_query = $conn->prepare("SELECT coach_id FROM sport_coach WHERE sport_id = ?");
    $coach_query->bind_param("i", $sport_id);
    $coach_query->execute();
    $coach_result = $coach_query->get_result();
    
    if ($coach_result->num_rows > 0) {
        $coach_row = $coach_result->fetch_assoc();
        $coach_id = $coach_row['coach_id'];

        // ✅ Insert into student_sport_registration table
        $stmt = $conn->prepare("INSERT INTO student_sport_registration (user_id, sport_id, coach_id) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $sport_id, $coach_id);

        if ($stmt->execute()) {
            echo "<script>alert('Sport Registered Successfully!'); window.location='Student_Dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: Could not register sport.'); window.location='Student_Dashboard.php';</script>";
        }

        $stmt->close();

    } else {
        echo "<script>alert('No coach assigned for this sport yet.'); window.location='Student_Dashboard.php';</script>";
    }

    $coach_query->close();
    $conn->close();
}
?> -->


<!-- 
<form method="POST">
  <label>Sport Title:</label>
  <input type="text" name="sport_title" class="form-control" required><br>

  <label>Coach Name:</label>
  <input type="text" name="coach_name" class="form-control" required><br>

  <label>Date & Time:</label>
  <input type="datetime-local" name="date_time" class="form-control" required><br>

  <label>Location:</label>
  <input type="text" name="location" class="form-control" required><br>

  <button type="submit" name="join" class="btn btn-primary">Join Sport</button>
</form> -->
