<h3>Edit Student</h3>

<?php if(isset($validation)): ?>
  <div class="error"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<?php
$student = $student ?? [
    'id' => '',
    'student_number' => '',
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'course' => '',
];
?>

<form action="/students/update/<?= esc($student['id']) ?>" method="post">
    <?= csrf_field() ?>

<form action="/students/update/<?= $student['id'] ?>" method="post">
    <?= csrf_field() ?>

  <p>Student Number<br>
    <input name="student_number" value="<?= esc($student['student_number']) ?>" required>
  </p>

  <p>First Name<br>
    <input name="first_name" value="<?= esc($student['first_name']) ?>" required>
  </p>

  <p>Last Name<br>
    <input name="last_name" value="<?= esc($student['last_name']) ?>" required>
  </p>

  <p>Email<br>
    <input name="email" value="<?= esc($student['email']) ?>" required>
  </p>

  <p>Course<br>
    <input name="course" value="<?= esc($student['course']) ?>" required>
  </p>

  <button class="btn" type="submit">Update</button>
  <a class="btn" href="/students">Back</a>
</form>