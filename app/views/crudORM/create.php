<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background: linear-gradient(90deg, rgba(13,110,253,0.08), rgba(102,16,242,0.04));
      border-radius: .5rem;
    }
    .favicon {
      width: 36px; height:36px; object-fit:cover; border-radius:6px;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="h4 mb-0">Add Student</h2>
        <small class="text-muted">Create a new student record</small>
      </div>
      <div>
        <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-secondary">
          ← Back to list
        </a>
      </div>
    </div>

    <div class="row g-4">
      <!-- Form column -->
      <div class="col-lg-7">
        <div class="card shadow-sm">
          <div class="card-body">
            <?php if (isset($insert_id)): ?>
              <?php if ($insert_id): ?>
                <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
                  <div>
                    <strong>Success:</strong> Student added (ID: <?= (int)$insert_id; ?>).
                  </div>
                  <a href="<?= site_url('students/get-all'); ?>" class="btn btn-sm btn-outline-light btn-success">View list</a>
                </div>
              <?php else: ?>
                <div class="alert alert-danger" role="alert">Failed to insert student. Please try again.</div>
              <?php endif; ?>
            <?php endif; ?>

            <form action="<?= site_url('students/create'); ?>" method="POST" novalidate>
              <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter lastname"
                       value="<?= isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : ''; ?>" required>
              </div>

              <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter firstname"
                       value="<?= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : ''; ?>" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com"
                       value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>" required>
              </div>

              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Add Student</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </form>
          </div>
        </div>
        <p class="text-muted small mt-2">Fields marked required must be filled.</p>
      </div>

      <!-- Preview / Info column -->
      <div class="col-lg-5">
        <div class="hero p-3 shadow-sm">
          <div class="d-flex align-items-center gap-3">
            <img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/person-circle.svg" alt="icon" class="favicon">
            <div>
              <h5 class="mb-0">Student details</h5>
              <small class="text-muted">Provide accurate information for each student.</small>
            </div>
          </div>

          <hr>

          <ul class="list-unstyled small mb-0">
            <li class="mb-2"><strong>Firstname</strong> — Student given name</li>
            <li class="mb-2"><strong>Lastname</strong> — Student family name</li>
            <li class="mb-2"><strong>Email</strong> — Valid email required</li>
          </ul>

          <div class="mt-3">
            <a href="<?= site_url('students/get-all'); ?>" class="btn btn-sm btn-outline-primary w-100">View all students</a>
          </div>
        </div>

        <div class="card mt-3 shadow-sm">
          <div class="card-body small text-muted">
            Tip: Use the search on the students list to find and update existing records.
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
