<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Student</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="col-lg-6">
      <div class="card shadow-lg rounded">
        
        <!-- Header -->
        <div class="card-header bg-primary text-white text-center">
          <h5 class="mb-0">Update Student</h5>
        </div>

        <!-- Body -->
        <div class="card-body">
          <form action="<?= site_url('students/update/'.rawurlencode($stu['id'] ?? '')); ?>" method="POST">
            
            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" id="lastname" name="lastname" class="form-control" 
                     value="<?= htmlspecialchars($stu['lastname'] ?? '', ENT_QUOTES); ?>" required>
            </div>

            <div class="mb-3">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" id="firstname" name="firstname" class="form-control" 
                     value="<?= htmlspecialchars($stu['firstname'] ?? '', ENT_QUOTES); ?>" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control" 
                     value="<?= htmlspecialchars($stu['email'] ?? '', ENT_QUOTES); ?>" required>
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary flex-fill">Update Student</button>
              <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-primary">Back to List</a>
            </div>

          </form>
        </div>
      </div>
      <p class="text-center text-muted small mt-3">Edit student details</p>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
