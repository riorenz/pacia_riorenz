<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Students — List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-compact .card-body { padding: .75rem 1rem; }
    .search-input { min-width: 220px; }
    .table-actions .btn { padding: .28rem .5rem; }
    .hero {
      background: linear-gradient(90deg, rgba(13,110,253,0.04), rgba(102,16,242,0.03));
      border-radius:.5rem;
    }
  </style>
</head>
<body class="bg-light text-dark">

<div class="container py-5">

  <!-- Top bar -->
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div>
      <h2 class="h4 mb-0">Students</h2>
      <small class="text-muted">Manage student records</small>
    </div>
    <div class="d-flex gap-2">
      <a href="<?= site_url('students/create'); ?>" class="btn btn-primary">
        ➕ Add Student
      </a>
      <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-secondary d-none d-md-inline">
        🔁 Refresh
      </a>
    </div>
  </div>

  <?php
    $q = isset($query) ? $query : '';
    $cur_page = isset($page) ? (int)$page : 1;
    $cur_per = isset($per_page) ? (int)$per_page : 3;
    $total_items = isset($total_items) ? (int)$total_items : 0;
    $total_pages = isset($total_pages) ? (int)$total_pages : 1;
    $students_list = isset($students) ? $students : [];
  ?>

  <div class="row g-4">
    <!-- Left: search / info -->
    <div class="col-lg-4">
      <div class="card card-compact hero shadow-sm mb-3">
        <div class="card-body">
          <form method="get" class="row gx-2 gy-2 align-items-center">
            <div class="col-12">
              <label class="form-label small mb-1">Search</label>
              <input type="search" name="q" value="<?= htmlspecialchars($q, ENT_QUOTES); ?>"
                     class="form-control search-input" placeholder="firstname, lastname or email">
            </div>

            <div class="col-6">
              <label class="form-label small mb-1">Per page</label>
              <select name="per_page" class="form-select">
                <?php foreach ([3,6,9,12] as $opt): ?>
                  <option value="<?= $opt; ?>" <?= $cur_per === $opt ? 'selected' : ''; ?>><?= $opt; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-6 d-flex align-items-end justify-content-end">
              <div class="w-100 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-50">Search</button>
                <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-secondary w-50">Reset</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card shadow-sm">
        <div class="card-body small text-muted">
          <div class="mb-2"><strong>Showing</strong></div>
          <?php
            $start = $total_items ? (($cur_page - 1) * $cur_per) + 1 : 0;
            $shown = is_array($students_list) ? count($students_list) : 0;
            $end = $total_items ? $start + $shown - 1 : 0;
          ?>
          <div>Results: <span class="fw-semibold"><?= $start; ?></span> — <span class="fw-semibold"><?= $end; ?></span></div>
          <div class="mt-2">Total: <span class="badge bg-secondary"><?= $total_items; ?></span></div>
          <hr>
          <div class="text-muted">
            Tips:
            <ul class="mb-0">
              <li>Use search to quickly filter records.</li>
              <li>Click Update to edit a student.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: table -->
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body p-0">
          <?php if (empty($students_list)): ?>
            <div class="p-4 text-center text-muted">
              <div class="mb-2">No students found.</div>
              <a href="<?= site_url('students/create'); ?>" class="btn btn-outline-primary">Add first student</a>
            </div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                  <tr>
                    <th style="width:72px">ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th class="text-center" style="width:160px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  function row_val($row, $key) {
                    if (is_array($row)) return isset($row[$key]) ? $row[$key] : '';
                    if (is_object($row)) return isset($row->$key) ? $row->$key : '';
                    return '';
                  }
                ?>
                <?php foreach ($students_list as $s): ?>
                  <tr>
                    <td class="text-muted"><?= htmlspecialchars(row_val($s,'id'), ENT_QUOTES); ?></td>
                    <td><?= htmlspecialchars(row_val($s,'firstname'), ENT_QUOTES); ?></td>
                    <td><?= htmlspecialchars(row_val($s,'lastname'), ENT_QUOTES); ?></td>
                    <td><a href="mailto:<?= rawurlencode(row_val($s,'email')); ?>"><?= htmlspecialchars(row_val($s,'email'), ENT_QUOTES); ?></a></td>
                    <td class="text-center table-actions">
                      <div class="d-inline-flex">
                        <a href="<?= site_url('students/update/'.rawurlencode(row_val($s,'id'))); ?>" class="btn btn-sm btn-outline-warning me-1">✏️ Update</a>
                        <a href="<?= site_url('students/delete/'.rawurlencode(row_val($s,'id'))); ?>"
                           onclick="return confirm('Delete this student?');"
                           class="btn btn-sm btn-outline-danger">🗑️ Delete</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>

        <?php if (!empty($students_list) && $total_pages > 1): ?>
          <div class="card-footer bg-white">
            <?php
              $base_q = [];
              if ($q !== '') { $base_q['q'] = $q; }
              if ($cur_per) { $base_q['per_page'] = $cur_per; }
              $build_page_url = function($p) use ($base_q) {
                $qs = http_build_query(array_merge($base_q, ['page' => $p]));
                return site_url('students/get-all') . ($qs ? '?' . $qs : '');
              };
              $start_page = max(1, $cur_page - 2);
              $end_page = min($total_pages, $cur_page + 2);
            ?>
            <nav aria-label="Pagination">
              <ul class="pagination justify-content-center mb-0">
                <li class="page-item <?= $cur_page <= 1 ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?= $cur_page <= 1 ? '#' : $build_page_url(1); ?>">«</a>
                </li>
                <li class="page-item <?= $cur_page <= 1 ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?= $cur_page <= 1 ? '#' : $build_page_url($cur_page - 1); ?>">‹</a>
                </li>

                <?php for ($p = $start_page; $p <= $end_page; $p++): ?>
                  <li class="page-item <?= $p === $cur_page ? 'active' : ''; ?>">
                    <a class="page-link" href="<?= $p === $cur_page ? '#' : $build_page_url($p); ?>"><?= $p; ?></a>
                  </li>
                <?php endfor; ?>

                <li class="page-item <?= $cur_page >= $total_pages ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?= $cur_page >= $total_pages ? '#' : $build_page_url($cur_page + 1); ?>">›</a>
                </li>
                <li class="page-item <?= $cur_page >= $total_pages ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?= $cur_page >= $total_pages ? '#' : $build_page_url($total_pages); ?>">»</a>
                </li>
              </ul>
            </nav>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
