<?php $students = $students ?? []; ?>
<a class="btn" href="/students/create">+ Add Student</a>
<br><br>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Student #</th>
      <th>First</th>
      <th>Last</th>
      <th>Email</th>
      <th>Course</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($students as $s): ?>
    <tr>

      <td><?= esc($s['id']) ?></td>
      <td><?= esc($s['student_number']) ?></td>
      <td><?= esc((string) $s['first_name']) ?></td>
      <td><?= esc($s['last_name']) ?></td>
      <td><?= esc($s['email']) ?></td>
      <td><?= esc($s['course']) ?></td>
      <td>
        <a class="btn" href="/students/edit/<?= $s['id'] ?>">Edit</a>

        <form action="/students/delete/<?= $s['id'] ?>" method="post" style="display:inline;">
          <?= csrf_field() ?>
          <button class="btn danger" onclick="return confirm('Delete this student?')" type="submit">Delete</button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>