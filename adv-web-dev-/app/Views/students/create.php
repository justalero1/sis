<h3>Add Student</h3>

<?php if(isset($validation)): ?>
  <div class="error"><?= $validation->listErrors() ?></div>
<?php endif; ?>

<form action="/students/store" method="post">
    <?= csrf_field() ?>

  <p>Student Number<br><input name="student_number" required></p>
  <p>First Name<br><input name="first_name" required></p>
  <p>Last Name<br><input name="last_name" required></p>
  <p>Email<br><input name="email" required></p>
  <p>Course<br><input name="course" required></p>

  <button class="btn" type="submit">Save</button>
  <a class="btn" href="/students">Back</a>
</form>