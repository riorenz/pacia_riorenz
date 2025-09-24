<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add Student</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="col-lg-6">
      <div class="card shadow-lg rounded">
        
        <!-- Header -->
        <div class="card-header bg-primary text-white text-center">
          <h5 class="mb-0">Add New Student</h5>
        </div>

        <div class="card-body">

          <!-- PHP Alert Messages -->
          <?php if (isset($insert_id)): ?>
            <?php if ($insert_id): ?>
              <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                🎉 Inserted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php else: ?>
              <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                ❌ Insert failed! Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <!-- Form -->
          <form action="<?= site_url('students/create'); ?>" method="POST">

            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter your lastname" required>
            </div>

            <div class="mb-3">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter your firstname" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary flex-fill">Add Student</button>
              <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-primary">Student List</a>
            </div>

          </form>
        </div>
      </div>
      <p class="text-center text-muted small mt-3">Create student details</p>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
