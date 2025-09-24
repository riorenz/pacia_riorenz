<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Student</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-header-brand { background: linear-gradient(90deg,#4f46e5,#06b6d4); color:#fff; }
    .avatar {
      width:56px;height:56px;border-radius:8px;object-fit:cover;border:2px solid rgba(255,255,255,0.2);
    }
  </style>
</head>
<body class="bg-light">

  <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="col-12 col-md-10 col-lg-7">
      <div class="card shadow-sm rounded">

        <!-- Header -->
        <div class="card-header card-header-brand d-flex align-items-center gap-3">
          <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/person-bounding-box.svg" alt="icon" class="avatar">
          <div>
            <h5 class="mb-0">Update Student</h5>
            <small class="opacity-75">Edit existing student details</small>
          </div>
          <div class="ms-auto">
            <a href="<?= site_url('students/get-all'); ?>" class="btn btn-sm btn-outline-light">Back to list</a>
          </div>
        </div>

        <!-- Body -->
        <div class="card-body">
          <form action="<?= site_url('students/update/'.rawurlencode($stu['id'] ?? '')); ?>" method="POST" class="row g-3">

            <div class="col-12">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" id="lastname" name="lastname" class="form-control" 
                     value="<?= htmlspecialchars($stu['lastname'] ?? '', ENT_QUOTES); ?>" required>
            </div>

            <div class="col-12 col-md-6">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" id="firstname" name="firstname" class="form-control" 
                     value="<?= htmlspecialchars($stu['firstname'] ?? '', ENT_QUOTES); ?>" required>
            </div>

            <div class="col-12 col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" 
                     value="<?= htmlspecialchars($stu['email'] ?? '', ENT_QUOTES); ?>" required>
            </div>

            <div class="col-12 d-flex gap-2">
              <button type="submit" class="btn btn-primary flex-fill">Update Student</button>
              <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-secondary">Cancel</a>
            </div>

            <div class="col-12">
              <small class="text-muted">Changes are saved to the database. Make sure email is valid.</small>
            </div>

          </form>
        </div>
      </div>

      <div class="text-center mt-3 small text-muted">
        <a href="<?= site_url('students/get-all'); ?>">Return to students list</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
