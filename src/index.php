<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Body Fat Calculator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="text-center display-4">Body Fat Calculator</div>
  <div class="container d-flex">
  <div class="container-md mt-5">
  <form method="POST" autocomplete="off">
    <div class="row g3">
      <div class="col-md-6">
        <label for="inputName" class="form-label  mt-2">Firstname</label>
        <input type="text" class="form-control" name="firstName" id="inputName" required>
      </div>
      <div class="col-md-6">
        <label for="inputLastname" class="form-label mt-2">Lastname</label>
        <input type="text" class="form-control" name="lastName" id="inputLastname" required>
      </div>
    </div>
    <div class="row g3">
      <div class="col-md-6">
        <label for="inputGender" class="form-label mt-2">Gender</label>
        <select id="inputGender" class="form-select" name="inputGender" required>
          <option disabled value="">Choose...</option>
          <option value="male" selected>Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="inputAge" class="form-label mt-2">Age</label>
        <input type="number" class="form-control" name="inputAge" id="inputAge" required>
      </div>
    </div>
    <div class="row g3">
      <div class="col-md-12">
        <label for="inputHeight" class="form-label mt-2">Height</label>
        <input type="number" class="form-control" name="inputHeight" id="inputHeight" required>
      </div>
      <div class="col-md-12">
        <label for="inputWeight" class="form-label mt-2">Weight</label>
        <input type="number" class="form-control" name="inputWeight" id="inputWeight" required>
      </div>
    </div>
    <div class="row g3">
      <div class="col-md-12">
        <label for="inputWaist" class="form-label mt-2">Waist</label>
        <input type="number" class="form-control" name="inputWaist" id="inputWaist" required>
        <small class="form-text text-muted">Measure the waist circumference at the horizontal level around the navel for men, and at the level with the smallest width for women</small>
      </div>
    </div>
    <div class="row g3">
      <div class="col-md-6-12">
        <label for="inputNeck" class="form-label mt-2">Neck</label>
        <input type="number" class="form-control" name="inputNeck" id="inputNeck" required>
        <small class="form-text text-muted">Measure the circumference of the neck starting below the larynx, with the tape sloping downward to the front</small>
      </div>
    </div>
    <div class="row g3">
      <div class="col-md-12">
        <label for="inputHip" class="form-label mt-2">Hip</label>
        <input type="number" class="form-control" name="inputHip" id="inputHip">
        <small class="form-text text-muted">For women only: measure the circumference of the hips at the largest horizontal measure</small>
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary mt-2">Calculate</button>
    </div>
  </form>
</div>
<div class="container-md mt-5">
  <h1 class="fs-5">Results</h1>
<?php

$BFP = 0; // body fat percentage
$FM = 0; // fat mass
$LM = 0; // lean pass

if (isset($_POST['firstName']) &&
    isset($_POST['lastName']) &&
    isset($_POST['inputAge']) &&
    isset($_POST['inputGender']) &&
    isset($_POST['inputWeight']) &&
    isset($_POST['inputHeight']) &&
    isset($_POST['inputWaist']) &&
    isset($_POST['inputNeck'])) {
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $age = $_POST['inputAge'];
      $gender = $_POST['inputGender'];
      $weight = $_POST['inputWeight'];
      $height = $_POST['inputHeight'];
      $waist = $_POST['inputWaist'];
      $neck = $_POST['inputNeck'];
      $hip = $_POST['inputHip'];
      $result;

      switch ($gender) {
        case $gender === 'male':
          $BFP = (495 / (1.0324 - 0.19077 * log10($waist-$neck) + 0.15456 * log10($height))) - 450;
          if ($BFP > 2 and $BFP < 6) {
            $result = 'Essential Fat';
          } elseif ($BFP >= 6 and $BFP < 14) {
            $result = 'Athletic';
          } elseif ($BFP >= 14 and $BFP < 18) {
            $result = 'Fit';
          } elseif ($BFP >= 18 and $BFP < 26) {
            $result = 'Acceptable';
          } else {
            $result = 'Obese';
          }
          break;
        case $gender === 'female':
          $BFP = (495 / (1.29579 - 0.35004 * log10($waist+$hip-$neck) + 0.22100 * log10($height))) - 450;  
          if ($BFP > 10 and $BFP < 14) {
            $result = 'Essential Fat';
          } elseif ($BFP >= 14 and $BFP < 21) {
            $result = 'Athletic';
          } elseif ($BFP >= 21 and $BFP < 25) {
            $result = 'Fit';
          } elseif ($BFP >= 25 and $BFP < 32) {
            $result = 'Acceptable';
          } else {
            $result = 'Obese';
          }
          break;
      }
      $FM = $BFP / 100 * $weight;
      $LM = $weight - $FM;
      

      if ($result === 'Essential Fat') {
        $color = 'green';
      } elseif ($result === 'Athletic') {
        $color = 'blue';
      } elseif ($result === 'Fit') {
        $color = 'orange';
      } elseif ($result === 'Acceptable') {
        $color = 'yellow';
      } else {
        $color = 'red';
      }
      if ($result) {
        echo '<div class="result">';
        echo '<p>Dear ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ',</p>';
        echo '<p>You are ' . $_POST['inputAge'] . ' years old and ' . $_POST['inputGender'] . '.</p>';
        echo '<p>Your body fat percentage is ' . number_format($BFP, 2, ',', ' ') . '%.</p>';
        echo '<p>Your fat mass: ' . number_format($FM, 2, ',', ' ') . ' kg.</p>'; 
        echo '<p>Your lean mass: ' . number_format($LM, 2, ',', ' ') . ' kg.</p>';
        echo '<p>Your category is: <span style="color:'.$color.';">' .  $result . '.</span></p>';
        echo '</div>';
      }
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>

